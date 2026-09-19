<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class DeployWebhookTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Config::set('services.github.webhook_secret', 'test-secret-12345');
    }

    public function test_webhook_rejects_missing_signature(): void
    {
        $response = $this->postJson('/api/github-deploy', ['ref' => 'refs/heads/main']);
        $response->assertStatus(401);
        $response->assertJson(['error' => 'Missing signature header']);
    }

    public function test_webhook_rejects_invalid_signature(): void
    {
        $payload = json_encode(['ref' => 'refs/heads/main']);
        $response = $this->call(
            'POST',
            '/api/github-deploy',
            [],
            [],
            [],
            [
                'HTTP_X_Hub_Signature_256' => 'sha256=invalidhashvalue1234567890',
                'CONTENT_TYPE' => 'application/json',
            ],
            $payload
        );

        $response->assertStatus(403);
        $response->assertJson(['error' => 'Invalid signature']);
    }

    public function test_webhook_handles_github_ping_event(): void
    {
        $payload = json_encode(['zen' => 'Keep it logically awesome.']);
        $signature = 'sha256=' . hash_hmac('sha256', $payload, 'test-secret-12345');

        $response = $this->call(
            'POST',
            '/api/github-deploy',
            [],
            [],
            [],
            [
                'HTTP_X_Hub_Signature_256' => $signature,
                'HTTP_X_GitHub_Event' => 'ping',
                'CONTENT_TYPE' => 'application/json',
            ],
            $payload
        );

        $response->assertStatus(200);
        $response->assertJson(['status' => 'pong']);
    }

    public function test_webhook_ignores_non_main_branches(): void
    {
        $payload = json_encode(['ref' => 'refs/heads/feature-branch']);
        $signature = 'sha256=' . hash_hmac('sha256', $payload, 'test-secret-12345');

        $response = $this->call(
            'POST',
            '/api/github-deploy',
            [],
            [],
            [],
            [
                'HTTP_X_Hub_Signature_256' => $signature,
                'HTTP_X_GitHub_Event' => 'push',
                'CONTENT_TYPE' => 'application/json',
            ],
            $payload
        );

        $response->assertStatus(200);
        $response->assertJson(['status' => 'ignored']);
    }

    public function test_webhook_accepts_valid_main_push_event(): void
    {
        $payload = json_encode([
            'ref' => 'refs/heads/main',
            'after' => 'abc1234',
            'head_commit' => ['message' => 'Test push commit'],
            'sender' => ['login' => 'testuser'],
        ]);
        $signature = 'sha256=' . hash_hmac('sha256', $payload, 'test-secret-12345');

        $response = $this->call(
            'POST',
            '/api/github-deploy',
            [],
            [],
            [],
            [
                'HTTP_X_Hub_Signature_256' => $signature,
                'HTTP_X_GitHub_Event' => 'push',
                'CONTENT_TYPE' => 'application/json',
            ],
            $payload
        );

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'deploying',
            'commit' => 'abc1234',
        ]);
    }
}
