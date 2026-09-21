<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maayank Malhotra – Full Stack Software Engineer &amp; Founder</title>
    <meta name="description" content="Official portfolio of Maayank Malhotra, Full Stack Software Engineer with 4+ years of experience architecting scalable Node.js, React.js, Laravel, and AWS cloud applications.">
    <meta name="keywords" content="Maayank Malhotra, Mayank Malhotra, Full Stack Developer, Software Engineer, Node.js, React.js, Laravel, WebRTC, AWS, Tabstick Founder">
    <link rel="canonical" href="https://tabstick.in/maayank">

    <!-- Open Graph / Social Cards -->
    <meta property="og:type" content="profile">
    <meta property="og:title" content="Maayank Malhotra – Full Stack Software Engineer &amp; Founder">
    <meta property="og:description" content="4+ years scaling Node.js, React, Laravel, and AWS microservices handling 1.5M+ monthly transactions. Founder of Tabstick.">
    <meta property="og:url" content="https://tabstick.in/maayank">
    <meta property="og:image" content="{{ asset('favicon-192x192.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Inter & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Standalone Elite Developer Portfolio Stylesheet -->
    <style>
        :root {
            --bg-base: #090D16;
            --bg-surface: #0F1422;
            --bg-card: #141B2D;
            --bg-card-hover: #1A2238;
            --border-subtle: #1E293B;
            --border-focus: #38BDF8;
            --text-primary: #F8FAFC;
            --text-secondary: #94A3B8;
            --text-muted: #64748B;
            --accent-cyan: #06B6D4;
            --accent-blue: #3B82F6;
            --accent-purple: #8B5CF6;
            --accent-green: #10B981;
            --accent-amber: #F59E0B;
            --accent-rose: #F43F5E;
            --font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --radius-full: 9999px;
            --glow-cyan: 0 0 25px rgba(6, 182, 212, 0.25);
            --glow-purple: 0 0 30px rgba(139, 92, 246, 0.25);
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            background-color: var(--bg-base);
            color: var(--text-primary);
            font-family: var(--font-sans);
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }

        /* Ambient Glow Mesh Background */
        .ambient-glow-mesh {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .glow-circle-1 {
            position: absolute;
            top: -10%;
            right: -5%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.12) 0%, rgba(9, 13, 22, 0) 70%);
            border-radius: 50%;
            filter: blur(60px);
        }

        .glow-circle-2 {
            position: absolute;
            top: 40%;
            left: -10%;
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.10) 0%, rgba(9, 13, 22, 0) 70%);
            border-radius: 50%;
            filter: blur(80px);
        }

        .glow-circle-3 {
            position: absolute;
            bottom: 5%;
            right: 15%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.10) 0%, rgba(9, 13, 22, 0) 70%);
            border-radius: 50%;
            filter: blur(70px);
        }

        /* Grid Background Pattern */
        .grid-pattern-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* ==========================================================================
           TOP NAVIGATION BAR
           ========================================================================== */
        .dev-navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(9, 13, 22, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 16px 0;
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .brand-logo-badge {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-purple));
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-mono);
            font-weight: 800;
            font-size: 0.95rem;
            color: #FFFFFF;
            box-shadow: 0 0 14px rgba(6, 182, 212, 0.4);
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.05rem;
            letter-spacing: -0.01em;
        }

        .brand-name span {
            color: var(--accent-cyan);
            font-family: var(--font-mono);
            font-weight: 500;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--accent-cyan);
        }

        .nav-cta-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-nav-secondary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-secondary);
            font-size: 0.88rem;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-subtle);
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.2s ease;
        }

        .btn-nav-secondary:hover {
            color: var(--text-primary);
            border-color: var(--text-muted);
            background: rgba(255, 255, 255, 0.05);
        }

        .btn-nav-primary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            color: #FFFFFF;
            font-size: 0.88rem;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: var(--radius-sm);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.35);
            transition: all 0.2s ease;
        }

        .btn-nav-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 0 25px rgba(6, 182, 212, 0.55);
        }

        /* ==========================================================================
           HERO SECTION WITH CODE TERMINAL
           ========================================================================== */
        .hero-section {
            padding: 90px 0 80px;
            position: relative;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
            align-items: center;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: 0.78rem;
            font-weight: 700;
            font-family: var(--font-mono);
            color: var(--accent-green);
            letter-spacing: 0.04em;
            margin-bottom: 24px;
        }

        .status-pulse {
            width: 8px;
            height: 8px;
            background: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--accent-green);
            animation: pulseDot 1.8s infinite;
        }

        @keyframes pulseDot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.3); }
        }

        .hero-title {
            font-size: clamp(2.5rem, 5.2vw, 4rem);
            font-weight: 900;
            line-height: 1.12;
            letter-spacing: -0.03em;
            margin-bottom: 20px;
        }

        .gradient-text-cyan {
            background: linear-gradient(135deg, #38BDF8 0%, #06B6D4 50%, #818CF8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 600px;
        }

        .hero-subtitle strong {
            color: var(--text-primary);
            font-weight: 600;
        }

        /* Metric Counters Strip */
        .metrics-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 36px;
            padding: 18px;
            background: rgba(20, 27, 45, 0.5);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            backdrop-filter: blur(8px);
        }

        .metric-item {
            display: flex;
            flex-direction: column;
        }

        .metric-value {
            font-family: var(--font-mono);
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--accent-cyan);
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .metric-title {
            font-size: 0.76rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            color: #FFFFFF;
            font-weight: 700;
            font-size: 0.96rem;
            padding: 12px 24px;
            border-radius: var(--radius-sm);
            box-shadow: var(--glow-cyan);
            transition: all 0.2s ease;
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.5);
        }

        .btn-hero-outline {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-surface);
            color: var(--text-primary);
            border: 1px solid var(--border-subtle);
            font-weight: 600;
            font-size: 0.96rem;
            padding: 12px 22px;
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
        }

        .btn-hero-outline:hover {
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            transform: translateY(-2px);
        }

        /* Terminal Window Card */
        .terminal-window {
            background: #0B101E;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), var(--glow-purple);
            overflow: hidden;
            font-family: var(--font-mono);
            position: relative;
        }

        .terminal-header {
            background: #111827;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border-subtle);
        }

        .terminal-dots {
            display: flex;
            gap: 6px;
        }

        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot-red { background: #EF4444; }
        .dot-yellow { background: #F59E0B; }
        .dot-green { background: #10B981; }

        .terminal-title {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .terminal-body {
            padding: 20px;
            font-size: 0.85rem;
            line-height: 1.7;
            color: #E2E8F0;
            overflow-x: auto;
        }

        .code-keyword { color: #F43F5E; }
        .code-var { color: #38BDF8; }
        .code-property { color: #A78BFA; }
        .code-string { color: #34D399; }
        .code-number { color: #FBBF24; }
        .code-comment { color: #64748B; font-style: italic; }

        /* ==========================================================================
           SECTION HEADINGS & LAYOUT
           ========================================================================== */
        .section-wrap {
            padding: 80px 0;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
        }

        .section-header {
            margin-bottom: 48px;
        }

        .section-tag {
            display: inline-block;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--accent-cyan);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 8px;
        }

        .section-heading {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .section-lead {
            font-size: 1.05rem;
            color: var(--text-secondary);
            max-width: 680px;
            line-height: 1.65;
        }

        /* ==========================================================================
           CORE TECHNICAL SKILLS (ANIMATED CARDS & METERS)
           ========================================================================== */
        .skills-filter-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 32px;
        }

        .skill-filter-btn {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-sm);
            padding: 8px 16px;
            font-size: 0.86rem;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .skill-filter-btn:hover {
            border-color: var(--text-muted);
            color: var(--text-primary);
        }

        .skill-filter-btn.active {
            background: rgba(6, 182, 212, 0.12);
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.2);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
            gap: 20px;
        }

        .skill-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 24px;
            position: relative;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
        }

        .skill-card:hover {
            border-color: rgba(6, 182, 212, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), var(--glow-cyan);
        }

        .skill-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .skill-badge-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .skill-avatar {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-subtle);
        }

        .skill-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .skill-category {
            font-size: 0.74rem;
            color: var(--text-muted);
            text-transform: uppercase;
            font-family: var(--font-mono);
        }

        .skill-pct {
            font-family: var(--font-mono);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--accent-cyan);
        }

        .meter-track {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: var(--radius-full);
            overflow: hidden;
            margin-bottom: 14px;
        }

        .meter-fill {
            height: 100%;
            width: var(--progress, 80%);
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue));
            border-radius: var(--radius-full);
            transition: width 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .skill-info {
            font-size: 0.88rem;
            color: var(--text-secondary);
            line-height: 1.55;
            margin-bottom: 16px;
            flex: 1;
        }

        .skill-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .chip {
            font-family: var(--font-mono);
            font-size: 0.72rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            padding: 3px 8px;
            border-radius: 4px;
        }

        /* ==========================================================================
           KEY PROJECTS SHOWCASE
           ========================================================================== */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 24px;
        }

        .project-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 28px;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
            position: relative;
        }

        .project-card:hover {
            border-color: rgba(139, 92, 246, 0.5);
            transform: translateY(-4px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4), var(--glow-purple);
        }

        .project-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .live-tag {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 3px 10px;
            border-radius: var(--radius-full);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .role-tag {
            font-size: 0.76rem;
            color: var(--text-muted);
            font-family: var(--font-mono);
        }

        .project-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .project-detail {
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 20px;
            flex: 1;
        }

        .project-stack-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 22px;
        }

        .stack-pill {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 600;
            color: var(--accent-cyan);
            background: rgba(6, 182, 212, 0.08);
            border: 1px solid rgba(6, 182, 212, 0.2);
            padding: 4px 10px;
            border-radius: 6px;
        }

        .project-link-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-subtle);
            padding: 10px 18px;
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
            width: fit-content;
        }

        .project-link-btn:hover {
            background: var(--accent-cyan);
            color: #090D16;
            border-color: var(--accent-cyan);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.4);
        }

        /* ==========================================================================
           EXPERIENCE TIMELINE
           ========================================================================== */
        .timeline-container {
            display: flex;
            flex-direction: column;
            gap: 28px;
            max-width: 860px;
            margin: 0 auto;
            position: relative;
            padding-left: 32px;
            border-left: 2px solid var(--border-subtle);
        }

        .timeline-block {
            position: relative;
        }

        .timeline-point {
            position: absolute;
            left: -40px;
            top: 24px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--accent-cyan);
            box-shadow: 0 0 12px var(--accent-cyan);
            border: 3px solid var(--bg-base);
        }

        .timeline-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 28px;
            transition: border-color 0.2s ease;
        }

        .timeline-card:hover {
            border-color: rgba(6, 182, 212, 0.35);
        }

        .timeline-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            padding-bottom: 14px;
        }

        .timeline-role-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-primary);
        }

        .timeline-org {
            font-size: 1rem;
            font-weight: 700;
            color: var(--accent-purple);
        }

        .timeline-time {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            background: rgba(255, 255, 255, 0.04);
            padding: 4px 12px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-subtle);
        }

        .timeline-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .timeline-bullets li {
            position: relative;
            padding-left: 20px;
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .timeline-bullets li::before {
            content: "▹";
            position: absolute;
            left: 0;
            color: var(--accent-cyan);
            font-size: 1rem;
        }

        /* ==========================================================================
           EDUCATION & CREDENTIALS
           ========================================================================== */
        .education-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .edu-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .edu-level {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--accent-cyan);
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .edu-degree {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .edu-school {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 16px;
            flex: 1;
        }

        .edu-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            padding-top: 12px;
        }

        .score-pill {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--accent-green);
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
        }

        /* ==========================================================================
           CONTACT & CONNECT
           ========================================================================== */
        .contact-box {
            background: linear-gradient(135deg, rgba(15, 20, 34, 0.9) 0%, rgba(20, 27, 45, 0.9) 100%);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: clamp(32px, 5vw, 60px);
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: var(--glow-cyan);
            position: relative;
        }

        .contact-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 900;
            letter-spacing: -0.02em;
            margin-bottom: 16px;
        }

        .contact-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 620px;
            margin: 0 auto 36px;
            line-height: 1.65;
        }

        /* Interactive Contact Form */
        .portfolio-contact-form {
            text-align: left;
            margin: 0 auto 36px;
            max-width: 740px;
            background: rgba(9, 13, 22, 0.65);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: clamp(20px, 4vw, 36px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--text-secondary);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: var(--font-mono);
        }

        .form-label .req {
            color: var(--accent-rose);
            margin-left: 2px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: #0D121F;
            border: 1.5px solid var(--border-subtle);
            border-radius: var(--radius-sm);
            padding: 12px 14px;
            color: var(--text-primary);
            font-family: var(--font-sans);
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.18);
            background: #101626;
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        .btn-submit-contact {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            background: linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-blue) 100%);
            color: #090D16;
            border: none;
            border-radius: var(--radius-sm);
            padding: 14px 24px;
            font-family: var(--font-sans);
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(6, 182, 212, 0.35);
            transition: all 0.2s ease;
        }

        .btn-submit-contact:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(6, 182, 212, 0.5);
            filter: brightness(1.08);
        }

        .btn-submit-contact:disabled {
            opacity: 0.65;
            cursor: not-allowed;
            transform: none !important;
        }

        .form-status-alert {
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-size: 0.92rem;
            line-height: 1.5;
            display: none;
        }

        .form-status-alert.success {
            display: block;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.4);
            color: #34D399;
        }

        .form-status-alert.error {
            display: block;
            background: rgba(244, 63, 94, 0.12);
            border: 1px solid rgba(244, 63, 94, 0.4);
            color: #FB7185;
        }

        @media (max-width: 650px) {
            .form-grid-2 {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        .contact-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-bottom: 36px;
            text-align: left;
        }

        .contact-method-item {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .method-info {
            overflow: hidden;
        }

        .method-type {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            font-family: var(--font-mono);
            display: block;
        }

        .method-val {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .btn-action-sm {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: var(--accent-cyan);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 0.78rem;
            font-weight: 700;
            font-family: var(--font-mono);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-action-sm:hover {
            background: var(--accent-cyan);
            color: #090D16;
            border-color: var(--accent-cyan);
        }

        .store-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-secondary);
            font-size: 0.88rem;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .store-back-link:hover {
            color: var(--accent-cyan);
        }

        /* ==========================================================================
           FOOTER
           ========================================================================== */
        .dev-footer {
            border-top: 1px solid var(--border-subtle);
            padding: 30px 0;
            background: #070A12;
            color: var(--text-muted);
            font-size: 0.86rem;
            text-align: center;
        }

        /* Responsive Breakpoints */
        @media (max-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .metrics-strip {
                grid-template-columns: repeat(2, 1fr);
            }
            .nav-links {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .hero-section {
                padding: 60px 0 50px;
            }
            .hero-title {
                font-size: 2.2rem;
            }
            .metrics-strip {
                grid-template-columns: 1fr 1fr;
            }
            .timeline-container {
                padding-left: 24px;
            }
            .timeline-point {
                left: -32px;
            }
        }
    </style>
</head>
<body>
    <!-- Ambient Lighting & Cyber Grid Background -->
    <div class="ambient-glow-mesh" aria-hidden="true">
        <div class="glow-circle-1"></div>
        <div class="glow-circle-2"></div>
        <div class="glow-circle-3"></div>
    </div>
    <div class="grid-pattern-overlay" aria-hidden="true"></div>

    <!-- Standalone Developer Navbar -->
    <header class="dev-navbar">
        <div class="container nav-inner">
            <a href="{{ route('portfolio') }}" class="nav-brand">
                <div class="brand-logo-badge">MM</div>
                <div class="brand-name">Maayank<span>.dev</span></div>
            </a>

            <ul class="nav-links">
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#experience" class="nav-link">Experience</a></li>
                <li><a href="#education" class="nav-link">Education</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>

            <div class="nav-cta-group">
                <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-nav-secondary" title="GitHub">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    <span>GitHub</span>
                </a>
                <a href="#contact" class="btn-nav-primary">
                    <span>Get in Touch ✦</span>
                </a>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="about">
            <div class="container">
                <div class="hero-grid">
                    <div>
                        <div class="status-badge">
                            <span class="status-pulse"></span>
                            <span>FULL STACK SOFTWARE ENGINEER • FOUNDER @ TABSTICK</span>
                            <span class="location-chip" style="margin-left: 8px; opacity: 0.85;">📍 DELHI NCR, INDIA</span>
                        </div>

                        <h1 class="hero-title">
                            Hi, I'm <span class="gradient-text-cyan">Maayank Malhotra</span>.<br>
                            Distributed Systems &amp; Web Architect.
                        </h1>

                        <p class="hero-subtitle">
                            Full Stack Software Engineer with <strong>4+ years of experience</strong> architecting scalable backend microservices (Node.js, Express, PHP, Laravel), responsive frontends (React.js, Redux, TypeScript), and cloud pipelines on AWS (EC2, S3, Docker). Proven track record scaling APIs to <strong>1.5M+ monthly transactions</strong>, optimizing system performance by 20%, and mentoring engineering teams. Founder of <strong>Tabstick</strong>.
                        </p>

                        <!-- Key Performance Metrics -->
                        <div class="metrics-strip">
                            <div class="metric-item">
                                <span class="metric-value">4+</span>
                                <span class="metric-title">Years Full-Stack Experience</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-value">1.5M+</span>
                                <span class="metric-title">Monthly Transactions Handled</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-value">1M+</span>
                                <span class="metric-title">API Calls / Month</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-value">20%</span>
                                <span class="metric-title">Latency Reduction</span>
                            </div>
                        </div>

                        <div class="hero-actions">
                            <a href="#skills" class="btn-hero-primary">
                                <span>⚡ Explore Skills</span>
                            </a>
                            <a href="#projects" class="btn-hero-outline">
                                <span>🚀 View Projects (7)</span>
                            </a>
                            <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="btn-hero-outline">
                                <span>LinkedIn ↗</span>
                            </a>
                        </div>
                    </div>

                    <!-- Interactive Code Terminal -->
                    <div>
                        <div class="terminal-window">
                            <div class="terminal-header">
                                <div class="terminal-dots">
                                    <div class="terminal-dot dot-red"></div>
                                    <div class="terminal-dot dot-yellow"></div>
                                    <div class="terminal-dot dot-green"></div>
                                </div>
                                <div class="terminal-title">maayank.config.ts</div>
                            </div>
                            <div class="terminal-body">
<pre><code><span class="code-comment">// Production-Ready Full Stack Engineer</span>
<span class="code-keyword">export const</span> <span class="code-var">engineer</span> = {
  <span class="code-property">name</span>: <span class="code-string">"Maayank Malhotra"</span>,
  <span class="code-property">role</span>: <span class="code-string">"Full Stack Software Engineer"</span>,
  <span class="code-property">experienceYears</span>: <span class="code-number">4</span>,
  <span class="code-property">stats</span>: {
    <span class="code-property">monthlyTransactions</span>: <span class="code-string">"1,500,000+"</span>,
    <span class="code-property">monthlyApiCalls</span>: <span class="code-string">"1,000,000+"</span>,
    <span class="code-property">performanceGain</span>: <span class="code-string">"20% optimization"</span>,
    <span class="code-property">enterpriseReleases</span>: <span class="code-number">5</span>
  },
  <span class="code-property">coreLanguages</span>: [<span class="code-string">"TypeScript"</span>, <span class="code-string">"JavaScript"</span>, <span class="code-string">"PHP"</span>],
  <span class="code-property">backend</span>: [<span class="code-string">"Node.js"</span>, <span class="code-string">"Express.js"</span>, <span class="code-string">"Laravel"</span>, <span class="code-string">"GraphQL"</span>],
  <span class="code-property">frontend</span>: [<span class="code-string">"React.js"</span>, <span class="code-string">"Redux"</span>, <span class="code-string">"Tailwind CSS"</span>],
  <span class="code-property">cloudDevOps</span>: [<span class="code-string">"AWS EC2"</span>, <span class="code-string">"AWS S3"</span>, <span class="code-string">"Docker"</span>, <span class="code-string">"CI/CD"</span>],
  <span class="code-property">realTime</span>: [<span class="code-string">"WebRTC"</span>, <span class="code-string">"Socket.io"</span>, <span class="code-string">"Pusher"</span>],
  <span class="code-property">founder</span>: <span class="code-string">"Tabstick (tabstick.in)"</span>
};</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Technical Skills -->
        <section class="section-wrap" id="skills">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">✦ TECHNICAL COMPETENCIES</span>
                    <h2 class="section-heading">Core Engineering Skills</h2>
                    <p class="section-lead">
                        High-throughput backend architectures, responsive frontend frameworks, real-time media channels, and cloud infrastructure tested under production load.
                    </p>
                </div>

                <!-- Interactive Skill Filters -->
                <div class="skills-filter-nav">
                    <button type="button" class="skill-filter-btn active" data-filter="all">⚡ All Skills</button>
                    <button type="button" class="skill-filter-btn" data-filter="backend">🛠️ Backend &amp; Architecture</button>
                    <button type="button" class="skill-filter-btn" data-filter="frontend">🎨 Frontend &amp; UI</button>
                    <button type="button" class="skill-filter-btn" data-filter="cloud">☁️ Cloud, DevOps &amp; DB</button>
                    <button type="button" class="skill-filter-btn" data-filter="realtime">📡 Real-Time &amp; Media</button>
                    <button type="button" class="skill-filter-btn" data-filter="leadership">👥 Leadership &amp; Delivery</button>
                </div>

                <!-- Skills Grid -->
                <div class="skills-grid">
                    <!-- 1. Node.js & Express.js -->
                    <div class="skill-card" data-category="backend">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🟢</div>
                                <div>
                                    <div class="skill-title">Node.js &amp; Express.js</div>
                                    <div class="skill-category">Microservices Architecture</div>
                                </div>
                            </div>
                            <span class="skill-pct">95%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 95%;"></div>
                        </div>
                        <p class="skill-info">
                            Architected asynchronous event-driven backend services, custom middleware pipelines, and scalable APIs serving 1M+ monthly API calls with high availability.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">Event Loop</span>
                            <span class="chip">Async I/O</span>
                            <span class="chip">Express</span>
                            <span class="chip">Clustering</span>
                        </div>
                    </div>

                    <!-- 2. PHP & Laravel -->
                    <div class="skill-card" data-category="backend">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🐘</div>
                                <div>
                                    <div class="skill-title">PHP &amp; Laravel</div>
                                    <div class="skill-category">Enterprise Framework</div>
                                </div>
                            </div>
                            <span class="skill-pct">92%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 92%;"></div>
                        </div>
                        <p class="skill-info">
                            Deployed and scaled enterprise applications handling 1.5M+ monthly transactions. Eloquent query tuning, queue workers, and custom service providers.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">Laravel 11</span>
                            <span class="chip">Eloquent ORM</span>
                            <span class="chip">Queues</span>
                            <span class="chip">Security</span>
                        </div>
                    </div>

                    <!-- 3. React.js & Redux -->
                    <div class="skill-card" data-category="frontend">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">⚛️</div>
                                <div>
                                    <div class="skill-title">React.js &amp; Redux</div>
                                    <div class="skill-category">Frontend Ecosystem</div>
                                </div>
                            </div>
                            <span class="skill-pct">94%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 94%;"></div>
                        </div>
                        <p class="skill-info">
                            Built modular SPAs with Redux state management, custom React hooks, reusable UI component libraries, and optimized virtual DOM rendering cycles.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">React Hooks</span>
                            <span class="chip">Redux Toolkit</span>
                            <span class="chip">Component Design</span>
                            <span class="chip">Context API</span>
                        </div>
                    </div>

                    <!-- 4. TypeScript & JavaScript -->
                    <div class="skill-card" data-category="frontend">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">📜</div>
                                <div>
                                    <div class="skill-title">TypeScript &amp; ESNext</div>
                                    <div class="skill-category">Core Languages</div>
                                </div>
                            </div>
                            <span class="skill-pct">90%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 90%;"></div>
                        </div>
                        <p class="skill-info">
                            Strict type contracts, generics, interfaces, and modern ES6+ functional programming reducing runtime bugs in enterprise codebases.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">TypeScript</span>
                            <span class="chip">Generics</span>
                            <span class="chip">ES6+</span>
                            <span class="chip">Strict Typing</span>
                        </div>
                    </div>

                    <!-- 5. AWS Cloud (EC2, S3) & Docker -->
                    <div class="skill-card" data-category="cloud">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">☁️</div>
                                <div>
                                    <div class="skill-title">AWS Cloud &amp; Docker</div>
                                    <div class="skill-category">DevOps &amp; Infrastructure</div>
                                </div>
                            </div>
                            <span class="skill-pct">88%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 88%;"></div>
                        </div>
                        <p class="skill-info">
                            Production deployments on AWS EC2, S3 asset buckets, containerized Docker microservices, and automated zero-downtime CI/CD deployment pipelines.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">AWS EC2</span>
                            <span class="chip">AWS S3</span>
                            <span class="chip">Docker</span>
                            <span class="chip">CI/CD</span>
                        </div>
                    </div>

                    <!-- 6. WebRTC & Socket.io -->
                    <div class="skill-card" data-category="realtime">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">📡</div>
                                <div>
                                    <div class="skill-title">WebRTC &amp; Socket.io</div>
                                    <div class="skill-category">Real-Time Data &amp; Media</div>
                                </div>
                            </div>
                            <span class="skill-pct">90%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 90%;"></div>
                        </div>
                        <p class="skill-info">
                            Engineered device-to-device audio/video calling, call recording, low-latency data streams, and WebSockets broadcasting comparable to IoT telemetry.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">WebRTC P2P</span>
                            <span class="chip">Socket.io</span>
                            <span class="chip">Pusher</span>
                            <span class="chip">WebSockets</span>
                        </div>
                    </div>

                    <!-- 7. MySQL & MongoDB -->
                    <div class="skill-card" data-category="cloud">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🗄️</div>
                                <div>
                                    <div class="skill-title">MySQL &amp; MongoDB</div>
                                    <div class="skill-category">Database Engineering</div>
                                </div>
                            </div>
                            <span class="skill-pct">92%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 92%;"></div>
                        </div>
                        <p class="skill-info">
                            Query indexing, ACID transaction management, MongoDB aggregation pipelines, and database tuning that delivered 20% platform performance gains.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">MySQL Indexing</span>
                            <span class="chip">MongoDB</span>
                            <span class="chip">ACID</span>
                            <span class="chip">Query Tuning</span>
                        </div>
                    </div>

                    <!-- 8. Nginx, CI/CD & Linux -->
                    <div class="skill-card" data-category="cloud">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🐧</div>
                                <div>
                                    <div class="skill-title">Nginx &amp; Linux Administration</div>
                                    <div class="skill-category">Server Architecture</div>
                                </div>
                            </div>
                            <span class="skill-pct">89%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 89%;"></div>
                        </div>
                        <p class="skill-info">
                            Nginx reverse proxy configuration, HTTP/2 performance, SSL/TLS automation, Ubuntu server hardening, GitHub Actions, and production troubleshooting.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">Nginx</span>
                            <span class="chip">Ubuntu</span>
                            <span class="chip">HTTP/2</span>
                            <span class="chip">GitHub Actions</span>
                        </div>
                    </div>

                    <!-- 9. REST APIs & Apollo GraphQL -->
                    <div class="skill-card" data-category="backend">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🔌</div>
                                <div>
                                    <div class="skill-title">REST APIs &amp; GraphQL</div>
                                    <div class="skill-category">API Engineering</div>
                                </div>
                            </div>
                            <span class="skill-pct">94%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 94%;"></div>
                        </div>
                        <p class="skill-info">
                            Clean API design with Swagger / Postman documentation, rate limiting, JWT &amp; OAuth2 authentication, webhook lifecycle management.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">REST Standards</span>
                            <span class="chip">GraphQL</span>
                            <span class="chip">JWT/OAuth2</span>
                            <span class="chip">Webhooks</span>
                        </div>
                    </div>

                    <!-- 10. Engineering Leadership -->
                    <div class="skill-card" data-category="leadership">
                        <div class="skill-header">
                            <div class="skill-badge-group">
                                <div class="skill-avatar">🤝</div>
                                <div>
                                    <div class="skill-title">Mentoring &amp; Leadership</div>
                                    <div class="skill-category">Team Engineering</div>
                                </div>
                            </div>
                            <span class="skill-pct">92%</span>
                        </div>
                        <div class="meter-track">
                            <div class="meter-fill" style="--progress: 92%;"></div>
                        </div>
                        <p class="skill-info">
                            Mentoring junior developers through structured code reviews and pair programming sessions, sprint planning, and cross-functional coordination.
                        </p>
                        <div class="skill-chips">
                            <span class="chip">Code Reviews</span>
                            <span class="chip">Mentoring</span>
                            <span class="chip">Agile/Scrum</span>
                            <span class="chip">Cross-Functional</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Key Projects Showcase -->
        <section class="section-wrap" id="projects">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">✦ SHIPPED IN PRODUCTION</span>
                    <h2 class="section-heading">Featured Engineering Projects</h2>
                    <p class="section-lead">
                        Distributed platforms, real-time media communication engines, enterprise CRMs, and SaaS tools built and maintained in live environments.
                    </p>
                </div>

                <div class="projects-grid">
                    <!-- Project 1: Tabstick -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE E-COMMERCE</span>
                            <span class="role-tag">Founder &amp; Architect</span>
                        </div>
                        <h3 class="project-name">Tabstick – Creative Sticker E-Commerce Platform</h3>
                        <p class="project-detail">
                            Engineered an e-commerce platform cataloging 4,450+ die-cut vinyl stickers. Features real-time Razorpay checkout, Web Audio API sound synthesis, multi-resolution image processing, automated Google Shopping XML feeds, and SEO collection hubs.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">Laravel 11</span>
                            <span class="stack-pill">PHP 8.3</span>
                            <span class="stack-pill">MySQL</span>
                            <span class="stack-pill">Razorpay</span>
                            <span class="stack-pill">Caddy HTTP/2</span>
                        </div>
                        <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Open tabstick.in ↗</span>
                        </a>
                    </article>

                    <!-- Project 2: Audio/Video Platform -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE PLATFORM</span>
                            <span class="role-tag">Real-Time Streaming</span>
                        </div>
                        <h3 class="project-name">Real-Time Audio/Video Communication System</h3>
                        <p class="project-detail">
                            Built a real-time, device-to-device communication system utilizing WebRTC and Socket.io. Features call recording, live chat, and multi-browser support — delivering low-latency media streams comparable to hardware sensor telemetry.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">PHP</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">WebRTC</span>
                            <span class="stack-pill">Socket.io</span>
                            <span class="stack-pill">Media Streams</span>
                        </div>
                        <a href="https://snoutiq.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: snoutiq.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 3: Enterprise CRM -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE ENTERPRISE</span>
                            <span class="role-tag">Full Stack Lead</span>
                        </div>
                        <h3 class="project-name">Enterprise CRM &amp; Workflow Automation Engine</h3>
                        <p class="project-detail">
                            Developed an enterprise-grade CRM with automated lead tracking, sales pipeline management, task automation, and real-time analytical dashboards with automated email triggers and webhook notification pipelines.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">MERN Stack</span>
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">MongoDB</span>
                            <span class="stack-pill">Webhooks</span>
                        </div>
                        <a href="https://crm.henryharvin.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: crm.henryharvin.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 4: Jobrito Job Portal -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE AWS DEPLOYMENT</span>
                            <span class="role-tag">Full Stack &amp; Cloud</span>
                        </div>
                        <h3 class="project-name">Jobrito – Scalable Job Search &amp; Hiring Platform</h3>
                        <p class="project-detail">
                            Built and deployed a full-featured job listing platform on AWS with Nginx and CI/CD automation. Features multi-faceted search filters, resume upload parsers, applicant management, and an administrative control panel.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">AWS EC2</span>
                            <span class="stack-pill">Nginx</span>
                            <span class="stack-pill">CI/CD</span>
                        </div>
                        <a href="https://jobrito.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: jobrito.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 5: RadiusLift SaaS -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE SAAS</span>
                            <span class="role-tag">SaaS Core Module Dev</span>
                        </div>
                        <h3 class="project-name">RadiusLift – SaaS Workflow Automation Platform</h3>
                        <p class="project-detail">
                            Built core modules for a SaaS platform supporting business workflow automation and subscription-based service delivery, including third-party API integrations and admin management tooling.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">SaaS Billing</span>
                            <span class="stack-pill">REST APIs</span>
                        </div>
                        <a href="https://radiuslift.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: radiuslift.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 6: Think Champ -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE WEB APP</span>
                            <span class="role-tag">Frontend &amp; Integration</span>
                        </div>
                        <h3 class="project-name">Think Champ – Custom Enterprise Web App</h3>
                        <p class="project-detail">
                            Delivered a custom web application handling responsive UI development, backend API integration, and feature enhancements tailored to strict client specifications.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">UI Library</span>
                            <span class="stack-pill">REST APIs</span>
                        </div>
                        <a href="https://think-champ.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: think-champ.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 7: Henry Harvin Platform -->
                    <article class="project-card">
                        <div class="project-meta-row">
                            <span class="live-tag">● LIVE ED-TECH</span>
                            <span class="role-tag">Platform Engineer</span>
                        </div>
                        <h3 class="project-name">Henry Harvin – High-Traffic E-Learning Platform</h3>
                        <p class="project-detail">
                            Contributed to high-traffic e-learning platform supporting course delivery, user management, and platform-wide feature updates with optimized query caches and microservice CI/CD pipelines.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">Laravel</span>
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">MySQL</span>
                            <span class="stack-pill">Redis</span>
                        </div>
                        <a href="https://henryharvin.com" target="_blank" rel="noopener noreferrer" class="project-link-btn">
                            <span>Live: henryharvin.com ↗</span>
                        </a>
                    </article>
                </div>
            </div>
        </section>

        <!-- Professional Experience Timeline -->
        <section class="section-wrap" id="experience">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">✦ CAREER TIMELINE</span>
                    <h2 class="section-heading">Professional Work Experience</h2>
                    <p class="section-lead">
                        4+ years building, scaling, and maintaining mission-critical applications across high-growth product engineering teams.
                    </p>
                </div>

                <div class="timeline-container">
                    <!-- Thinktail Global -->
                    <div class="timeline-block">
                        <div class="timeline-point"></div>
                        <div class="timeline-card">
                            <div class="timeline-top">
                                <div>
                                    <h3 class="timeline-role-title">Software Engineer</h3>
                                    <div class="timeline-org">Thinktail Global Pvt. Ltd.</div>
                                </div>
                                <span class="timeline-time">Aug 2025 – Present</span>
                            </div>
                            <ul class="timeline-bullets">
                                <li>Lead end-to-end full-stack development of scalable web applications using <strong>React.js and Node.js</strong>, architecting reusable, maintainable modules that support long-term product growth and reduce technical debt.</li>
                                <li>Design and deliver advanced analytics and automation features that streamline client operations, reduce manual workload, and improve reporting accuracy.</li>
                                <li>Mentor junior developers through structured code reviews and pair programming sessions, raising overall code quality, consistency, and team output.</li>
                                <li>Coordinate closely with design, QA, and backend teams throughout the development lifecycle to ensure on-time, high-quality releases.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cracode Consulting -->
                    <div class="timeline-block">
                        <div class="timeline-point"></div>
                        <div class="timeline-card">
                            <div class="timeline-top">
                                <div>
                                    <h3 class="timeline-role-title">Software Engineer</h3>
                                    <div class="timeline-org">Cracode Consulting Pvt. Ltd.</div>
                                </div>
                                <span class="timeline-time">Aug 2024 – Aug 2025</span>
                            </div>
                            <ul class="timeline-bullets">
                                <li>Built and maintained <strong>Laravel + React.js</strong> applications for enterprise clients, designing secure REST APIs used across multiple internal and client-facing services.</li>
                                <li>Deployed and scaled APIs handling <strong>1.5M+ transactions per month</strong>, focusing on performance, reliability, and fault tolerance under production load.</li>
                                <li>Developed reusable UI component libraries that accelerated delivery velocity across multi-tenant projects.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Henry Harvin -->
                    <div class="timeline-block">
                        <div class="timeline-point"></div>
                        <div class="timeline-card">
                            <div class="timeline-top">
                                <div>
                                    <h3 class="timeline-role-title">Software Engineer</h3>
                                    <div class="timeline-org">Henry Harvin</div>
                                </div>
                                <span class="timeline-time">Jan 2023 – Aug 2024</span>
                            </div>
                            <ul class="timeline-bullets">
                                <li>Improved platform performance by <strong>20% through backend optimization</strong>, database query tuning, and caching strategies.</li>
                                <li>Delivered 5 product releases end-to-end, from technical planning through implementation, testing, and production deployment.</li>
                                <li>Enhanced CI/CD pipelines for a microservices architecture supporting <strong>1M+ API calls monthly</strong>, improving deployment frequency and reducing rollback incidents.</li>
                                <li>Developed REST APIs and backend systems for <strong>ICICI Lombard</strong> and <strong>Ninja CRM</strong>, improving data reliability, system uptime, and user engagement.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education & Credentials -->
        <section class="section-wrap" id="education">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">✦ ACADEMIC BACKGROUND</span>
                    <h2 class="section-heading">Education &amp; Qualifications</h2>
                </div>

                <div class="education-row">
                    <div class="edu-card">
                        <span class="edu-level">🎓 Bachelor of Technology</span>
                        <h3 class="edu-degree">B.Tech, Electronics</h3>
                        <div class="edu-school">YMCA University</div>
                        <div class="edu-footer">
                            <span>2018 – 2022</span>
                            <span class="score-pill">CGPA: 7.606</span>
                        </div>
                    </div>

                    <div class="edu-card">
                        <span class="edu-level">🏫 Senior Secondary (XII)</span>
                        <h3 class="edu-degree">Science &amp; Mathematics</h3>
                        <div class="edu-school">D.A.V. Public School</div>
                        <div class="edu-footer">
                            <span>2017 – 2018</span>
                            <span class="score-pill">74%</span>
                        </div>
                    </div>

                    <div class="edu-card">
                        <span class="edu-level">🏫 Secondary (X)</span>
                        <h3 class="edu-degree">All General Subjects</h3>
                        <div class="edu-school">D.A.V. Public School</div>
                        <div class="edu-footer">
                            <span>2015 – 2016</span>
                            <span class="score-pill">CGPA: 8.6</span>
                        </div>
                    </div>

                    <div class="edu-card">
                        <span class="edu-level">🌐 Language Credential</span>
                        <h3 class="edu-degree">IELTS (Academic)</h3>
                        <div class="edu-school">International English Language Testing</div>
                        <div class="edu-footer">
                            <span>Certified</span>
                            <span class="score-pill">Band Score: 7.0</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact & Connect -->
        <section class="section-wrap" id="contact">
            <div class="container">
                <div class="contact-box">
                    <h2 class="contact-title">Let's Build Something High-Impact.</h2>
                    <p class="contact-subtitle">
                        Looking for a senior full-stack engineer, a microservices backend lead, or want to collaborate on innovative web products? Drop a message below — an automated receipt copy will be sent to your email via SMTP.
                    </p>

                    <!-- Interactive Contact Form -->
                    <form id="portfolio-contact-form" class="portfolio-contact-form" action="{{ route('portfolio.contact') }}" method="POST">
                        @csrf
                        <div id="form-alert" class="form-status-alert"></div>

                        @if(session('contact_success'))
                        <div class="form-status-alert success" style="display:block;">
                            {{ session('contact_success') }}
                        </div>
                        @endif

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="contact-name" class="form-label">Your Name <span class="req">*</span></label>
                                <input type="text" id="contact-name" name="name" class="form-input" placeholder="e.g. Alex Johnson" required maxlength="100">
                            </div>

                            <div class="form-group">
                                <label for="contact-email" class="form-label">Your Email <span class="req">*</span></label>
                                <input type="email" id="contact-email" name="email" class="form-input" placeholder="alex@company.com" required maxlength="150">
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="contact-phone" class="form-label">Phone / WhatsApp <small style="color:var(--text-muted);">(Optional)</small></label>
                                <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="+91 98765 43210" maxlength="30">
                            </div>

                            <div class="form-group">
                                <label for="contact-subject" class="form-label">Inquiry Topic</label>
                                <select id="contact-subject" name="subject" class="form-select">
                                    <option value="Senior Full-Stack / Backend Engineering Role">💼 Full-Stack / Backend Engineering Role</option>
                                    <option value="Freelance / SaaS Architecture Consulting">🛠️ SaaS Architecture / Consulting</option>
                                    <option value="WebRTC & Real-Time Media Collaboration">📡 WebRTC &amp; Real-Time Systems</option>
                                    <option value="General Engineering Chat">💬 General Tech Chat / Connect</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-message" class="form-label">Project Details / Message <span class="req">*</span></label>
                            <textarea id="contact-message" name="message" class="form-textarea" placeholder="Tell me about your tech stack, requirements, timeline, or engineering role..." required minlength="5" maxlength="3000"></textarea>
                        </div>

                        <button type="submit" id="btn-submit-contact" class="btn-submit-contact">
                            <span>⚡ Send Direct Message &amp; Trigger Confirmation Email</span>
                        </button>
                        <p style="margin: 12px 0 0; font-size: 0.78rem; color: var(--text-muted); text-align: center; font-family: var(--font-mono);">
                            🔒 Direct SMTP delivery • An automated receipt copy will be sent to your email
                        </p>
                    </form>

                    <div class="contact-methods">
                        <div class="contact-method-item">
                            <div class="method-info">
                                <span class="method-type">Direct Email</span>
                                <span class="method-val">maayankmalhotra095@gmail.com</span>
                            </div>
                            <button type="button" class="btn-action-sm" onclick="copyEmail(this)">
                                <span>Copy</span>
                            </button>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-info">
                                <span class="method-type">Phone / WhatsApp</span>
                                <span class="method-val">+91 8799730966</span>
                            </div>
                            <a href="tel:+918799730966" class="btn-action-sm">
                                <span>Call</span>
                            </a>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-info">
                                <span class="method-type">LinkedIn</span>
                                <span class="method-val">in/maayank-malhotra-a59a55186</span>
                            </div>
                            <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="btn-action-sm">
                                <span>Connect ↗</span>
                            </a>
                        </div>

                        <div class="contact-method-item">
                            <div class="method-info">
                                <span class="method-type">GitHub Profile</span>
                                <span class="method-val">github.com/MaayankMalhotra</span>
                            </div>
                            <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-action-sm">
                                <span>Follow ↗</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('home') }}" class="store-back-link">
                            <span>← Visit Tabstick Sticker Store</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="dev-footer">
        <div class="container">
            <p>© {{ date('Y') }} Maayank Malhotra. Crafted with clean code &amp; scalable engineering. All rights reserved.</p>
        </div>
    </footer>

    <!-- JSON-LD Person Structured Data for SEO Knowledge Graph -->
    @php
    $personSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => 'Maayank Malhotra',
        'alternateName' => 'Mayank Malhotra',
        'givenName' => 'Maayank',
        'familyName' => 'Malhotra',
        'jobTitle' => 'Full Stack Software Engineer',
        'description' => 'Full Stack Software Engineer with 4+ years of experience architecting scalable Node.js, Express, React, Laravel, and AWS cloud applications. Founder of Tabstick.',
        'url' => 'https://tabstick.in/maayank',
        'email' => 'maayankmalhotra095@gmail.com',
        'telephone' => '+918799730966',
        'founder' => [
            '@type' => 'Organization',
            'name' => 'Tabstick',
            'url' => 'https://tabstick.in',
        ],
        'worksFor' => [
            '@type' => 'Organization',
            'name' => 'Thinktail Global Pvt. Ltd.',
        ],
        'alumniOf' => [
            '@type' => 'CollegeOrUniversity',
            'name' => 'YMCA University',
        ],
        'knowsAbout' => [
            'Full Stack Web Development',
            'Node.js',
            'Express.js',
            'PHP',
            'Laravel',
            'React.js',
            'Redux',
            'TypeScript',
            'AWS EC2',
            'AWS S3',
            'Docker',
            'WebRTC',
            'Socket.io',
            'MySQL',
            'MongoDB',
            'REST APIs',
            'GraphQL',
            'CI/CD Pipelines',
        ],
        'sameAs' => [
            'https://www.linkedin.com/in/maayank-malhotra-a59a55186/',
            'https://github.com/MaayankMalhotra',
        ],
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($personSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Client Scripts for Interactive Filtering and Copy -->
    <script>
        // Skills Interactive Filtering
        document.querySelectorAll('.skill-filter-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.skill-filter-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const filter = button.getAttribute('data-filter');
                document.querySelectorAll('.skill-card').forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Copy Email Helper
        function copyEmail(btn) {
            navigator.clipboard.writeText('maayankmalhotra095@gmail.com').then(() => {
                const prev = btn.innerHTML;
                btn.innerHTML = '<span>✓ Copied!</span>';
                btn.style.background = '#10B981';
                btn.style.color = '#090D16';
                btn.style.borderColor = '#10B981';
                setTimeout(() => {
                    btn.innerHTML = prev;
                    btn.style.background = '';
                    btn.style.color = '';
                    btn.style.borderColor = '';
                }, 2000);
            });
        }

        // Contact Form AJAX Submission
        const contactForm = document.getElementById('portfolio-contact-form');
        const formAlert = document.getElementById('form-alert');
        const submitBtn = document.getElementById('btn-submit-contact');

        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                formAlert.style.display = 'none';
                formAlert.className = 'form-status-alert';
                formAlert.innerHTML = '';

                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>⏳ Shooting email via SMTP...</span>';

                const formData = new FormData(contactForm);

                try {
                    const res = await fetch(contactForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {
                        formAlert.className = 'form-status-alert success';
                        formAlert.innerHTML = `<strong>🎉 Message Sent!</strong> ${data.message}`;
                        formAlert.style.display = 'block';
                        contactForm.reset();
                    } else {
                        const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('<br>') : 'Something went wrong. Please check your inputs or email me directly.');
                        formAlert.className = 'form-status-alert error';
                        formAlert.innerHTML = `<strong>⚠️ Submission Failed:</strong> ${errorMsg}`;
                        formAlert.style.display = 'block';
                    }
                } catch (err) {
                    formAlert.className = 'form-status-alert error';
                    formAlert.innerHTML = '<strong>⚠️ Network or Server Error.</strong> Please try again or email directly at <a href="mailto:maayankmalhotra095@gmail.com" style="color:#FFF;text-decoration:underline;">maayankmalhotra095@gmail.com</a>.';
                    formAlert.style.display = 'block';
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        }
    </script>
</body>
</html>
