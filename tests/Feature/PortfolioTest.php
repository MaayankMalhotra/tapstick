<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_slug_maayank_returns_ok_with_complete_profile(): void
    {
        $response = $this->get('/maayank');
        $response->assertOk();

        // Check identity and title
        $response->assertSee('Maayank Malhotra');
        $response->assertSee('FULL STACK SOFTWARE ENGINEER • FOUNDER @ TABSTICK');
        $response->assertSee('DELHI NCR, INDIA');

        // Check key metrics
        $response->assertSee('Years Full-Stack Experience');
        $response->assertSee('1.5M+');
        $response->assertSee('Monthly Transactions Handled');

        // Check core technical skills
        $response->assertSee('Node.js &amp; Express.js', false);
        $response->assertSee('PHP &amp; Laravel', false);
        $response->assertSee('React.js &amp; Redux', false);
        $response->assertSee('WebRTC &amp; Socket.io', false);
        $response->assertSee('AWS Cloud &amp; Docker', false);
        $response->assertSee('MySQL &amp; MongoDB', false);

        // Check key projects
        $response->assertSee('Tabstick – Creative Sticker E-Commerce Platform');
        $response->assertSee('Real-Time Audio/Video Communication System');
        $response->assertSee('Enterprise CRM &amp; Workflow Automation Engine', false);
        $response->assertSee('Jobrito – Scalable Job Search &amp; Hiring Platform', false);
        $response->assertSee('RadiusLift – SaaS Workflow Automation Platform', false);

        // Check professional experience
        $response->assertSee('Thinktail Global Pvt. Ltd.');
        $response->assertSee('Cracode Consulting Pvt. Ltd.');
        $response->assertSee('Henry Harvin');

        // Check education
        $response->assertSee('YMCA University');
        $response->assertSee('B.Tech, Electronics');
        $response->assertSee('Band Score: 7.0');

        // Check contact details
        $response->assertSee('maayankmalhotra095@gmail.com');
        $response->assertSee('+91 8799730966');
        $response->assertSee('https://github.com/MaayankMalhotra');
        $response->assertSee('https://www.linkedin.com/in/maayank-malhotra-a59a55186/');

        // Verify sticker-peel-loader is NOT rendered on the portfolio page
        $response->assertDontSee('id="sticker-peel-loader"', false);
    }

    public function test_mayank_alias_redirects_301_to_maayank(): void
    {
        $response = $this->get('/mayank');
        $response->assertRedirect('/maayank');
        $this->assertSame(301, $response->getStatusCode());
    }

    public function test_portfolio_contains_person_schema(): void
    {
        $response = $this->get('/maayank');
        $response->assertOk();

        $response->assertSee('"@type": "Person"', false);
        $response->assertSee('"name": "Maayank Malhotra"', false);
        $response->assertSee('"jobTitle": "Full Stack Software Engineer"', false);
        $response->assertSee('https://www.linkedin.com/in/maayank-malhotra-a59a55186/', false);
        $response->assertSee('https://github.com/MaayankMalhotra', false);
    }

    public function test_sitemap_includes_portfolio_url(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertOk();
        $response->assertSee('https://tabstick.in/maayank');
    }

    public function test_homepage_and_storefront_render_connect_directly_with_the_founder_button(): void
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('Connect directly with the founder');
        $response->assertSee(url('/maayank'));
    }

    public function test_portfolio_page_renders_interactive_contact_form_and_resume_download_options(): void
    {
        $response = $this->get('/maayank');
        $response->assertOk();

        // Check resume download options
        $response->assertSee(route('portfolio.resume'));
        $response->assertSee('Download Official CV');
        $response->assertSee('Download CV (PDF)');
        $response->assertSee('Official Verified Credentials');

        // Check form elements and pre-populated content
        $response->assertSee('id="portfolio-contact-form"', false);
        $response->assertSee('name="name"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="phone"', false);
        $response->assertSee('name="subject"', false);
        $response->assertSee('name="message"', false);
        $response->assertSee('Pre-filled for 1-click send');
        $response->assertSee('Hi Maayank, I reviewed your engineering portfolio');
        $response->assertSee('Send Message &amp; Receive Official Resume (PDF)', false);
    }

    public function test_user_can_submit_contact_form_and_email_is_shot_with_resume_attachment(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $payload = [
            'name' => 'Sarah Connor',
            'email' => 'sarah@skynet.com',
            'phone' => '+91 9999988888',
            'subject' => 'Senior Backend Role',
            'message' => 'We want you to lead our distributed engineering team in building scalable microservices.',
        ];

        $response = $this->postJson(route('portfolio.contact'), $payload);
        $response->assertOk();
        $response->assertJson([
            'success' => true,
        ]);

        // Assert database recorded the inquiry
        $this->assertDatabaseHas('portfolio_inquiries', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@skynet.com',
            'subject' => 'Senior Backend Role',
        ]);

        // Assert confirmation email was shot to the USER with resume attached
        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\PortfolioUserConfirmationMail::class, function ($mail) {
            $attachments = $mail->attachments();
            $hasResumeAttachment = count($attachments) > 0;

            return $mail->hasTo('sarah@skynet.com') &&
                   $mail->inquiry->name === 'Sarah Connor' &&
                   $hasResumeAttachment;
        });

        // Assert notification email was shot to ADMIN
        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\PortfolioAdminNotificationMail::class, function ($mail) {
            return $mail->hasTo('maayankmalhotra095@gmail.com') &&
                   $mail->inquiry->email === 'sarah@skynet.com';
        });
    }

    public function test_user_can_submit_with_only_email_and_defaults_are_applied(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $payload = [
            'email' => 'recruiter@topfirm.com',
        ];

        $response = $this->postJson(route('portfolio.contact'), $payload);
        $response->assertOk();
        $response->assertJson([
            'success' => true,
        ]);

        // Assert database recorded with default fallbacks
        $this->assertDatabaseHas('portfolio_inquiries', [
            'name' => 'Portfolio Visitor',
            'email' => 'recruiter@topfirm.com',
            'subject' => 'Engineering Inquiry & Resume Request',
        ]);

        // Assert confirmation email was shot with resume
        \Illuminate\Support\Facades\Mail::assertSent(\App\Mail\PortfolioUserConfirmationMail::class, function ($mail) {
            return $mail->hasTo('recruiter@topfirm.com') && count($mail->attachments()) > 0;
        });
    }

    public function test_portfolio_contact_form_validates_required_email(): void
    {
        $response = $this->postJson(route('portfolio.contact'), [
            'email' => 'not-an-email',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    public function test_resume_download_endpoint_returns_pdf(): void
    {
        $response = $this->get('/maayank/resume');
        $response->assertOk();
        $response->assertHeader('content-type', 'application/pdf');

        // Test aliases redirect 301
        $this->get('/resume')->assertRedirect('/maayank/resume')->assertStatus(301);
        $this->get('/cv')->assertRedirect('/maayank/resume')->assertStatus(301);
        $this->get('/maayank/cv')->assertRedirect('/maayank/resume')->assertStatus(301);
    }
}
