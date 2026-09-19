<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeployWebhookController extends Controller
{
    /**
     * Handle incoming GitHub push webhook for automatic zero-downtime deployment.
     */
    public function handle(Request $request): JsonResponse
    {
        $secret = config('services.github.webhook_secret');

        if (empty($secret)) {
            Log::error('[DeployWebhook] GITHUB_WEBHOOK_SECRET is not configured.');
            return response()->json(['error' => 'Webhook secret not configured on server'], 500);
        }

        // 1. Verify GitHub HMAC SHA-256 signature
        $signature = $request->header('X-Hub-Signature-256');

        if (!$signature) {
            Log::warning('[DeployWebhook] Missing X-Hub-Signature-256 header.');
            return response()->json(['error' => 'Missing signature header'], 401);
        }

        $rawPayload = $request->getContent();
        $expectedSignature = 'sha256=' . hash_hmac('sha256', $rawPayload, $secret);

        if (!hash_equals($expectedSignature, $signature)) {
            Log::warning('[DeployWebhook] Invalid HMAC signature provided.');
            return response()->json(['error' => 'Invalid signature'], 403);
        }

        // 2. Handle ping event
        $event = $request->header('X-GitHub-Event', 'push');
        if ($event === 'ping') {
            Log::info('[DeployWebhook] Received GitHub ping event. Connection verified.');
            return response()->json([
                'status' => 'pong',
                'message' => 'Tapstick GitHub Webhook connected and verified successfully!',
            ], 200);
        }

        // 3. Process push event
        $payload = json_decode($rawPayload, true) ?: [];
        $ref = $payload['ref'] ?? '';

        // Only deploy on main branch commits
        if ($ref !== 'refs/heads/main') {
            return response()->json([
                'status' => 'ignored',
                'message' => "Ignored push on branch [{$ref}]. Only 'refs/heads/main' triggers deployment.",
            ], 200);
        }

        $commitId = $payload['after'] ?? substr(md5((string)time()), 0, 7);
        $commitMsg = $payload['head_commit']['message'] ?? 'New push';
        $sender = $payload['sender']['login'] ?? 'GitHub';

        Log::info("[DeployWebhook] Triggering deployment for commit [{$commitId}] by [{$sender}]: {$commitMsg}");

        // 4. Trigger deployment script in background
        $deployScript = base_path('deploy.sh');
        $logFile = storage_path('logs/deploy.log');

        if (file_exists($deployScript)) {
            exec('bash ' . escapeshellarg($deployScript) . ' > ' . escapeshellarg($logFile) . ' 2>&1 &');
        } else {
            Log::error("[DeployWebhook] Deploy script not found at {$deployScript}");
            return response()->json(['error' => 'Deploy script not found on server'], 500);
        }

        return response()->json([
            'status' => 'deploying',
            'commit' => $commitId,
            'message' => 'Deployment initiated successfully in background.',
        ], 200);
    }
}
