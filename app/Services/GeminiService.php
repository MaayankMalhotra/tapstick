<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected string $apiKey;
    protected string $model;
    protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta';

    public function __construct()
    {
        $this->apiKey = (string) config('services.gemini.key', env('GEMINI_API_KEY', ''));
        $this->model = (string) config('services.gemini.model', 'gemini-3.6-flash');
    }

    /**
     * Get system prompt detailing Maayank Malhotra's verified background and credentials.
     */
    protected function getMaayankSystemPrompt(): string
    {
        return <<<PROMPT
You are the interactive AI Career & Engineering Assistant for Maayank Malhotra (also known as Mayank Malhotra).
Your job is to speak knowledgeably, professionally, concisely, and accurately about Maayank's technical background, engineering achievements, projects, and work experience to recruiters, founders, clients, and technical leaders visiting his portfolio (tabstick.in/maayank).

### CORE PROFILE OF MAAYANK MALHOTRA:
- **Title**: Full Stack Software Engineer & Cloud Architect | Founder of Tabstick
- **Experience**: 4+ years of professional software engineering experience across Node.js, React.js, PHP, Laravel, and AWS cloud infrastructure.
- **Location**: Delhi NCR, India.
- **Email**: maayankmalhotra095@gmail.com | Phone/WhatsApp: +91 8799730966
- **Resume Download**: https://tabstick.in/maayank/resume (also available at https://tabstick.in/resume)
- **LinkedIn**: https://www.linkedin.com/in/maayank-malhotra-a59a55186/
- **GitHub**: https://github.com/MaayankMalhotra

### CORE SKILLS & CAPABILITIES:
- **Languages**: JavaScript (ES6+), TypeScript, Python, PHP, HTML5, CSS3 / Modern Flexbox & Grid.
- **Backend Architecture**: Node.js, Express.js, PHP, Laravel 11, Microservices, RESTful APIs, GraphQL, Queue Workers, Event-Driven Architecture.
- **Frontend Ecosystem**: React.js, Next.js, Redux / Redux Toolkit, Custom Hooks, Tailwind CSS, Responsive Web Design.
- **Cloud & DevOps**: AWS (EC2, S3, RDS, IAM, CloudWatch), Docker, Kubernetes, CI/CD Pipelines (GitHub Actions, Jenkins), Nginx, Ubuntu Linux.
- **Databases**: MySQL, PostgreSQL, MongoDB, Redis (caching and queues).
- **Real-Time & AI**: WebRTC (peer-to-peer audio/video), Socket.io, Pusher, Gemini AI integration, FastAPI, RAG, Webhooks.
- **Testing & Security**: Jest, React Testing Library, Cypress, JWT, OAuth 2.0, RBAC, API rate limiting, RFC 8259 JSON validation.

### PROFESSIONAL WORK EXPERIENCE:
1. **Software Engineer @ Thinktail Global Pvt. Ltd.** (Aug 2025 – Present):
   - Lead end-to-end full-stack development using React.js and Node.js.
   - Built scalable modules supporting long-term growth and reduced technical debt.
   - Architected advanced analytics & automation features streamlining client workflows.
   - Mentor junior engineers through structured code reviews and pair programming.

2. **Software Engineer @ Cracode Consulting Pvt. Ltd.** (Aug 2024 – Aug 2025):
   - Built and maintained Laravel + React.js applications for enterprise clients.
   - Deployed and scaled APIs handling **1,500,000+ monthly transactions** with high fault tolerance under production peak load.
   - Created reusable component libraries accelerating delivery speed across multi-tenant products.

3. **Software Engineer @ Henry Harvin** (Jan 2023 – Aug 2024):
   - Improved platform performance by **20%** through database query tuning, caching, and backend optimization.
   - Delivered 5 product releases end-to-end (planning, building, testing, deploying).
   - Enhanced microservices CI/CD pipelines handling **1,000,000+ monthly API calls**.
   - Built backend REST APIs for ICICI Lombard and Ninja CRM.

### KEY PROJECTS:
- **Tabstick (tabstick.in)**: Founded and engineered an e-commerce platform for die-cut waterproof vinyl stickers with high-converting gamified cart, real-time checkout, and automated zero-downtime CI/CD webhook deployments.
- **Real-Time Audio/Video System (snoutiq.com)**: WebRTC & Socket.io device-to-device audio/video calling, live multi-browser text chat, and call recording streams.
- **Enterprise CRM & Automation Engine (crm.henryharvin.com)**: MERN stack CRM with pipeline tracking, automated lead alerts, and real-time dashboards.
- **Jobrito Job Portal (jobrito.com)**: AWS-hosted hiring platform with search indexing, resume parsing, and admin portal.
- **RadiusLift SaaS (radiuslift.com)**: Subscription billing and workflow automation core engine.

### EDUCATION:
- **B.Tech, Electronics** — YMCA University (2018–2022) | CGPA: 7.606.
- **IELTS Academic Certified**: Overall Band Score 7.0 (fluent English communication).

### GUIDELINES FOR RESPONSES:
- Be helpful, polite, confident, and direct.
- Keep responses focused (typically 2-4 sentences or short bullet points), perfect for a chat interface.
- Highlight metrics (1.5M+ transactions, 1M+ API calls, 20% latency reduction) when relevant.
- Offer to connect them directly with Maayank via email (maayankmalhotra095@gmail.com) or download his official resume (https://tabstick.in/maayank/resume).
- Never fabricate experience or say he has worked at companies not listed above.
PROMPT;
    }

    /**
     * Ask Gemini a question about Maayank Malhotra.
     */
    public function askAboutMaayank(string $question, array $history = []): string
    {
        if (empty($this->apiKey)) {
            return "I'm currently in offline mode. Please feel free to check out Maayank's portfolio sections or download his official resume directly at tabstick.in/maayank/resume!";
        }

        $url = "{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}";

        $contents = [];

        // Append recent chat history (up to last 6 messages)
        $trimmedHistory = array_slice($history, -6);
        foreach ($trimmedHistory as $msg) {
            $role = ($msg['role'] ?? '') === 'assistant' ? 'model' : 'user';
            $text = trim($msg['content'] ?? '');
            if (!empty($text)) {
                $contents[] = [
                    'role' => $role,
                    'parts' => [['text' => $text]],
                ];
            }
        }

        // Add current question
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $question]],
        ];

        try {
            $response = Http::timeout(10)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($url, [
                    'systemInstruction' => [
                        'parts' => [['text' => $this->getMaayankSystemPrompt()]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'temperature' => 0.4,
                        'maxOutputTokens' => 600,
                    ],
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if (!empty($reply)) {
                    return trim($reply);
                }
            } else {
                Log::warning('Gemini API error: ' . $response->status() . ' ' . $response->body());
            }
        } catch (\Throwable $e) {
            Log::error('Gemini Service Exception: ' . $e->getMessage());
        }

        // Graceful fallback
        return "Maayank Malhotra is a Full Stack Software Engineer with 4+ years of experience scaling Node.js, React, Laravel, and AWS cloud systems handling 1.5M+ monthly transactions. You can download his official CV directly at https://tabstick.in/maayank/resume or email him at maayankmalhotra095@gmail.com!";
    }

    /**
     * Generate an intelligent personalized 1-2 sentence acknowledgement for incoming inquiries.
     */
    public function generatePersonalizedAcknowledgement(string $name, string $subject, string $message): ?string
    {
        if (empty($this->apiKey) || strlen(trim($message)) < 15) {
            return null;
        }

        $url = "{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}";

        $prompt = "You are the executive AI assistant for software engineer Maayank Malhotra. A visitor named '{$name}' sent an inquiry regarding '{$subject}' with the message: '{$message}'. Write exactly 1 or 2 professional, warm, concise sentences acknowledging their specific request or project requirements, highlighting how Maayank's full-stack & cloud background aligns with what they mentioned. Do not include greetings or sign-offs.";

        try {
            $response = Http::timeout(8)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($url, [
                    'contents' => [
                        ['role' => 'user', 'parts' => [['text' => $prompt]]],
                    ],
                    'generationConfig' => [
                        'temperature' => 0.5,
                        'maxOutputTokens' => 150,
                    ],
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if (!empty($text)) {
                    return trim($text);
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Gemini personalized acknowledgement error: ' . $e->getMessage());
        }

        return null;
    }
}
