<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer &amp; Founder</title>
    <meta name="description" content="Official portfolio and engineering resume of Maayank Malhotra (also spelled Mayank Malhotra), Full Stack Software Engineer &amp; Founder of Tabstick. 4+ years scaling Node.js, Express, React, Laravel, and AWS cloud applications.">
    <meta name="keywords" content="Maayank Malhotra, Mayank Malhotra, Maayank Malhotra Tabstick, Mayank Malhotra Software Engineer, Mayank Malhotra Developer, Full Stack Engineer Delhi NCR, Node.js React Laravel AWS Architect">
    <meta name="author" content="Maayank Malhotra">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://tabstick.in/maayank">

    <!-- Open Graph / Facebook / LinkedIn Cards -->
    <meta property="og:site_name" content="Tabstick">
    <meta property="og:type" content="profile">
    <meta property="og:title" content="Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer &amp; Founder">
    <meta property="og:description" content="Official portfolio and resume of Maayank Malhotra, Full Stack Engineer and Founder of Tabstick. 4+ years scaling APIs, Node.js, Laravel, React, and AWS cloud systems.">
    <meta property="og:url" content="https://tabstick.in/maayank">
    <meta property="og:image" content="{{ asset('favicon-512x512.png') }}">
    <meta property="profile:first_name" content="Maayank">
    <meta property="profile:last_name" content="Malhotra">
    <meta property="profile:username" content="MaayankMalhotra">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer &amp; Founder">
    <meta name="twitter:description" content="Official portfolio of Maayank Malhotra, Founder @ Tabstick &amp; Full Stack Engineer with 4+ years experience in distributed systems.">
    <meta name="twitter:image" content="{{ asset('favicon-512x512.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Modern Obsidian Glassmorphism Architecture Stylesheet -->
    <style>
        :root {
            --bg-base: #06080F;
            --bg-surface: #0B101E;
            --bg-surface-elevated: #11182A;
            --bg-card: rgba(17, 24, 42, 0.75);
            --bg-card-hover: rgba(26, 36, 62, 0.9);
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-highlight: rgba(56, 189, 248, 0.35);
            --border-focus: #38BDF8;
            --text-primary: #F8FAFC;
            --text-secondary: #94A3B8;
            --text-muted: #64748B;
            --accent-cyan: #38BDF8;
            --accent-blue: #6366F1;
            --accent-purple: #A855F7;
            --accent-green: #10B981;
            --accent-amber: #F59E0B;
            --accent-rose: #F43F5E;
            --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
            --radius-xs: 6px;
            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-full: 9999px;
            --glow-cyan: 0 0 30px rgba(56, 189, 248, 0.25);
            --glow-purple: 0 0 35px rgba(168, 85, 247, 0.25);
            --glow-green: 0 0 25px rgba(16, 185, 129, 0.25);
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
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-primary);
            line-height: 1.65;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        /* Ambient Animated Mesh & Glow Lights */
        .ambient-glow-mesh {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .glow-circle-1 {
            position: absolute;
            top: -12%;
            right: -8%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.16) 0%, rgba(6, 8, 15, 0) 70%);
            border-radius: 50%;
            filter: blur(80px);
            animation: floatGlow 18s ease-in-out infinite alternate;
        }

        .glow-circle-2 {
            position: absolute;
            top: 35%;
            left: -12%;
            width: 750px;
            height: 750px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.14) 0%, rgba(6, 8, 15, 0) 70%);
            border-radius: 50%;
            filter: blur(90px);
            animation: floatGlow 22s ease-in-out infinite alternate-reverse;
        }

        .glow-circle-3 {
            position: absolute;
            bottom: 5%;
            right: 10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.12) 0%, rgba(6, 8, 15, 0) 70%);
            border-radius: 50%;
            filter: blur(85px);
            animation: floatGlow 20s ease-in-out infinite alternate;
        }

        @keyframes floatGlow {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -20px) scale(1.08); }
            100% { transform: translate(-20px, 30px) scale(0.95); }
        }

        /* Subtle Technical Grid Overlay */
        .grid-pattern-overlay {
            position: fixed;
            inset: 0;
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0),
                linear-gradient(to right, rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
            background-size: 32px 32px, 64px 64px, 64px 64px;
            pointer-events: none;
            z-index: 0;
            opacity: 0.85;
        }

        .container {
            width: 100%;
            max-width: 1220px;
            margin: 0 auto;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        /* ==========================================================================
           TOP NAVIGATION BAR (FLOATING GLASS DOCK)
           ========================================================================== */
        .dev-navbar {
            position: sticky;
            top: 14px;
            z-index: 100;
            margin: 0 auto;
            max-width: 1180px;
            padding: 0 16px;
        }

        .nav-dock {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 18px;
            background: rgba(11, 16, 30, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-full);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .nav-dock:hover {
            border-color: rgba(56, 189, 248, 0.3);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6), 0 0 25px rgba(56, 189, 248, 0.15);
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
            background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-mono);
            font-weight: 800;
            font-size: 0.95rem;
            color: #06080F;
            box-shadow: 0 0 16px rgba(56, 189, 248, 0.4);
            transition: transform 0.25s ease;
        }

        .nav-brand:hover .brand-logo-badge {
            transform: rotate(-6deg) scale(1.05);
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.05rem;
            letter-spacing: -0.02em;
        }

        .brand-name span {
            color: var(--accent-cyan);
            font-family: var(--font-mono);
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
            background: rgba(255, 255, 255, 0.03);
            padding: 4px 6px;
            border-radius: var(--radius-full);
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.86rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .nav-link:hover {
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.08);
        }

        .nav-cta-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-nav-resume {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(56, 189, 248, 0.1);
            color: var(--accent-cyan);
            border: 1px solid rgba(56, 189, 248, 0.35);
            padding: 7px 15px;
            border-radius: var(--radius-full);
            font-size: 0.84rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-nav-resume:hover {
            background: rgba(56, 189, 248, 0.2);
            border-color: var(--accent-cyan);
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: var(--glow-cyan);
        }

        .btn-nav-secondary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-secondary);
            font-size: 0.84rem;
            font-weight: 600;
            padding: 7px 13px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-subtle);
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.2s ease;
        }

        .btn-nav-secondary:hover {
            color: var(--text-primary);
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.08);
        }

        .btn-nav-primary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #06080F;
            font-size: 0.86rem;
            font-weight: 800;
            padding: 8px 18px;
            border-radius: var(--radius-full);
            box-shadow: 0 4px 18px rgba(56, 189, 248, 0.35);
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
        }

        .btn-nav-primary:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 6px 24px rgba(56, 189, 248, 0.55);
            filter: brightness(1.08);
        }

        /* ==========================================================================
           HERO SECTION WITH CODE TERMINAL
           ========================================================================== */
        .hero-section {
            padding: 75px 0 80px;
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
            gap: 10px;
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.25);
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: 0.78rem;
            font-weight: 700;
            font-family: var(--font-mono);
            color: var(--accent-green);
            letter-spacing: 0.04em;
            margin-bottom: 24px;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.12);
        }

        .status-pulse {
            position: relative;
            width: 8px;
            height: 8px;
            background: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-green);
        }

        .status-pulse::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: var(--accent-green);
            opacity: 0.6;
            animation: pulseRing 1.8s infinite cubic-bezier(0, 0, 0.2, 1);
        }

        @keyframes pulseRing {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(2.6); opacity: 0; }
        }

        .hero-title {
            font-size: clamp(2.6rem, 5.4vw, 4.1rem);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -0.035em;
            margin-bottom: 20px;
        }

        .gradient-text-cyan {
            background: linear-gradient(135deg, #FFFFFF 0%, #38BDF8 50%, #818CF8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.12rem;
            color: var(--text-secondary);
            line-height: 1.72;
            margin-bottom: 34px;
            max-width: 640px;
        }

        .hero-subtitle strong {
            color: var(--text-primary);
            font-weight: 700;
        }

        /* Metric Counters Strip */
        .metrics-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 38px;
            padding: 20px;
            background: rgba(17, 24, 42, 0.6);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            backdrop-filter: blur(14px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .metric-item {
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding-right: 12px;
        }

        .metric-item:last-child {
            border-right: none;
            padding-right: 0;
        }

        .metric-value {
            font-family: var(--font-mono);
            font-size: 1.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, #38BDF8, #818CF8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .metric-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-hero-resume {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: #06080F;
            border: 1px solid rgba(16, 185, 129, 0.6);
            padding: 13px 24px;
            border-radius: var(--radius-sm);
            font-size: 0.95rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.35);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-hero-resume:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px rgba(16, 185, 129, 0.55);
            filter: brightness(1.1);
        }

        .btn-hero-ai {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 22px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.25) 0%, rgba(56, 189, 248, 0.25) 100%);
            border: 1px solid rgba(168, 85, 247, 0.5);
            border-radius: var(--radius-sm);
            color: #FFFFFF;
            font-size: 0.92rem;
            font-weight: 700;
            cursor: pointer;
            font-family: var(--font-sans);
            transition: all 0.25s ease;
        }

        .btn-hero-ai:hover {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.45) 0%, rgba(56, 189, 248, 0.45) 100%);
            border-color: var(--accent-cyan);
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.4);
            transform: translateY(-2px);
        }

        .btn-hero-primary {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-subtle);
            color: var(--text-primary);
            font-weight: 700;
            font-size: 0.92rem;
            padding: 13px 22px;
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
        }

        .btn-hero-primary:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .btn-hero-outline {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border-subtle);
            font-weight: 600;
            font-size: 0.92rem;
            padding: 13px 20px;
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
        }

        .btn-hero-outline:hover {
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            background: rgba(56, 189, 248, 0.05);
            transform: translateY(-2px);
        }

        /* macOS Terminal Window */
        .terminal-window {
            background: #090E1A;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-md);
            box-shadow: 0 25px 65px rgba(0, 0, 0, 0.7), 0 0 40px rgba(99, 102, 241, 0.2);
            overflow: hidden;
            font-family: var(--font-mono);
            position: relative;
        }

        .terminal-header {
            background: #0F1626;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .terminal-dots {
            display: flex;
            gap: 7px;
        }

        .terminal-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
        }

        .dot-red { background: #EF4444; }
        .dot-yellow { background: #F59E0B; }
        .dot-green { background: #10B981; }

        .terminal-title {
            font-size: 0.78rem;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .terminal-actions {
            display: flex;
            align-items: center;
        }

        .terminal-copy-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-family: var(--font-mono);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 2px 6px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .terminal-copy-btn:hover {
            color: var(--accent-cyan);
            background: rgba(56, 189, 248, 0.1);
        }

        .terminal-body {
            padding: 20px 22px;
            font-size: 0.86rem;
            line-height: 1.7;
            color: #E2E8F0;
            overflow-x: auto;
        }

        .code-keyword { color: #F43F5E; font-weight: 600; }
        .code-var { color: #38BDF8; }
        .code-property { color: #A78BFA; }
        .code-string { color: #34D399; }
        .code-number { color: #FBBF24; }
        .code-comment { color: #64748B; font-style: italic; }

        /* ==========================================================================
           SECTION HEADINGS & LAYOUT
           ========================================================================== */
        .section-wrap {
            padding: 90px 0;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section-header {
            margin-bottom: 50px;
        }

        .section-tag {
            display: inline-block;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--accent-cyan);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 10px;
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.25);
            padding: 4px 12px;
            border-radius: var(--radius-full);
        }

        .section-heading {
            font-size: clamp(2rem, 3.8vw, 2.75rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--text-primary);
            margin-bottom: 14px;
        }

        .section-lead {
            font-size: 1.08rem;
            color: var(--text-secondary);
            max-width: 700px;
            line-height: 1.7;
        }

        /* ==========================================================================
           CORE TECHNICAL SKILLS
           ========================================================================== */
        .skills-filter-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 36px;
        }

        .skill-filter-btn {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-full);
            padding: 8px 18px;
            font-size: 0.86rem;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: var(--font-sans);
        }

        .skill-filter-btn:hover {
            border-color: rgba(255, 255, 255, 0.2);
            color: var(--text-primary);
        }

        .skill-filter-btn.active {
            background: rgba(56, 189, 248, 0.14);
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            box-shadow: 0 0 16px rgba(56, 189, 248, 0.25);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 340px), 1fr));
            gap: 22px;
        }

        .skill-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 26px;
            position: relative;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            backdrop-filter: blur(10px);
        }

        .skill-card:hover {
            border-color: rgba(56, 189, 248, 0.4);
            transform: translateY(-4px);
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.4), var(--glow-cyan);
        }

        .skill-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .skill-badge-group {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .skill-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .skill-title {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--text-primary);
        }

        .skill-category {
            font-size: 0.74rem;
            color: var(--text-muted);
            text-transform: uppercase;
            font-family: var(--font-mono);
            letter-spacing: 0.5px;
        }

        .skill-pct {
            font-family: var(--font-mono);
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--accent-cyan);
        }

        .meter-track {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: var(--radius-full);
            overflow: hidden;
            margin-bottom: 16px;
        }

        .meter-fill {
            height: 100%;
            width: var(--progress, 80%);
            background: linear-gradient(90deg, #38BDF8, #818CF8);
            border-radius: var(--radius-full);
            transition: width 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .skill-info {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 18px;
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
            font-weight: 600;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            padding: 3px 9px;
            border-radius: 6px;
        }

        /* ==========================================================================
           KEY PROJECTS SHOWCASE
           ========================================================================== */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 350px), 1fr));
            gap: 26px;
        }

        .project-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 30px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-cyan), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .project-card:hover {
            border-color: rgba(168, 85, 247, 0.45);
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5), var(--glow-purple);
        }

        .project-card:hover::before {
            opacity: 1;
        }

        .project-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .live-tag {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 800;
            color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 4px 11px;
            border-radius: var(--radius-full);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .role-tag {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-family: var(--font-mono);
            font-weight: 500;
        }

        .project-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.32;
            margin-bottom: 14px;
        }

        .project-detail {
            font-size: 0.94rem;
            color: var(--text-secondary);
            line-height: 1.65;
            margin-bottom: 22px;
            flex: 1;
        }

        .project-stack-row {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 24px;
        }

        .stack-pill {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 600;
            color: var(--accent-cyan);
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.2);
            padding: 4px 10px;
            border-radius: 6px;
        }

        .project-link-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 800;
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-subtle);
            padding: 11px 20px;
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
            width: fit-content;
        }

        .project-link-btn:hover {
            background: var(--accent-cyan);
            color: #06080F;
            border-color: var(--accent-cyan);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.45);
        }

        /* ==========================================================================
           EXPERIENCE TIMELINE
           ========================================================================== */
        .timeline-container {
            display: flex;
            flex-direction: column;
            gap: 32px;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            padding-left: 36px;
            border-left: 2px solid rgba(56, 189, 248, 0.25);
        }

        .timeline-block {
            position: relative;
        }

        .timeline-point {
            position: absolute;
            left: -45px;
            top: 26px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--accent-cyan);
            box-shadow: 0 0 15px var(--accent-cyan);
            border: 3px solid var(--bg-base);
        }

        .timeline-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 30px;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .timeline-card:hover {
            border-color: rgba(56, 189, 248, 0.4);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .timeline-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-bottom: 16px;
        }

        .timeline-role-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-primary);
        }

        .timeline-org {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--accent-purple);
            margin-top: 2px;
        }

        .timeline-time {
            font-family: var(--font-mono);
            font-size: 0.82rem;
            color: var(--text-muted);
            background: rgba(255, 255, 255, 0.04);
            padding: 5px 14px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-subtle);
        }

        .timeline-bullets {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .timeline-bullets li {
            position: relative;
            padding-left: 22px;
            font-size: 0.94rem;
            color: var(--text-secondary);
            line-height: 1.65;
        }

        .timeline-bullets li::before {
            content: "▹";
            position: absolute;
            left: 0;
            color: var(--accent-cyan);
            font-size: 1.1rem;
            line-height: 1;
        }

        .timeline-bullets li strong {
            color: var(--text-primary);
        }

        /* ==========================================================================
           EDUCATION & CREDENTIALS
           ========================================================================== */
        .education-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 22px;
        }

        .edu-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 26px;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
        }

        .edu-card:hover {
            border-color: rgba(56, 189, 248, 0.35);
            transform: translateY(-3px);
        }

        .edu-level {
            font-family: var(--font-mono);
            font-size: 0.76rem;
            font-weight: 700;
            color: var(--accent-cyan);
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .edu-degree {
            font-size: 1.18rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .edu-school {
            font-size: 0.92rem;
            color: var(--text-secondary);
            margin-bottom: 18px;
            flex: 1;
        }

        .edu-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: var(--font-mono);
            font-size: 0.82rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 14px;
        }

        .score-pill {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--accent-green);
            padding: 3px 10px;
            border-radius: 6px;
            font-weight: 700;
        }

        /* ==========================================================================
           CONTACT & DIRECT FOUNDER DESK
           ========================================================================== */
        .contact-box {
            background: linear-gradient(135deg, rgba(11, 16, 30, 0.95) 0%, rgba(17, 24, 42, 0.95) 100%);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-lg);
            padding: clamp(32px, 5vw, 64px);
            text-align: center;
            max-width: 920px;
            margin: 0 auto;
            box-shadow: var(--glow-cyan);
            position: relative;
        }

        .contact-title {
            font-size: clamp(2rem, 4.2vw, 2.9rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 16px;
        }

        .contact-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 660px;
            margin: 0 auto 38px;
            line-height: 1.7;
        }

        /* Direct Official Resume Download Banner */
        .resume-download-banner {
            max-width: 760px;
            margin: 0 auto 32px;
            background: linear-gradient(135deg, rgba(14, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.85) 100%);
            border: 1px solid rgba(56, 189, 248, 0.35);
            border-radius: var(--radius-md);
            padding: 22px 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            text-align: left;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
        }

        .resume-banner-badge {
            display: inline-block;
            font-size: 0.72rem;
            font-family: var(--font-mono);
            font-weight: 800;
            color: var(--accent-cyan);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .resume-banner-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.01em;
        }

        .resume-banner-desc {
            font-size: 0.86rem;
            color: var(--text-secondary);
            margin-top: 3px;
        }

        .resume-banner-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .btn-download-cv {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #06080F;
            padding: 11px 20px;
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(56, 189, 248, 0.35);
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-download-cv:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(56, 189, 248, 0.55);
            filter: brightness(1.08);
        }

        .btn-view-cv {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-secondary);
            border: 1px solid var(--border-subtle);
            padding: 11px 16px;
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-view-cv:hover {
            color: var(--text-primary);
            border-color: rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
        }

        /* Interactive Contact Form */
        .portfolio-contact-form {
            text-align: left;
            margin: 0 auto 36px;
            max-width: 760px;
            background: rgba(9, 14, 26, 0.7);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: clamp(22px, 4vw, 38px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.45);
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
            background: #0B101E;
            border: 1.5px solid var(--border-subtle);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            color: var(--text-primary);
            font-family: var(--font-sans);
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
            background: #0F162A;
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
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #06080F;
            border: none;
            border-radius: var(--radius-sm);
            padding: 15px 24px;
            font-family: var(--font-sans);
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 4px 22px rgba(56, 189, 248, 0.4);
            transition: all 0.2s ease;
        }

        .btn-submit-contact:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px rgba(56, 189, 248, 0.6);
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

        .form-topic-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .form-topic-chip {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-full);
            padding: 6px 14px;
            font-size: 0.8rem;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.15s ease;
            user-select: none;
            font-family: var(--font-sans);
        }

        .form-topic-chip:hover {
            background: rgba(56, 189, 248, 0.15);
            border-color: var(--accent-cyan);
            color: #FFFFFF;
        }

        .form-topic-chip.active {
            background: rgba(56, 189, 248, 0.22);
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            font-weight: 700;
        }

        .contact-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
            margin-bottom: 38px;
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
            font-size: 0.92rem;
            font-weight: 700;
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
            padding: 6px 14px;
            border-radius: var(--radius-sm);
            font-size: 0.8rem;
            font-weight: 700;
            font-family: var(--font-mono);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-action-sm:hover {
            background: var(--accent-cyan);
            color: #06080F;
            border-color: var(--accent-cyan);
        }

        .store-back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-secondary);
            font-size: 0.9rem;
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
            padding: 34px 0;
            background: #04060B;
            color: var(--text-muted);
            font-size: 0.88rem;
            text-align: center;
        }

        /* ==========================================================================
           AUTO ON-LOAD CONNECT & CV MODAL
           ========================================================================== */
        .connect-modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(4, 6, 11, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 99990;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s ease;
        }

        .connect-modal-backdrop.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .connect-modal-card {
            background: linear-gradient(145deg, rgba(17, 24, 42, 0.98) 0%, rgba(9, 14, 26, 0.99) 100%);
            border: 1px solid rgba(56, 189, 248, 0.4);
            border-radius: 20px;
            max-width: 530px;
            width: 100%;
            padding: 30px 32px;
            box-shadow: 0 25px 65px rgba(0, 0, 0, 0.75), 0 0 35px rgba(56, 189, 248, 0.2);
            position: relative;
            transform: scale(0.92) translateY(20px);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: left;
            box-sizing: border-box;
        }

        .connect-modal-backdrop.open .connect-modal-card {
            transform: scale(1) translateY(0);
        }

        .modal-close-btn {
            position: absolute;
            top: 18px;
            right: 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all 0.2s ease;
        }

        .modal-close-btn:hover {
            background: rgba(244, 63, 94, 0.15);
            border-color: rgba(244, 63, 94, 0.4);
            color: #FB7185;
            transform: rotate(90deg);
        }

        .modal-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: var(--accent-cyan);
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 11px;
            border-radius: var(--radius-full);
            margin-bottom: 12px;
        }

        .modal-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            margin: 0 0 8px;
            line-height: 1.3;
        }

        .modal-subtitle {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin: 0 0 18px;
            line-height: 1.55;
        }

        .modal-direct-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid var(--border-subtle);
            font-size: 0.84rem;
            color: var(--text-muted);
            flex-wrap: wrap;
            gap: 8px;
        }

        .modal-direct-link {
            color: var(--accent-cyan);
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .modal-direct-link:hover {
            text-decoration: underline;
        }

        .modal-skip-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 0.84rem;
            cursor: pointer;
            padding: 0;
            font-family: var(--font-sans);
        }

        .modal-skip-btn:hover {
            color: var(--text-secondary);
            text-decoration: underline;
        }

        /* ==========================================================================
           AI CAREER ASSISTANT (GOOGLE GEMINI 3.6 FLASH)
           ========================================================================== */
        .ai-launcher-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 100002;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #7C3AED 0%, #0284C7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: var(--radius-full);
            box-shadow: 0 8px 32px rgba(2, 132, 199, 0.45), 0 0 24px rgba(124, 58, 237, 0.45);
            font-size: 0.9rem;
            font-weight: 800;
            cursor: pointer;
            font-family: var(--font-sans);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            user-select: none;
        }

        .ai-launcher-btn * {
            pointer-events: none;
        }

        .ai-launcher-btn:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 12px 40px rgba(2, 132, 199, 0.65), 0 0 30px rgba(124, 58, 237, 0.65);
            filter: brightness(1.1);
        }

        .ai-launcher-pulse {
            position: relative;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #10B981;
        }

        .ai-launcher-pulse::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background-color: #10B981;
            opacity: 0.7;
            animation: pulseRing 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .ai-launcher-badge {
            background: rgba(0, 0, 0, 0.35);
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #A5F3FC;
            border: 1px solid rgba(165, 243, 252, 0.25);
        }

        /* Chat Card Window */
        .ai-chat-card {
            position: fixed;
            bottom: 88px;
            right: 24px;
            width: 420px;
            max-width: calc(100vw - 32px);
            height: 580px;
            max-height: calc(100vh - 110px);
            z-index: 100005;
            background: linear-gradient(180deg, rgba(17, 24, 42, 0.98) 0%, rgba(9, 14, 26, 0.99) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(168, 85, 247, 0.4);
            border-radius: 22px;
            box-shadow: 0 25px 65px rgba(0, 0, 0, 0.8), 0 0 45px rgba(56, 189, 248, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(20px) scale(0.95);
            transform-origin: bottom right;
            transition: opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1), transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.28s ease;
        }

        .ai-chat-card.open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }

        /* Chat Header */
        .ai-chat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.25) 0%, rgba(56, 189, 248, 0.18) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .ai-chat-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ai-chat-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #7C3AED, #38BDF8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            box-shadow: 0 0 16px rgba(56, 189, 248, 0.4);
        }

        .ai-chat-title-group h4 {
            font-size: 0.94rem;
            font-weight: 800;
            color: #FFFFFF;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .ai-chat-subtitle {
            font-size: 0.74rem;
            color: #94A3B8;
            margin: 2px 0 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .ai-chat-close-btn {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #94A3B8;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .ai-chat-close-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #FFFFFF;
        }

        /* Quick Prompt Chips */
        .ai-chat-chips {
            padding: 10px 16px;
            display: flex;
            gap: 8px;
            overflow-x: auto;
            white-space: nowrap;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            background: rgba(10, 14, 26, 0.6);
            scrollbar-width: none;
        }
        .ai-chat-chips::-webkit-scrollbar {
            display: none;
        }

        .ai-chip {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 11px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: var(--radius-full);
            color: #CBD5E1;
            font-size: 0.74rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            user-select: none;
            flex-shrink: 0;
            font-family: var(--font-sans);
        }

        .ai-chip:hover {
            background: rgba(56, 189, 248, 0.15);
            border-color: #38BDF8;
            color: #38BDF8;
            transform: translateY(-1px);
        }

        /* Messages Body */
        .ai-chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .ai-message-row {
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .ai-message-row.user {
            flex-direction: row-reverse;
        }

        .ai-message-avatar {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: linear-gradient(135deg, #6366F1, #38BDF8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.82rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .ai-message-bubble {
            max-width: 84%;
            padding: 11px 15px;
            border-radius: 14px;
            font-size: 0.86rem;
            line-height: 1.55;
            word-break: break-word;
        }

        .ai-message-row.assistant .ai-message-bubble {
            background: #141B2D;
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #E2E8F0;
            border-top-left-radius: 4px;
        }

        .ai-message-row.user .ai-message-bubble {
            background: linear-gradient(135deg, #4F46E5 0%, #0284C7 100%);
            color: #FFFFFF;
            border-top-right-radius: 4px;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
        }

        .ai-message-bubble strong {
            color: #38BDF8;
        }

        .ai-message-bubble a {
            color: #38BDF8;
            text-decoration: underline;
        }

        .ai-typing-indicator {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
        }

        .ai-typing-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #38BDF8;
            animation: typingBounce 1.4s infinite ease-in-out both;
        }

        .ai-typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .ai-typing-dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes typingBounce {
            0%, 80%, 100% { transform: scale(0); opacity: 0.4; }
            40% { transform: scale(1); opacity: 1; }
        }

        /* Chat Input Bar */
        .ai-chat-input-container {
            padding: 12px 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(13, 18, 32, 0.95);
        }

        .ai-chat-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .ai-chat-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 10px;
            color: #F8FAFC;
            padding: 10px 14px;
            font-size: 0.88rem;
            font-family: var(--font-sans);
            outline: none;
            transition: border-color 0.2s;
        }

        .ai-chat-input:focus {
            border-color: var(--accent-cyan);
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.2);
        }

        .ai-chat-send-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #7C3AED, #38BDF8);
            border: none;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            transition: all 0.2s;
        }

        .ai-chat-send-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 14px rgba(56, 189, 248, 0.5);
        }

        .ai-chat-send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .ai-chat-footer-tag {
            margin-top: 6px;
            font-size: 0.7rem;
            color: #64748B;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* ==========================================================================
           RESPONSIVE DESIGN & MOBILE OPTIMIZATIONS
           ========================================================================== */
        @media (max-width: 960px) {
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

        @media (max-width: 640px) {
            .container {
                padding: 0 16px !important;
            }
            .dev-navbar {
                top: 8px;
                padding: 0 8px;
            }
            .btn-nav-secondary {
                display: none;
            }
            .btn-nav-primary {
                padding: 7px 14px;
                font-size: 0.82rem;
            }
            .hero-section {
                padding: 35px 0 35px;
            }
            .hero-title {
                font-size: 2.15rem;
                letter-spacing: -0.02em;
            }
            .hero-subtitle {
                font-size: 1rem;
                margin-bottom: 24px;
            }
            .metrics-strip {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
                padding: 14px;
                margin-bottom: 24px;
            }
            .metric-value {
                font-size: 1.45rem;
            }
            .metric-title {
                font-size: 0.68rem;
            }
            .hero-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            .hero-actions a,
            .hero-actions button {
                width: 100%;
                justify-content: center;
                text-align: center;
                padding: 12px 18px;
            }
            .terminal-window {
                margin-top: 10px;
            }
            .terminal-body {
                padding: 14px;
                font-size: 0.78rem;
            }
            .section-wrap {
                padding: 50px 0;
            }
            .section-header {
                margin-bottom: 30px;
            }
            .section-heading {
                font-size: 1.75rem;
            }
            .section-lead {
                font-size: 0.94rem;
            }
            .skills-filter-nav {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 8px;
                margin-bottom: 20px;
                gap: 8px;
            }
            .skill-filter-btn {
                white-space: nowrap;
                flex-shrink: 0;
                padding: 7px 14px;
                font-size: 0.8rem;
            }
            .skills-grid, .projects-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .skill-card, .project-card {
                padding: 20px 18px;
            }
            .timeline-container {
                padding-left: 20px;
                border-left-width: 2px;
            }
            .timeline-point {
                left: -29px;
                width: 14px;
                height: 14px;
            }
            .timeline-card {
                padding: 20px 16px;
            }
            .contact-methods {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .portfolio-contact-form {
                padding: 22px 16px;
            }
            .form-grid-2 {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .resume-download-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                padding: 20px 16px;
            }
            .resume-banner-actions {
                width: 100%;
                flex-direction: column;
            }
            .btn-download-cv, .btn-view-cv {
                width: 100%;
                justify-content: center;
            }
            .form-input, .form-select, .form-textarea {
                font-size: 16px !important;
            }
            .ai-launcher-btn {
                bottom: 16px !important;
                right: 14px !important;
                padding: 10px 15px !important;
                font-size: 0.82rem !important;
            }
            .ai-chat-card {
                bottom: 0 !important;
                right: 0 !important;
                left: 0 !important;
                width: 100% !important;
                max-width: 100vw !important;
                height: 84vh !important;
                max-height: 84vh !important;
                border-radius: 22px 22px 0 0 !important;
                border-bottom: none !important;
                transform: translateY(100%) scale(1) !important;
            }
            .ai-chat-card.open {
                transform: translateY(0) scale(1) !important;
            }
        }
    </style>
</head>
<body>
    <!-- Ambient Animated Glow Mesh & Microdot Grid -->
    <div class="ambient-glow-mesh" aria-hidden="true">
        <div class="glow-circle-1"></div>
        <div class="glow-circle-2"></div>
        <div class="glow-circle-3"></div>
    </div>
    <div class="grid-pattern-overlay" aria-hidden="true"></div>

    <!-- Floating Frosted-Glass Pill Navigation Dock -->
    <header class="dev-navbar">
        <nav class="nav-dock" aria-label="Main Navigation">
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
                <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-nav-resume" title="Download Official CV (PDF)">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Download CV</span>
                </a>
                <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-nav-secondary" title="GitHub Profile">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    <span>GitHub</span>
                </a>
                <button type="button" class="btn-nav-primary" onclick="window.openModal()">
                    <span>Get in Touch ✦</span>
                </button>
            </div>
        </nav>
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
                            <span style="opacity: 0.85;">• 📍 DELHI NCR, INDIA</span>
                        </div>

                        <h1 class="hero-title">
                            Hi, I'm <span class="gradient-text-cyan">Maayank Malhotra</span>.<br>
                            Distributed Systems &amp; Web Architect.
                        </h1>

                        <p class="hero-subtitle">
                            Full Stack Software Engineer (also known as <strong>Mayank Malhotra</strong>) with <strong>4+ years of experience</strong> architecting scalable backend microservices (Node.js, Express, PHP, Laravel), responsive frontends (React.js, Redux, TypeScript), and cloud pipelines on AWS (EC2, S3, Docker). Proven track record scaling APIs to <strong>1.5M+ monthly transactions</strong>, optimizing system performance by 20%, and mentoring engineering teams. Founder of <strong>Tabstick</strong>.
                        </p>

                        <!-- Key Performance Metrics Strip -->
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
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-hero-resume" title="Download Official CV (PDF)">
                                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                <span>Download Official CV</span>
                            </a>
                            <button type="button" id="hero-open-ai-chat" class="btn-hero-ai" title="Chat with Maayank's AI Career Assistant (Google Gemini 3.6 Flash)">
                                <span>✨ Ask My AI (Gemini 3.6)</span>
                            </button>
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

                    <!-- Interactive Code Terminal Window -->
                    <div>
                        <div class="terminal-window">
                            <div class="terminal-header">
                                <div class="terminal-dots">
                                    <div class="terminal-dot dot-red"></div>
                                    <div class="terminal-dot dot-yellow"></div>
                                    <div class="terminal-dot dot-green"></div>
                                </div>
                                <div class="terminal-title">maayank.config.ts</div>
                                <div class="terminal-actions">
                                    <button type="button" class="terminal-copy-btn" id="terminal-copy-btn" onclick="copyTerminalCode(this)">
                                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        <span>Copy</span>
                                    </button>
                                </div>
                            </div>
                            <div class="terminal-body">
<pre id="terminal-code-snippet"><code><span class="code-comment">// Production-Ready Full Stack Engineer</span>
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

                    <!-- 5. AWS Cloud & Docker -->
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

                    <!-- 8. Nginx & Linux Administration -->
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

                    <!-- 9. REST APIs & GraphQL -->
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

                    <!-- 10. Mentoring & Leadership -->
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

        <!-- Contact & Direct Founder Desk -->
        <section class="section-wrap" id="contact">
            <div class="container">
                <div class="contact-box">
                    <h2 class="contact-title">Let's Build Something High-Impact.</h2>
                    <p class="contact-subtitle">
                        Looking for a senior full-stack engineer, a microservices backend lead, or want to collaborate on innovative web products? Download my official CV directly below, or drop your email to receive it instantly with my credentials via SMTP.
                    </p>

                    <!-- Direct Official Resume Download Banner -->
                    <div class="resume-download-banner">
                        <div class="resume-banner-content">
                            <span class="resume-banner-badge">📄 Official Verified Credentials</span>
                            <div class="resume-banner-title">Maayank Malhotra — Full Stack Software Engineer</div>
                            <div class="resume-banner-desc">4+ Years Exp • Node.js, Express, Laravel, React.js, AWS Cloud, WebRTC • PDF (58 KB)</div>
                        </div>
                        <div class="resume-banner-actions">
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-download-cv" title="Download Resume PDF">
                                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                <span>Download CV (PDF)</span>
                            </a>
                            <a href="{{ route('portfolio.resume') }}?inline=1" target="_blank" class="btn-view-cv" title="View PDF in New Tab">
                                <span>View PDF ↗</span>
                            </a>
                        </div>
                    </div>

                    <!-- Low-Friction Interactive Contact Form -->
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
                                <label for="contact-name" class="form-label">Your Name <small style="color:var(--text-muted);font-weight:normal;text-transform:none;">(Optional)</small></label>
                                <input type="text" id="contact-name" name="name" class="form-input" placeholder="e.g. Alex Johnson" maxlength="100">
                            </div>

                            <div class="form-group">
                                <label for="contact-email" class="form-label">Your Email <span class="req">*</span> <small style="color:var(--accent-cyan);font-weight:normal;text-transform:none;">(Resume sent here)</small></label>
                                <input type="email" id="contact-email" name="email" class="form-input" placeholder="you@company.com" required maxlength="150">
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="contact-phone" class="form-label">Phone / WhatsApp <small style="color:var(--text-muted);font-weight:normal;text-transform:none;">(Optional)</small></label>
                                <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="+91 98765 43210" maxlength="30">
                            </div>

                            <div class="form-group">
                                <label for="contact-subject" class="form-label">Inquiry Topic <small style="color:var(--text-muted);font-weight:normal;text-transform:none;">(Optional)</small></label>
                                <select id="contact-subject" name="subject" class="form-select">
                                    <option value="Senior Full-Stack / Backend Engineering Role" selected>💼 Full-Stack / Backend Engineering Role</option>
                                    <option value="Freelance / SaaS Architecture Consulting">🛠️ SaaS Architecture / Consulting</option>
                                    <option value="Quick Official Resume Request">⚡ Quick Official Resume Request</option>
                                    <option value="WebRTC & Real-Time Media Collaboration">📡 WebRTC &amp; Real-Time Systems</option>
                                    <option value="General Engineering Chat">💬 General Tech Chat / Connect</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px; flex-wrap:wrap; gap:6px;">
                                <label for="contact-message" class="form-label" style="margin-bottom:0;">Message / Details <small style="color:var(--text-muted);font-weight:normal;text-transform:none;">(Optional)</small></label>
                                <span style="font-size:0.75rem; color:var(--accent-cyan); font-family:var(--font-mono);">⚡ Pre-filled for 1-click send</span>
                            </div>

                            <!-- Quick One-Click Template Chips -->
                            <div class="form-topic-chips">
                                <span class="form-topic-chip active" data-subject="Senior Full-Stack / Backend Engineering Role" data-msg="Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!">💼 Engineering Role</span>
                                <span class="form-topic-chip" data-subject="Freelance / SaaS Architecture Consulting" data-msg="Hi Maayank, I'm building a modern web application / SaaS platform and would like to consult on high-scale architecture, APIs, and cloud infrastructure. Let's connect!">🛠️ SaaS &amp; Consulting</span>
                                <span class="form-topic-chip" data-subject="Quick Official Resume Request" data-msg="Hi Maayank, please send over your official resume and technical case studies to my email. Looking forward to reviewing!">⚡ Quick CV Request</span>
                                <span class="form-topic-chip" data-subject="WebRTC & Real-Time Media Collaboration" data-msg="Hi Maayank, impressed by your real-time WebRTC audio/video work. We'd like to collaborate or explore synergies.">📡 WebRTC / Media</span>
                            </div>

                            <textarea id="contact-message" name="message" class="form-textarea" rows="4" maxlength="3000">Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!</textarea>
                        </div>

                        <button type="submit" id="btn-submit-contact" class="btn-submit-contact">
                            <span>⚡ Send Message &amp; Receive Official Resume (PDF)</span>
                        </button>
                        <p style="margin: 12px 0 0; font-size: 0.78rem; color: var(--text-muted); text-align: center; font-family: var(--font-mono);">
                            🔒 Direct SMTP Delivery • Maayank's official Resume (PDF) will be attached directly to your email
                        </p>
                    </form>

                    <div class="contact-methods">
                        <div class="contact-method-item">
                            <div class="method-info">
                                <span class="method-type">Official Resume</span>
                                <span class="method-val">Maayank_Malhotra_Resume.pdf</span>
                            </div>
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-action-sm">
                                <span>Download ↓</span>
                            </a>
                        </div>

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

    <!-- JSON-LD ProfilePage, Person & FAQ Structured Data for SEO Knowledge Graph -->
    @php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'ProfilePage',
                '@id' => 'https://tabstick.in/maayank#profilepage',
                'url' => 'https://tabstick.in/maayank',
                'name' => 'Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer & Founder',
                'description' => 'Official developer portfolio and verified credentials of Maayank Malhotra (Mayank Malhotra), Founder of Tabstick and Senior Full Stack Engineer.',
                'isPartOf' => [
                    '@type' => 'WebSite',
                    '@id' => 'https://tabstick.in/#website',
                    'name' => 'Tabstick',
                    'url' => 'https://tabstick.in',
                ],
                'about' => [
                    '@id' => 'https://tabstick.in/maayank#person',
                ],
                'mainEntity' => [
                    '@id' => 'https://tabstick.in/maayank#person',
                ],
            ],
            [
                '@type' => 'Person',
                '@id' => 'https://tabstick.in/maayank#person',
                'name' => 'Maayank Malhotra',
                'alternateName' => ['Mayank Malhotra', 'Mayank', 'Maayank'],
                'givenName' => 'Maayank',
                'familyName' => 'Malhotra',
                'gender' => 'Male',
                'jobTitle' => 'Full Stack Software Engineer',
                'description' => 'Full Stack Software Engineer with 4+ years of experience architecting scalable Node.js, Express, React, Laravel, and AWS cloud applications. Founder of Tabstick.',
                'url' => 'https://tabstick.in/maayank',
                'image' => asset('favicon-512x512.png'),
                'email' => 'maayankmalhotra095@gmail.com',
                'telephone' => '+918799730966',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Delhi NCR',
                    'addressCountry' => 'IN',
                ],
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
                    'https://tabstick.in',
                ],
            ],
            [
                '@type' => 'FAQPage',
                '@id' => 'https://tabstick.in/maayank#faq',
                'mainEntity' => [
                    [
                        '@type' => 'Question',
                        'name' => 'Who is Maayank Malhotra?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'Maayank Malhotra (also known as Mayank Malhotra) is a Full Stack Software Engineer and the founder of Tabstick (tabstick.in). He has 4+ years of professional engineering experience in distributed systems, Node.js, Laravel, React.js, and AWS cloud architecture.',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'Where can I download Maayank Malhotra\'s official resume?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'You can download the verified official resume (PDF) of Maayank Malhotra directly at https://tabstick.in/maayank/resume or https://tabstick.in/resume.',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'What is Tabstick and who founded it?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'Tabstick (tabstick.in) is an Indian e-commerce brand that manufactures premium die-cut waterproof vinyl stickers and decals for laptops, vehicles, and phones, founded by Maayank Malhotra.',
                        ],
                    ],
                    [
                        '@type' => 'Question',
                        'name' => 'How can I contact or hire Maayank Malhotra?',
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => 'You can reach Maayank Malhotra via email at maayankmalhotra095@gmail.com, telephone at +91 8799730966, or via his LinkedIn profile at https://www.linkedin.com/in/maayank-malhotra-a59a55186/.',
                        ],
                    ],
                ],
            ],
        ],
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Auto On-Load Connect & Official Resume Modal -->
    <div id="connect-modal" class="connect-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="modal-heading">
        <div class="connect-modal-card">
            <button type="button" class="modal-close-btn" id="modal-close-btn" onclick="window.closeModal()" aria-label="Close dialog">✕</button>

            <div class="modal-tag">
                <span class="status-pulse" style="width:6px; height:6px;"></span>
                <span>Direct Founder Desk • Instant CV Dispatch</span>
            </div>

            <h3 class="modal-title" id="modal-heading">Connect with Maayank Malhotra</h3>
            <p class="modal-subtitle">
                Looking to discuss a senior engineering role, SaaS architecture, or want my verified official CV? Drop your email below — a copy of my resume (PDF) will be shot to your inbox via SMTP instantly.
            </p>

            <form id="modal-contact-form" action="{{ route('portfolio.contact') }}" method="POST">
                @csrf
                <div id="modal-form-alert" class="form-status-alert"></div>

                <div class="form-group" style="margin-bottom: 12px;">
                    <label for="modal-email" class="form-label" style="font-size: 0.78rem;">Your Email <span class="req">*</span> <small style="color:var(--accent-cyan);text-transform:none;">(Resume sent here)</small></label>
                    <input type="email" id="modal-email" name="email" class="form-input" placeholder="you@company.com" required maxlength="150">
                </div>

                <div class="form-group" style="margin-bottom: 12px;">
                    <label for="modal-name" class="form-label" style="font-size: 0.78rem;">Your Name <small style="color:var(--text-muted);text-transform:none;">(Optional)</small></label>
                    <input type="text" id="modal-name" name="name" class="form-input" placeholder="e.g. Alex Johnson" maxlength="100">
                </div>

                <div class="form-group" style="margin-bottom: 14px;">
                    <label class="form-label" style="font-size: 0.78rem;">Inquiry Topic <small style="color:var(--text-muted);text-transform:none;">(Optional)</small></label>
                    <div class="form-topic-chips" style="margin-bottom:0;">
                        <span class="modal-topic-chip form-topic-chip active" data-subject="Senior Full-Stack / Backend Engineering Role" data-msg="Hi Maayank, I came across your portfolio and would like to connect regarding an engineering role / collaboration. Please share your official resume!">💼 Engineering Role</span>
                        <span class="modal-topic-chip form-topic-chip" data-subject="Freelance / SaaS Architecture Consulting" data-msg="Hi Maayank, I have a web / cloud architecture project and would love to consult with you.">🛠️ Consulting</span>
                        <span class="modal-topic-chip form-topic-chip" data-subject="Quick Official Resume Request" data-msg="Hi Maayank, please send over your official resume and latest project case studies to my email.">⚡ Get Official CV</span>
                    </div>
                    <input type="hidden" id="modal-subject" name="subject" value="Senior Full-Stack / Backend Engineering Role">
                    <input type="hidden" id="modal-message" name="message" value="Hi Maayank, I came across your portfolio and would like to connect regarding an engineering role / collaboration. Please share your official resume!">
                </div>

                <button type="submit" id="modal-submit-btn" class="btn-submit-contact" style="padding: 13px 20px;">
                    <span>⚡ Send Me Official CV &amp; Connect</span>
                </button>
            </form>

            <div class="modal-direct-row">
                <div>
                    <span>Direct: </span>
                    <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="modal-direct-link">
                        <span>📄 Download PDF (58 KB)</span>
                    </a>
                </div>
                <button type="button" class="modal-skip-btn" id="modal-skip-btn" onclick="window.closeModal()">
                    Skip &amp; Explore Portfolio →
                </button>
            </div>
        </div>
    </div>

    <!-- Floating AI Assistant Launcher Button -->
    <button type="button" class="ai-launcher-btn" id="ai-launcher-btn" aria-label="Open AI Career Assistant (Google Gemini 3.6 Flash)">
        <span class="ai-launcher-pulse" aria-hidden="true"></span>
        <span>✨ Ask Maayank's AI</span>
        <span class="ai-launcher-badge">Gemini 3.6</span>
    </button>

    <!-- AI Career Assistant Floating Card Window -->
    <div id="ai-chat-card" class="ai-chat-card" role="dialog" aria-modal="false" aria-labelledby="ai-chat-title">
        <div class="ai-chat-header">
            <div class="ai-chat-header-info">
                <div class="ai-chat-avatar" aria-hidden="true">🤖</div>
                <div class="ai-chat-title-group">
                    <h4 id="ai-chat-title">
                        Maayank's AI Assistant
                        <span class="status-pulse" style="width:6px;height:6px;background:#10B981;"></span>
                    </h4>
                    <p class="ai-chat-subtitle">
                        <span>Powered by Google Gemini 3.6 Flash</span>
                    </p>
                </div>
            </div>
            <button type="button" class="ai-chat-close-btn" id="ai-chat-close-btn" aria-label="Close chat">✕</button>
        </div>

        <!-- Suggested Prompt Chips -->
        <div class="ai-chat-chips" id="ai-chat-chips">
            <button type="button" class="ai-chip" data-prompt="What is Maayank's primary tech stack and experience?">🚀 Tech Stack</button>
            <button type="button" class="ai-chip" data-prompt="Tell me about Maayank scaling systems to 1.5M+ transactions.">⚡ 1.5M+ Scale</button>
            <button type="button" class="ai-chip" data-prompt="What were Maayank's key contributions at Thinktail and Cracode?">💼 Work History</button>
            <button type="button" class="ai-chip" data-prompt="How did Maayank engineer the Tabstick platform?">📦 Tabstick Architecture</button>
            <button type="button" class="ai-chip" data-prompt="How can I download Maayank's official resume and hire him?">📄 Official CV &amp; Hiring</button>
        </div>

        <!-- Chat Messages Container -->
        <div class="ai-chat-messages" id="ai-chat-messages">
            <div class="ai-message-row assistant">
                <div class="ai-message-avatar">✨</div>
                <div class="ai-message-bubble">
                    Hello! 👋 I'm <strong>Maayank's AI Career Assistant</strong> powered in real time by <strong>Google Gemini 3.6 Flash</strong>.<br><br>
                    Ask me anything about Maayank's 4+ years of full-stack engineering, 1.5M+ transaction scaling at Cracode, WebRTC real-time systems, or how to collaborate with him!
                </div>
            </div>
        </div>

        <!-- Chat Input Form -->
        <div class="ai-chat-input-container">
            <form id="ai-chat-form" class="ai-chat-form">
                <input type="text" id="ai-chat-input" class="ai-chat-input" placeholder="Ask anything about Maayank..." maxlength="500" autocomplete="off">
                <button type="submit" id="ai-chat-send-btn" class="ai-chat-send-btn" aria-label="Send prompt">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </button>
            </form>
            <div class="ai-chat-footer-tag">
                <span>⚡ Live Inference • Powered by Google Gemini 3.6 Flash • Press Enter to Send</span>
            </div>
        </div>
    </div>

    <!-- Client Scripts for Micro-Interactions, Filtering, and AJAX Handlers -->
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

        // Terminal Code Copy Helper
        function copyTerminalCode(btn) {
            const rawCode = `// Production-Ready Full Stack Engineer
export const engineer = {
  name: "Maayank Malhotra",
  role: "Full Stack Software Engineer",
  experienceYears: 4,
  stats: {
    monthlyTransactions: "1,500,000+",
    monthlyApiCalls: "1,000,000+",
    performanceGain: "20% optimization",
    enterpriseReleases: 5
  },
  coreLanguages: ["TypeScript", "JavaScript", "PHP"],
  backend: ["Node.js", "Express.js", "Laravel", "GraphQL"],
  frontend: ["React.js", "Redux", "Tailwind CSS"],
  cloudDevOps: ["AWS EC2", "AWS S3", "Docker", "CI/CD"],
  realTime: ["WebRTC", "Socket.io", "Pusher"],
  founder: "Tabstick (tabstick.in)"
};`;
            navigator.clipboard.writeText(rawCode).then(() => {
                const prev = btn.innerHTML;
                btn.innerHTML = '<span>✓ Copied</span>';
                btn.style.color = '#10B981';
                setTimeout(() => {
                    btn.innerHTML = prev;
                    btn.style.color = '';
                }, 2000);
            });
        }

        // Copy Email Helper
        function copyEmail(btn) {
            navigator.clipboard.writeText('maayankmalhotra095@gmail.com').then(() => {
                const prev = btn.innerHTML;
                btn.innerHTML = '<span>✓ Copied!</span>';
                btn.style.background = '#10B981';
                btn.style.color = '#06080F';
                btn.style.borderColor = '#10B981';
                setTimeout(() => {
                    btn.innerHTML = prev;
                    btn.style.background = '';
                    btn.style.color = '';
                    btn.style.borderColor = '';
                }, 2000);
            });
        }

        // Contact Form Interactive Logic & Pre-population
        const contactForm = document.getElementById('portfolio-contact-form');
        const formAlert = document.getElementById('form-alert');
        const submitBtn = document.getElementById('btn-submit-contact');
        const topicChips = document.querySelectorAll('.form-topic-chip');
        const subjectSelect = document.getElementById('contact-subject');
        const messageTextarea = document.getElementById('contact-message');

        const defaultTemplateMsg = "Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!";

        // Pre-populate message if empty on load
        if (messageTextarea && !messageTextarea.value.trim()) {
            messageTextarea.value = defaultTemplateMsg;
        }

        // 1-Click Topic Chips to switch subject and pre-populate message
        topicChips.forEach(chip => {
            chip.addEventListener('click', function() {
                topicChips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                const targetSubject = this.getAttribute('data-subject');
                const targetMsg = this.getAttribute('data-msg');

                if (subjectSelect && targetSubject) {
                    subjectSelect.value = targetSubject;
                }
                if (messageTextarea && targetMsg) {
                    messageTextarea.value = targetMsg;
                }
            });
        });

        // AJAX Submission for In-Page Contact Form
        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                formAlert.style.display = 'none';
                formAlert.className = 'form-status-alert';
                formAlert.innerHTML = '';

                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>⏳ Shooting email &amp; official CV via SMTP...</span>';

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

                        // Restore sensible pre-populated template after reset
                        if (messageTextarea) {
                            messageTextarea.value = defaultTemplateMsg;
                        }
                        topicChips.forEach((c, idx) => {
                            c.classList.toggle('active', idx === 0);
                        });
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

        // Auto On-Load Modal Logic
        const connectModal = document.getElementById('connect-modal');
        const modalCloseBtn = document.getElementById('modal-close-btn');
        const modalSkipBtn = document.getElementById('modal-skip-btn');
        const modalForm = document.getElementById('modal-contact-form');
        const modalAlert = document.getElementById('modal-form-alert');
        const modalSubmitBtn = document.getElementById('modal-submit-btn');
        const modalChips = document.querySelectorAll('.modal-topic-chip');
        const modalSubject = document.getElementById('modal-subject');
        const modalMessage = document.getElementById('modal-message');

        window.openModal = function() {
            const modal = document.getElementById('connect-modal');
            if (modal) {
                modal.classList.add('open');
                setTimeout(() => {
                    const emailInput = document.getElementById('modal-email');
                    if (emailInput) emailInput.focus();
                }, 350);
            }
        };

        window.closeModal = function() {
            const modal = document.getElementById('connect-modal');
            if (modal) {
                modal.classList.remove('open');
            }
        };

        // Auto open modal on load (600ms delay)
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(window.openModal, 600);
        });

        // Close listeners
        if (modalCloseBtn) modalCloseBtn.addEventListener('click', window.closeModal);
        if (modalSkipBtn) modalSkipBtn.addEventListener('click', window.closeModal);
        if (connectModal) {
            connectModal.addEventListener('click', (e) => {
                if (e.target === connectModal) window.closeModal();
            });
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && connectModal && connectModal.classList.contains('open')) {
                window.closeModal();
            }
        });

        // Modal topic chips switcher
        modalChips.forEach(chip => {
            chip.addEventListener('click', function() {
                modalChips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                const targetSubject = this.getAttribute('data-subject');
                const targetMsg = this.getAttribute('data-msg');

                if (modalSubject && targetSubject) modalSubject.value = targetSubject;
                if (modalMessage && targetMsg) modalMessage.value = targetMsg;
            });
        });

        // Modal Form AJAX Submission
        if (modalForm) {
            modalForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                modalAlert.style.display = 'none';
                modalAlert.className = 'form-status-alert';
                modalAlert.innerHTML = '';

                const originalBtnText = modalSubmitBtn.innerHTML;
                modalSubmitBtn.disabled = true;
                modalSubmitBtn.innerHTML = '<span>⏳ Shooting email &amp; official CV...</span>';

                const formData = new FormData(modalForm);

                try {
                    const res = await fetch(modalForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {
                        modalAlert.className = 'form-status-alert success';
                        modalAlert.innerHTML = `<strong>🎉 Message Sent!</strong> ${data.message}`;
                        modalAlert.style.display = 'block';
                        modalForm.reset();

                        setTimeout(() => {
                            window.closeModal();
                        }, 2500);
                    } else {
                        const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('<br>') : 'Something went wrong. Please check your inputs.');
                        modalAlert.className = 'form-status-alert error';
                        modalAlert.innerHTML = `<strong>⚠️ Submission Failed:</strong> ${errorMsg}`;
                        modalAlert.style.display = 'block';
                    }
                } catch (err) {
                    modalAlert.className = 'form-status-alert error';
                    modalAlert.innerHTML = '<strong>⚠️ Network or Server Error.</strong> Please try again or email directly at <a href="mailto:maayankmalhotra095@gmail.com" style="color:#FFF;text-decoration:underline;">maayankmalhotra095@gmail.com</a>.';
                    modalAlert.style.display = 'block';
                } finally {
                    modalSubmitBtn.disabled = false;
                    modalSubmitBtn.innerHTML = originalBtnText;
                }
            });
        }

        // =========================================================================
        // AI Career Assistant (Google Gemini 3.6 Flash)
        // =========================================================================
        const aiLauncherBtn = document.getElementById('ai-launcher-btn');
        const aiChatCard = document.getElementById('ai-chat-card');
        const aiChatCloseBtn = document.getElementById('ai-chat-close-btn');
        const aiChatForm = document.getElementById('ai-chat-form');
        const aiChatInput = document.getElementById('ai-chat-input');
        const aiChatSendBtn = document.getElementById('ai-chat-send-btn');
        const aiChatMessages = document.getElementById('ai-chat-messages');
        const aiChatChips = document.getElementById('ai-chat-chips');
        const heroOpenAiChat = document.getElementById('hero-open-ai-chat');

        let chatHistory = [];
        let isAiResponding = false;

        window.openAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            const card = document.getElementById('ai-chat-card');
            if (!card) return;
            card.classList.add('open');
            setTimeout(() => {
                const input = document.getElementById('ai-chat-input');
                if (input) input.focus();
            }, 120);
        };

        window.closeAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            const card = document.getElementById('ai-chat-card');
            if (!card) return;
            card.classList.remove('open');
        };

        window.toggleAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            const card = document.getElementById('ai-chat-card');
            if (!card) return;
            if (card.classList.contains('open')) {
                window.closeAiChat(e);
            } else {
                window.openAiChat(e);
            }
        };

        if (aiLauncherBtn) {
            aiLauncherBtn.onclick = function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.toggleAiChat(e);
            };
        }

        if (aiChatCloseBtn) {
            aiChatCloseBtn.onclick = function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.closeAiChat(e);
            };
        }

        if (heroOpenAiChat) {
            heroOpenAiChat.onclick = function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.openAiChat(e);
            };
        }

        if (aiChatCard) {
            aiChatCard.onclick = function(e) {
                e.stopPropagation();
            };
        }

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const card = document.getElementById('ai-chat-card');
                if (card && card.classList.contains('open')) {
                    window.closeAiChat();
                }
            }
        });

        // Close when clicking outside card and buttons
        document.addEventListener('click', (e) => {
            const card = document.getElementById('ai-chat-card');
            const launcher = document.getElementById('ai-launcher-btn');
            const heroBtn = document.getElementById('hero-open-ai-chat');
            if (card && card.classList.contains('open')) {
                if (card.contains(e.target) || (launcher && launcher.contains(e.target)) || (heroBtn && heroBtn.contains(e.target))) {
                    return;
                }
                window.closeAiChat();
            }
        });

        function scrollToBottom() {
            if (aiChatMessages) {
                aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
            }
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        function formatAiReply(text) {
            if (!text) return '';
            let cleaned = text.replace(/^(?:Refinement|Draft|Thinking Process)[^\n]*:\s*\*?\s*\n*/gi, '');
            let formatted = escapeHtml(cleaned);
            formatted = formatted.replace(/(?:^|\n)#{1,3}\s+(.*?)(?=\n|$)/g, '<div style="font-weight:700; font-size:0.92rem; margin:8px 0 4px 0; color:#38BDF8;">$1</div>');
            formatted = formatted.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            formatted = formatted.replace(/(?:^|\n)[\*\-]\s+(.*?)(?=\n|$)/g, '<div style="margin: 4px 0 4px 8px; display:flex; gap:8px; align-items:flex-start;"><span style="color:#38BDF8; font-weight:bold; line-height:1.4;">•</span><span style="flex:1;">$1</span></div>');
            formatted = formatted.replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer" style="color:#38BDF8; text-decoration:underline;">$1</a>');
            formatted = formatted.replace(/\n\n/g, '<br><br>');
            formatted = formatted.replace(/\n/g, '<br>');
            return formatted;
        }

        function appendMessage(role, text) {
            const row = document.createElement('div');
            row.className = `ai-message-row ${role}`;

            const avatar = document.createElement('div');
            avatar.className = 'ai-message-avatar';
            avatar.innerHTML = role === 'user' ? '👤' : '✨';

            const bubble = document.createElement('div');
            bubble.className = 'ai-message-bubble';
            if (role === 'user') {
                bubble.textContent = text;
            } else {
                bubble.innerHTML = formatAiReply(text);
            }

            row.appendChild(avatar);
            row.appendChild(bubble);
            aiChatMessages.appendChild(row);
            scrollToBottom();
        }

        function showTypingIndicator() {
            const row = document.createElement('div');
            row.className = 'ai-message-row assistant';
            row.id = 'ai-typing-row';

            const avatar = document.createElement('div');
            avatar.className = 'ai-message-avatar';
            avatar.innerHTML = '✨';

            const bubble = document.createElement('div');
            bubble.className = 'ai-message-bubble';
            bubble.innerHTML = `
                <div class="ai-typing-indicator">
                    <div class="ai-typing-dot"></div>
                    <div class="ai-typing-dot"></div>
                    <div class="ai-typing-dot"></div>
                </div>
            `;

            row.appendChild(avatar);
            row.appendChild(bubble);
            aiChatMessages.appendChild(row);
            scrollToBottom();
        }

        function removeTypingIndicator() {
            const indicator = document.getElementById('ai-typing-row');
            if (indicator) {
                indicator.remove();
            }
        }

        async function submitUserMessage(userText) {
            if (!userText || isAiResponding) return;

            appendMessage('user', userText);
            chatHistory.push({ role: 'user', content: userText });

            isAiResponding = true;
            if (aiChatSendBtn) aiChatSendBtn.disabled = true;
            if (aiChatInput) aiChatInput.value = '';
            showTypingIndicator();

            try {
                const res = await fetch('{{ route('portfolio.ai-chat') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        message: userText,
                        history: chatHistory.slice(-6)
                    })
                });

                const data = await res.json();
                removeTypingIndicator();

                if (res.ok && data.success && data.reply) {
                    appendMessage('assistant', data.reply);
                    chatHistory.push({ role: 'assistant', content: data.reply });
                } else {
                    const errorMsg = data.message || "I apologize, but I couldn't process that request right now. Feel free to download Maayank's official CV or reach out to him directly at maayankmalhotra095@gmail.com!";
                    appendMessage('assistant', errorMsg);
                }
            } catch (err) {
                removeTypingIndicator();
                appendMessage('assistant', "Network connection interrupted. You can always view Maayank's verified projects above or email him directly at maayankmalhotra095@gmail.com!");
            } finally {
                isAiResponding = false;
                if (aiChatSendBtn) aiChatSendBtn.disabled = false;
                if (aiChatInput) aiChatInput.focus();
            }
        }

        if (aiChatForm) {
            aiChatForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const text = aiChatInput ? aiChatInput.value.trim() : '';
                if (text) {
                    submitUserMessage(text);
                }
            });
        }

        if (aiChatChips) {
            aiChatChips.addEventListener('click', (e) => {
                const chip = e.target.closest('.ai-chip');
                if (!chip) return;
                const prompt = chip.getAttribute('data-prompt');
                if (prompt) {
                    submitUserMessage(prompt);
                }
            });
        }
    </script>
</body>
</html>
