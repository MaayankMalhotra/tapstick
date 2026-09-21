@extends('layouts.app')

@section('title', 'Maayank Malhotra – Full Stack Software Engineer & Founder of Tabstick')
@section('meta_description', 'Official engineering portfolio of Maayank Malhotra. Full Stack Software Engineer with 4+ years of experience architecting scalable Node.js, React, Laravel, and AWS cloud applications. Founder @ Tabstick.')
@section('canonical', 'https://tabstick.in/maayank')

@section('content')
<!-- ==========================================================================
     PORTFOLIO: MAAYANK MALHOTRA (FULL STACK SOFTWARE ENGINEER & FOUNDER)
     ========================================================================== -->
<div class="portfolio-page-wrapper">
    <!-- Hero Section with Animated Glow & Bio -->
    <section class="portfolio-hero-section">
        <div class="container portfolio-hero-container">
            <div class="portfolio-badge-pill reveal-on-scroll">
                <span class="pulse-dot"></span>
                <span>FULL STACK SOFTWARE ENGINEER • FOUNDER @ TABSTICK</span>
                <span class="location-chip">📍 DELHI NCR, INDIA</span>
            </div>

            <h1 class="portfolio-hero-title reveal-on-scroll">
                Hi, I'm <span class="highlight-neon">Maayank Malhotra</span>.<br>
                I build <span class="text-stroke-pop">scalable systems</span> &amp; high-performance web products.
            </h1>

            <p class="portfolio-hero-subtitle reveal-on-scroll">
                Full Stack Engineer with <strong>4+ years of experience</strong> architecting robust backend microservices (Node.js, Express, PHP, Laravel), responsive frontends (React.js, Redux, TypeScript), and cloud pipelines on AWS (EC2, S3, Docker). Proven track record scaling APIs to <strong>1.5M+ monthly transactions</strong>, optimizing system performance by 20%, and mentoring engineering teams.
            </p>

            <!-- Key Metric Counters (Animated) -->
            <div class="portfolio-metrics-grid reveal-on-scroll">
                <div class="metric-pop-card">
                    <div class="metric-num" data-target="4">4+</div>
                    <div class="metric-label">Years Full-Stack Experience</div>
                </div>
                <div class="metric-pop-card">
                    <div class="metric-num" data-target="1500000">1.5M+</div>
                    <div class="metric-label">Monthly Transactions Handled</div>
                </div>
                <div class="metric-pop-card">
                    <div class="metric-num" data-target="1000000">1M+</div>
                    <div class="metric-label">Monthly API Calls Scaled</div>
                </div>
                <div class="metric-pop-card">
                    <div class="metric-num" data-target="20">20%</div>
                    <div class="metric-label">Backend Latency Optimization</div>
                </div>
                <div class="metric-pop-card">
                    <div class="metric-num" data-target="5">5+</div>
                    <div class="metric-label">End-to-End Enterprise Launches</div>
                </div>
            </div>

            <!-- Quick Action Links -->
            <div class="portfolio-cta-row reveal-on-scroll">
                <a href="#skills" class="btn-pop-primary btn-magnetic">
                    <span>⚡ Explore Skills</span>
                </a>
                <a href="#projects" class="btn-pop-secondary btn-magnetic">
                    <span>🚀 Key Projects</span>
                </a>
                <a href="#experience" class="btn-pop-outline btn-magnetic">
                    <span>💼 Experience</span>
                </a>
                <a href="mailto:maayankmalhotra095@gmail.com" class="btn-pop-contact btn-magnetic">
                    <span>💬 Let's Connect</span>
                </a>
            </div>

            <!-- Contact & Social Pills -->
            <div class="portfolio-social-strip reveal-on-scroll">
                <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="social-pill" title="GitHub Profile">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    <span>github.com/MaayankMalhotra</span>
                </a>
                <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="social-pill" title="LinkedIn Profile">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    <span>LinkedIn Profile</span>
                </a>
                <a href="mailto:maayankmalhotra095@gmail.com" class="social-pill" title="Send Email">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>maayankmalhotra095@gmail.com</span>
                </a>
                <a href="tel:+918799730966" class="social-pill" title="Phone Call">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>+91 8799730966</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         CORE TECHNICAL SKILLS (FULLY ANIMATED & INTERACTIVE)
         ========================================================================== -->
    <section class="portfolio-section" id="skills">
        <div class="container">
            <div class="section-header-pop">
                <span class="section-eyebrow">✦ EXPERTISE &amp; CAPABILITIES</span>
                <h2 class="section-title">Core Technical Skills</h2>
                <p class="section-subtitle">
                    Production-proven proficiency across modern backend architectures, frontend ecosystems, cloud pipelines, and real-time streaming technologies.
                </p>
            </div>

            <!-- Interactive Skill Category Filter Tabs -->
            <div class="skill-category-tabs">
                <button type="button" class="skill-tab-btn active" data-category="all">⚡ All Skills</button>
                <button type="button" class="skill-tab-btn" data-category="backend">🛠️ Backend &amp; APIs</button>
                <button type="button" class="skill-tab-btn" data-category="frontend">🎨 Frontend &amp; UI</button>
                <button type="button" class="skill-tab-btn" data-category="cloud">☁️ Cloud, DevOps &amp; DB</button>
                <button type="button" class="skill-tab-btn" data-category="realtime">📡 Real-Time &amp; Media</button>
                <button type="button" class="skill-tab-btn" data-category="leadership">👥 Engineering Leadership</button>
            </div>

            <!-- Skills Grid with Animated Meter Bars & Impact Snippets -->
            <div class="skills-animated-grid">
                <!-- 1. Node.js & Express.js -->
                <div class="skill-card reveal-on-scroll" data-cat="backend">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-green">🟢</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">Node.js &amp; Express.js</h3>
                            <span class="skill-category-tag">Backend Architecture</span>
                        </div>
                        <span class="skill-percentage">95%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 95%;"></div>
                    </div>
                    <p class="skill-description">
                        Architecting high-concurrency microservices, async event loops, custom middleware, and fault-tolerant REST APIs handling 1M+ calls monthly.
                    </p>
                    <div class="skill-tags">
                        <span>Async/Await</span><span>Event Loops</span><span>Express Middleware</span><span>Clustering</span>
                    </div>
                </div>

                <!-- 2. PHP & Laravel -->
                <div class="skill-card reveal-on-scroll" data-cat="backend">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-red">🐘</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">PHP &amp; Laravel</h3>
                            <span class="skill-category-tag">Backend Architecture</span>
                        </div>
                        <span class="skill-percentage">92%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 92%;"></div>
                    </div>
                    <p class="skill-description">
                        Designed enterprise applications handling 1.5M+ transactions/month. Eloquent ORM tuning, queues, service providers, security hardening.
                    </p>
                    <div class="skill-tags">
                        <span>Laravel 11</span><span>Eloquent ORM</span><span>Queues &amp; Jobs</span><span>Service Repositories</span>
                    </div>
                </div>

                <!-- 3. React.js & Redux -->
                <div class="skill-card reveal-on-scroll" data-cat="frontend">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-blue">⚛️</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">React.js &amp; Redux</h3>
                            <span class="skill-category-tag">Frontend &amp; UI</span>
                        </div>
                        <span class="skill-percentage">94%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 94%;"></div>
                    </div>
                    <p class="skill-description">
                        Building responsive SPAs, centralized Redux state management, custom React hooks, component libraries, and optimized virtual DOM rendering.
                    </p>
                    <div class="skill-tags">
                        <span>React Hooks</span><span>Redux Toolkit</span><span>Custom Components</span><span>Context API</span>
                    </div>
                </div>

                <!-- 4. TypeScript & Modern JavaScript -->
                <div class="skill-card reveal-on-scroll" data-cat="frontend">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-yellow">📜</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">TypeScript &amp; Modern JS</h3>
                            <span class="skill-category-tag">Core Languages</span>
                        </div>
                        <span class="skill-percentage">90%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 90%;"></div>
                    </div>
                    <p class="skill-description">
                        Type-safe enterprise applications, ESNext features, generics, interfaces, strict type guards, reducing runtime production bugs.
                    </p>
                    <div class="skill-tags">
                        <span>TypeScript</span><span>ES6/ESNext</span><span>Strict Typing</span><span>Async Paradigms</span>
                    </div>
                </div>

                <!-- 5. AWS Cloud (EC2, S3) & Docker -->
                <div class="skill-card reveal-on-scroll" data-cat="cloud">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-orange">☁️</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">AWS Cloud &amp; Docker</h3>
                            <span class="skill-category-tag">Cloud &amp; DevOps</span>
                        </div>
                        <span class="skill-percentage">88%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 88%;"></div>
                    </div>
                    <p class="skill-description">
                        Deploying scalable cloud instances on AWS EC2, secure object storage with AWS S3, containerization with Docker, and automated CI/CD pipelines.
                    </p>
                    <div class="skill-tags">
                        <span>AWS EC2</span><span>AWS S3</span><span>Docker</span><span>CI/CD Automation</span>
                    </div>
                </div>

                <!-- 6. WebRTC & Socket.io (Real-Time Streams) -->
                <div class="skill-card reveal-on-scroll" data-cat="realtime">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-purple">📡</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">WebRTC &amp; Socket.io</h3>
                            <span class="skill-category-tag">Real-Time &amp; Media</span>
                        </div>
                        <span class="skill-percentage">90%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 90%;"></div>
                    </div>
                    <p class="skill-description">
                        Real-time peer-to-peer audio/video calling, multi-browser low-latency data channels, call recording, and real-time event broadcasting via WebSockets.
                    </p>
                    <div class="skill-tags">
                        <span>WebRTC P2P</span><span>Socket.io</span><span>Pusher</span><span>Live Media Streams</span>
                    </div>
                </div>

                <!-- 7. Databases: MySQL & MongoDB -->
                <div class="skill-card reveal-on-scroll" data-cat="cloud">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-teal">🗄️</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">MySQL &amp; MongoDB</h3>
                            <span class="skill-category-tag">Database Engineering</span>
                        </div>
                        <span class="skill-percentage">92%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 92%;"></div>
                    </div>
                    <p class="skill-description">
                        Relational schema design, MongoDB aggregation pipelines, indexing, transaction ACID management, and query optimization yielding 20% speedups.
                    </p>
                    <div class="skill-tags">
                        <span>MySQL Indexing</span><span>MongoDB Aggregations</span><span>ACID Transactions</span><span>Query Tuning</span>
                    </div>
                </div>

                <!-- 8. Nginx, CI/CD & Linux -->
                <div class="skill-card reveal-on-scroll" data-cat="cloud">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-gray">🐧</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">Nginx, Linux &amp; CI/CD</h3>
                            <span class="skill-category-tag">Infrastructure</span>
                        </div>
                        <span class="skill-percentage">89%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 89%;"></div>
                    </div>
                    <p class="skill-description">
                        Nginx reverse proxy, HTTP/2 &amp; HTTP/3 configuration, SSL certification, Ubuntu server hardening, GitHub Actions, and zero-downtime deploys.
                    </p>
                    <div class="skill-tags">
                        <span>Nginx Reverse Proxy</span><span>Ubuntu/Linux</span><span>GitHub Actions</span><span>Bash Scripting</span>
                    </div>
                </div>

                <!-- 9. REST APIs & Apollo GraphQL -->
                <div class="skill-card reveal-on-scroll" data-cat="backend">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-pink">🔌</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">REST APIs &amp; Apollo GraphQL</h3>
                            <span class="skill-category-tag">API Design</span>
                        </div>
                        <span class="skill-percentage">94%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 94%;"></div>
                    </div>
                    <p class="skill-description">
                        RESTful and GraphQL API design with Swagger / Postman documentation, rate limiting, JWT &amp; OAuth2 authentication, webhook lifecycle management.
                    </p>
                    <div class="skill-tags">
                        <span>RESTful Standards</span><span>Apollo GraphQL</span><span>Postman &amp; Swagger</span><span>Webhooks</span>
                    </div>
                </div>

                <!-- 10. Engineering Leadership & Mentoring -->
                <div class="skill-card reveal-on-scroll" data-cat="leadership">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap bg-yellow">🤝</div>
                        <div class="skill-title-group">
                            <h3 class="skill-name">Leadership &amp; Mentoring</h3>
                            <span class="skill-category-tag">Engineering Culture</span>
                        </div>
                        <span class="skill-percentage">92%</span>
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--fill-width: 92%;"></div>
                    </div>
                    <p class="skill-description">
                        Structured code reviews, mentoring junior engineers, pair programming, sprint planning, cross-functional coordination with design and QA.
                    </p>
                    <div class="skill-tags">
                        <span>Code Reviews</span><span>Mentoring</span><span>Agile/Scrum</span><span>Cross-Functional</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         KEY PROJECTS SHOWCASE (INTERACTIVE CARDS & LIVE LINKS)
         ========================================================================== -->
    <section class="portfolio-section bg-surface" id="projects">
        <div class="container">
            <div class="section-header-pop">
                <span class="section-eyebrow">✦ SHIPPED &amp; SCALED</span>
                <h2 class="section-title">Featured Engineering Projects</h2>
                <p class="section-subtitle">
                    Real-world platforms, high-scale SaaS architectures, real-time media systems, and enterprise tools built and scaled in production.
                </p>
            </div>

            <div class="projects-grid">
                <!-- 1. Tabstick Store -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE PRODUCTION</div>
                        <span class="project-role-badge">Founder &amp; Full Stack Architect</span>
                    </div>
                    <h3 class="project-title">Tabstick – Creative Sticker E-Commerce Platform</h3>
                    <p class="project-description">
                        Architected and launched an e-commerce platform cataloging 4,450+ die-cut vinyl stickers. Features real-time Razorpay payment integration, tactile Web Audio sound synthesis, high-performance Caddy/Nginx HTTP/2 caching, automated Google Merchant Center feeds, and SEO collection hubs.
                    </p>
                    <div class="project-tech-pills">
                        <span>Laravel 11</span><span>PHP 8.3</span><span>MySQL</span><span>Razorpay API</span><span>Caddy HTTP/2</span><span>SEO Schema</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Visit tabstick.in ↗</span>
                        </a>
                        <a href="{{ route('home') }}" class="btn-project-subtle">
                            <span>Browse Store</span>
                        </a>
                    </div>
                </article>

                <!-- 2. Audio/Video Communication Platform -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE PLATFORM</div>
                        <span class="project-role-badge">Real-Time Media Architect</span>
                    </div>
                    <h3 class="project-title">Real-Time Audio/Video Communication System</h3>
                    <p class="project-description">
                        Engineered a device-to-device communication system utilizing WebRTC and Socket.io with call recording, live chat, and multi-browser low-latency media streams comparable to hardware device and sensor telemetry streaming.
                    </p>
                    <div class="project-tech-pills">
                        <span>PHP</span><span>Node.js</span><span>WebRTC</span><span>Socket.io</span><span>Media Streams</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://snoutiq.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: snoutiq.com ↗</span>
                        </a>
                    </div>
                </article>

                <!-- 3. CRM App (Henry Harvin) -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE ENTERPRISE</div>
                        <span class="project-role-badge">MERN Stack Lead</span>
                    </div>
                    <h3 class="project-title">Enterprise CRM &amp; Workflow Automation Engine</h3>
                    <p class="project-description">
                        Developed an enterprise-grade CRM with automated lead tracking, sales pipeline management, task automation, and real-time analytical dashboards with automated email triggers and webhook notification pipelines.
                    </p>
                    <div class="project-tech-pills">
                        <span>React.js</span><span>Node.js</span><span>Express.js</span><span>MongoDB</span><span>REST APIs</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://crm.henryharvin.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: crm.henryharvin.com ↗</span>
                        </a>
                    </div>
                </article>

                <!-- 4. Job Portal (Jobrito) -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE CLOUD</div>
                        <span class="project-role-badge">Full Stack &amp; DevOps</span>
                    </div>
                    <h3 class="project-title">Jobrito – Scalable Job Search &amp; Hiring Platform</h3>
                    <p class="project-description">
                        Built and deployed a full-featured job listing platform on AWS with Nginx and CI/CD automation. Features multi-faceted search filters, resume upload parsers, applicant management, and an administrative control panel.
                    </p>
                    <div class="project-tech-pills">
                        <span>MERN Stack</span><span>AWS EC2</span><span>Nginx</span><span>CI/CD</span><span>MongoDB</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://jobrito.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: jobrito.com ↗</span>
                        </a>
                    </div>
                </article>

                <!-- 5. RadiusLift (SaaS Platform) -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE SAAS</div>
                        <span class="project-role-badge">SaaS Core Module Developer</span>
                    </div>
                    <h3 class="project-title">RadiusLift – SaaS Workflow Automation Platform</h3>
                    <p class="project-description">
                        Engineered core modules for a SaaS platform supporting business workflow automation and subscription-based service delivery, integrating secure payment flows, third-party APIs, and admin tooling.
                    </p>
                    <div class="project-tech-pills">
                        <span>Node.js</span><span>React.js</span><span>SaaS Billing</span><span>API Integrations</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://radiuslift.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: radiuslift.com ↗</span>
                        </a>
                    </div>
                </article>

                <!-- 6. Think Champ -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE CLIENT APP</div>
                        <span class="project-role-badge">Frontend &amp; API Integrator</span>
                    </div>
                    <h3 class="project-title">Think Champ – Custom Enterprise Web App</h3>
                    <p class="project-description">
                        Delivered a custom web application handling responsive UI development, backend API integration, and performance enhancements based on business requirements.
                    </p>
                    <div class="project-tech-pills">
                        <span>React.js</span><span>REST APIs</span><span>UI Components</span><span>Performance</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://think-champ.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: think-champ.com ↗</span>
                        </a>
                    </div>
                </article>

                <!-- 7. Henry Harvin E-Learning -->
                <article class="project-card reveal-on-scroll">
                    <div class="project-header">
                        <div class="project-status live">🟢 LIVE ED-TECH</div>
                        <span class="project-role-badge">Platform Engineer</span>
                    </div>
                    <h3 class="project-title">Henry Harvin – High-Traffic E-Learning Platform</h3>
                    <p class="project-description">
                        Contributed to high-traffic e-learning platform supporting course delivery, user management, and platform-wide feature updates with optimized query caches and microservice CI/CD pipelines.
                    </p>
                    <div class="project-tech-pills">
                        <span>Laravel</span><span>React.js</span><span>MySQL</span><span>Redis</span><span>Microservices</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://henryharvin.com" target="_blank" rel="noopener noreferrer" class="btn-project-live">
                            <span>Live: henryharvin.com ↗</span>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         PROFESSIONAL WORK EXPERIENCE (TIMELINE)
         ========================================================================== -->
    <section class="portfolio-section" id="experience">
        <div class="container">
            <div class="section-header-pop">
                <span class="section-eyebrow">✦ CAREER PATH</span>
                <h2 class="section-title">Professional Experience</h2>
                <p class="section-subtitle">
                    4+ years building, scaling, and maintaining mission-critical applications across high-growth product engineering teams.
                </p>
            </div>

            <div class="experience-timeline">
                <!-- 1. Thinktail Global -->
                <div class="timeline-item reveal-on-scroll">
                    <div class="timeline-marker"></div>
                    <div class="timeline-card">
                        <div class="timeline-header">
                            <div>
                                <h3 class="timeline-role">Software Engineer</h3>
                                <h4 class="timeline-company">Thinktail Global Pvt. Ltd.</h4>
                            </div>
                            <span class="timeline-period">Aug 2025 – Present</span>
                        </div>
                        <ul class="timeline-bullet-list">
                            <li>Lead end-to-end full-stack development of scalable web applications using <strong>React.js and Node.js</strong>, architecting reusable, maintainable modules that support long-term product growth and reduce technical debt.</li>
                            <li>Design and deliver advanced analytics and automation features that streamline client operations, reduce manual workload, and improve reporting accuracy.</li>
                            <li>Mentor junior developers through structured code reviews and pair programming sessions, raising overall code quality, consistency, and team output.</li>
                            <li>Coordinate closely with design, QA, and backend teams throughout the development lifecycle to ensure on-time, high-quality releases.</li>
                        </ul>
                    </div>
                </div>

                <!-- 2. Cracode Consulting -->
                <div class="timeline-item reveal-on-scroll">
                    <div class="timeline-marker"></div>
                    <div class="timeline-card">
                        <div class="timeline-header">
                            <div>
                                <h3 class="timeline-role">Software Engineer</h3>
                                <h4 class="timeline-company">Cracode Consulting Pvt. Ltd.</h4>
                            </div>
                            <span class="timeline-period">Aug 2024 – Aug 2025</span>
                        </div>
                        <ul class="timeline-bullet-list">
                            <li>Built and maintained <strong>Laravel + React.js</strong> applications for enterprise clients, designing secure REST APIs used across multiple internal and client-facing services.</li>
                            <li>Deployed and scaled APIs handling <strong>1.5M+ transactions per month</strong>, focusing on performance, reliability, and fault tolerance under production load.</li>
                            <li>Developed reusable UI component libraries that accelerated delivery velocity across multi-tenant engineering projects.</li>
                        </ul>
                    </div>
                </div>

                <!-- 3. Henry Harvin -->
                <div class="timeline-item reveal-on-scroll">
                    <div class="timeline-marker"></div>
                    <div class="timeline-card">
                        <div class="timeline-header">
                            <div>
                                <h3 class="timeline-role">Software Engineer</h3>
                                <h4 class="timeline-company">Henry Harvin</h4>
                            </div>
                            <span class="timeline-period">Jan 2023 – Aug 2024</span>
                        </div>
                        <ul class="timeline-bullet-list">
                            <li>Improved platform performance by <strong>20% through backend optimization</strong>, database query tuning, and Redis caching strategies.</li>
                            <li>Delivered 5 product releases end-to-end, from technical planning through implementation, testing, and production deployment.</li>
                            <li>Enhanced CI/CD pipelines for a microservices architecture supporting <strong>1M+ API calls monthly</strong>, improving deployment frequency and reducing rollback incidents.</li>
                            <li>Developed REST APIs and backend systems for <strong>ICICI Lombard</strong> and <strong>Ninja CRM</strong>, improving data reliability, system uptime, and user engagement.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         EDUCATION & ACADEMICS
         ========================================================================== -->
    <section class="portfolio-section bg-surface" id="education">
        <div class="container">
            <div class="section-header-pop">
                <span class="section-eyebrow">✦ BACKGROUND &amp; CREDENTIALS</span>
                <h2 class="section-title">Education &amp; Qualifications</h2>
            </div>

            <div class="education-grid">
                <div class="edu-card reveal-on-scroll">
                    <div class="edu-badge">🎓 Bachelor of Technology</div>
                    <h3 class="edu-degree">B.Tech, Electronics</h3>
                    <h4 class="edu-institution">YMCA University</h4>
                    <div class="edu-meta">
                        <span>2018 – 2022</span>
                        <span class="edu-score">CGPA: 7.606</span>
                    </div>
                </div>

                <div class="edu-card reveal-on-scroll">
                    <div class="edu-badge">🏫 Senior Secondary (XII)</div>
                    <h3 class="edu-degree">Science &amp; Mathematics</h3>
                    <h4 class="edu-institution">D.A.V. Public School</h4>
                    <div class="edu-meta">
                        <span>2017 – 2018</span>
                        <span class="edu-score">Score: 74%</span>
                    </div>
                </div>

                <div class="edu-card reveal-on-scroll">
                    <div class="edu-badge">🏫 Secondary (X)</div>
                    <h3 class="edu-degree">All General Subjects</h3>
                    <h4 class="edu-institution">D.A.V. Public School</h4>
                    <div class="edu-meta">
                        <span>2015 – 2016</span>
                        <span class="edu-score">CGPA: 8.6</span>
                    </div>
                </div>

                <div class="edu-card reveal-on-scroll">
                    <div class="edu-badge">🌐 Language Proficiency</div>
                    <h3 class="edu-degree">IELTS (Academic)</h3>
                    <h4 class="edu-institution">International English Language Testing</h4>
                    <div class="edu-meta">
                        <span>Certified</span>
                        <span class="edu-score highlight-score">Band Score: 7.0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         DIRECT CONTACT & CONNECT SECTION
         ========================================================================== -->
    <section class="portfolio-section" id="contact">
        <div class="container">
            <div class="portfolio-contact-card reveal-on-scroll">
                <div class="contact-header">
                    <span class="contact-eyebrow">✦ LET'S COLLABORATE</span>
                    <h2 class="contact-title">Ready to build something impactful?</h2>
                    <p class="contact-subtitle">
                        Whether you are looking for a full-stack engineer, a technical lead for high-throughput microservices, or want to discuss Tabstick sticker drops — my inbox is always open.
                    </p>
                </div>

                <div class="contact-actions-grid">
                    <div class="contact-method-card">
                        <div class="method-icon">✉️</div>
                        <div class="method-details">
                            <span class="method-label">Direct Email</span>
                            <span class="method-value" id="email-text">maayankmalhotra095@gmail.com</span>
                        </div>
                        <button type="button" class="btn-copy-contact" onclick="copyContactText('maayankmalhotra095@gmail.com', this)">
                            <span>Copy Email</span>
                        </button>
                    </div>

                    <div class="contact-method-card">
                        <div class="method-icon">📞</div>
                        <div class="method-details">
                            <span class="method-label">Phone / WhatsApp</span>
                            <span class="method-value">+91 8799730966</span>
                        </div>
                        <a href="tel:+918799730966" class="btn-call-contact">
                            <span>Call Now</span>
                        </a>
                    </div>

                    <div class="contact-method-card">
                        <div class="method-icon">💼</div>
                        <div class="method-details">
                            <span class="method-label">LinkedIn Profile</span>
                            <span class="method-value">linkedin.com/in/maayank-malhotra-a59a55186</span>
                        </div>
                        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="btn-copy-contact">
                            <span>Connect ↗</span>
                        </a>
                    </div>

                    <div class="contact-method-card">
                        <div class="method-icon">🐙</div>
                        <div class="method-details">
                            <span class="method-label">GitHub Repositories</span>
                            <span class="method-value">github.com/MaayankMalhotra</span>
                        </div>
                        <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-copy-contact">
                            <span>View Code ↗</span>
                        </a>
                    </div>
                </div>

                <div class="contact-bottom-row">
                    <a href="{{ route('home') }}" class="btn-pop-primary" style="padding:14px 28px;">
                        <span>← Back to Tabstick Store</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- ==========================================================================
     JSON-LD PERSON & FOUNDER STRUCTURED DATA (SEO)
     ========================================================================== -->
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Person",
    "name": "Maayank Malhotra",
    "alternateName": "Mayank Malhotra",
    "givenName": "Maayank",
    "familyName": "Malhotra",
    "jobTitle": "Full Stack Software Engineer",
    "description": "Full Stack Software Engineer with 4+ years of experience architecting scalable Node.js, Express, React, Laravel, and AWS cloud applications. Founder of Tabstick.",
    "url": "https://tabstick.in/maayank",
    "email": "maayankmalhotra095@gmail.com",
    "telephone": "+918799730966",
    "founder": {
        "@type": "Organization",
        "name": "Tabstick",
        "url": "https://tabstick.in"
    },
    "worksFor": {
        "@type": "Organization",
        "name": "Thinktail Global Pvt. Ltd."
    },
    "alumniOf": {
        "@type": "CollegeOrUniversity",
        "name": "YMCA University"
    },
    "knowsAbout": [
        "Full Stack Web Development",
        "Node.js",
        "Express.js",
        "PHP",
        "Laravel",
        "React.js",
        "Redux",
        "TypeScript",
        "AWS EC2",
        "AWS S3",
        "Docker",
        "WebRTC",
        "Socket.io",
        "MySQL",
        "MongoDB",
        "REST APIs",
        "GraphQL",
        "CI/CD Pipelines"
    ],
    "sameAs": [
        "https://www.linkedin.com/in/maayank-malhotra-a59a55186/",
        "https://github.com/MaayankMalhotra"
    ]
}
</script>

@push('scripts')
<script>
    // Tab switching for skills
    document.querySelectorAll('.skill-tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.skill-tab-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const selectedCategory = button.getAttribute('data-category');
            document.querySelectorAll('.skill-card').forEach(card => {
                if (selectedCategory === 'all' || card.getAttribute('data-cat') === selectedCategory) {
                    card.style.display = 'flex';
                    card.classList.add('animate-fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Copy to clipboard helper
    function copyContactText(text, btn) {
        navigator.clipboard.writeText(text).then(() => {
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<span>✓ Copied!</span>';
            btn.style.background = '#16a34a';
            btn.style.color = '#ffffff';
            setTimeout(() => {
                btn.innerHTML = originalHtml;
                btn.style.background = '';
                btn.style.color = '';
            }, 2000);
        });
    }

    // Scroll reveal observer for skill bar animations
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const fillBar = entry.target.querySelector('.skill-bar-fill');
                if (fillBar) {
                    fillBar.classList.add('animate-fill');
                }
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.skill-card').forEach(card => {
        skillObserver.observe(card);
    });
</script>
@endpush
@endsection
