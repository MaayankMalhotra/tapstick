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

    <!-- Open Graph / Social Cards -->
    <meta property="og:site_name" content="Tabstick">
    <meta property="og:type" content="profile">
    <meta property="og:title" content="Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer &amp; Founder">
    <meta property="og:description" content="Official portfolio and resume of Maayank Malhotra, Full Stack Engineer and Founder of Tabstick. 4+ years scaling APIs, Node.js, Laravel, React, and AWS cloud systems.">
    <meta property="og:url" content="https://tabstick.in/maayank">
    <meta property="og:image" content="{{ asset('images/developer-avatar.jpg') }}">
    <meta property="profile:first_name" content="Maayank">
    <meta property="profile:last_name" content="Malhotra">
    <meta property="profile:username" content="MaayankMalhotra">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Maayank Malhotra (Mayank Malhotra) – Full Stack Software Engineer &amp; Founder">
    <meta name="twitter:description" content="Official portfolio of Maayank Malhotra, Founder @ Tabstick &amp; Full Stack Engineer with 4+ years experience in distributed systems.">
    <meta name="twitter:image" content="{{ asset('images/developer-avatar.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Obsidian Violet Luxury Engineering Aesthetic -->
    <style>
        :root {
            --bg-base: #0B0813;
            --bg-deep: #07050D;
            --bg-surface: rgba(19, 13, 31, 0.75);
            --bg-card: rgba(23, 16, 38, 0.65);
            --bg-card-hover: rgba(33, 22, 54, 0.85);

            --accent-purple: #9D4EDD;
            --accent-violet: #A855F7;
            --accent-glow: #C084FC;
            --accent-bright: #E0AAFF;
            --accent-cyan: #38BDF8;
            --accent-emerald: #10B981;

            --border-subtle: rgba(168, 85, 247, 0.16);
            --border-highlight: rgba(192, 132, 252, 0.35);
            --border-card: rgba(168, 85, 247, 0.22);

            --text-primary: #FFFFFF;
            --text-secondary: #CBD5E1;
            --text-muted: #8E8A9E;

            --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;

            --radius-xs: 8px;
            --radius-sm: 12px;
            --radius-md: 18px;
            --radius-lg: 26px;
            --radius-full: 9999px;

            --glow-card: 0 10px 30px -10px rgba(124, 58, 237, 0.25);
            --glow-purple-lg: 0 0 60px rgba(168, 85, 247, 0.35);
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

        /* Ambient Aurora Mesh */
        .ambient-mesh {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .orb-1 {
            position: absolute;
            top: -15%;
            left: 15%;
            width: 750px;
            height: 750px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.18) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(120px);
            animation: orbDrift 24s ease-in-out infinite alternate;
        }

        .orb-2 {
            position: absolute;
            top: 40%;
            right: -10%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.16) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(130px);
            animation: orbDrift 28s ease-in-out infinite alternate-reverse;
        }

        .orb-3 {
            position: absolute;
            bottom: 5%;
            left: -5%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(217, 70, 239, 0.12) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(110px);
            animation: orbDrift 26s ease-in-out infinite alternate;
        }

        @keyframes orbDrift {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(40px, -30px) scale(1.06); }
            100% { transform: translate(-30px, 40px) scale(0.96); }
        }

        .grid-blueprint-overlay {
            position: fixed;
            inset: 0;
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0),
                linear-gradient(to right, rgba(168, 85, 247, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(168, 85, 247, 0.03) 1px, transparent 1px);
            background-size: 40px 40px, 80px 80px, 80px 80px;
            pointer-events: none;
            z-index: 0;
            opacity: 0.65;
        }

        .container {
            width: 100%;
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 28px;
            position: relative;
            z-index: 1;
        }

        /* Navigation Bar */
        .site-nav {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(11, 8, 19, 0.78);
            border-bottom: 1px solid var(--border-subtle);
            padding: 16px 0;
            transition: all 0.3s ease;
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand-monogram-box {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #FFFFFF;
        }

        .brand-logo-mark {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, #7C3AED 0%, #C084FC 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-mono);
            font-weight: 900;
            font-size: 1.15rem;
            color: #FFFFFF;
            box-shadow: 0 4px 18px rgba(124, 58, 237, 0.45);
        }

        .brand-text-col {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #FFFFFF;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .brand-sub {
            font-size: 0.74rem;
            font-weight: 600;
            color: var(--accent-bright);
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .nav-menu-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-menu-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-menu-links a:hover {
            color: #FFFFFF;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-nav-resume {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: #FFFFFF;
            padding: 9px 18px;
            border-radius: var(--radius-full);
            font-size: 0.86rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-nav-resume:hover {
            background: rgba(168, 85, 247, 0.15);
            border-color: var(--accent-violet);
        }

        .btn-nav-connect {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 9px 20px;
            border-radius: var(--radius-full);
            font-size: 0.86rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.4);
            transition: all 0.2s ease;
        }

        .btn-nav-connect:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }

        /* Hero Section */
        .hero-section {
            padding: 60px 0 80px;
            position: relative;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.95fr;
            gap: 50px;
            align-items: center;
        }

        .hero-left-col {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .hero-avatar-identity-row {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .avatar-portal-wrap {
            position: relative;
            flex-shrink: 0;
        }

        .avatar-glow-ring {
            position: absolute;
            inset: -8px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.55) 0%, rgba(124, 58, 237, 0.15) 60%, transparent 80%);
            border-radius: 50%;
            filter: blur(14px);
            animation: avatarPulse 4s infinite alternate ease-in-out;
        }

        @keyframes avatarPulse {
            0% { transform: scale(0.96); opacity: 0.75; }
            100% { transform: scale(1.08); opacity: 1; }
        }

        .avatar-img-frame {
            position: relative;
            z-index: 2;
            width: 104px;
            height: 104px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(192, 132, 252, 0.45);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            background: #1C122D;
        }

        .avatar-img-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .avatar-beacon-pulse {
            position: absolute;
            bottom: 4px;
            right: 4px;
            z-index: 3;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #10B981;
            border: 2.5px solid #0B0813;
            box-shadow: 0 0 10px #10B981;
        }

        .identity-badge-col {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .availability-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34D399;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            width: fit-content;
        }

        .beacon-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #10B981;
            box-shadow: 0 0 8px #10B981;
            animation: beaconGlow 1.8s infinite;
        }

        @keyframes beaconGlow {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.8); }
        }

        .hero-lead-greeting {
            font-size: 0.96rem;
            color: var(--text-secondary);
        }

        .hero-lead-greeting strong {
            color: #FFFFFF;
        }

        .hero-editorial-hook {
            font-size: clamp(1.8rem, 3.4vw, 2.5rem);
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: -0.025em;
            color: #FFFFFF;
        }

        .editorial-highlight {
            position: relative;
            display: inline-block;
            color: var(--accent-bright);
            white-space: nowrap;
        }

        .hand-drawn-svg {
            position: absolute;
            top: -12%;
            left: -8%;
            width: 116%;
            height: 124%;
            pointer-events: none;
            overflow: visible;
        }

        .hero-main-title {
            font-size: clamp(1.4rem, 2.4vw, 1.8rem);
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: -0.015em;
        }

        .cursor-accent {
            color: var(--accent-violet);
            animation: cursorBlink 1s step-end infinite;
        }

        @keyframes cursorBlink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }

        .hero-role-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            font-size: 0.88rem;
            color: var(--text-secondary);
        }

        .role-badge {
            background: rgba(168, 85, 247, 0.12);
            border: 1px solid rgba(168, 85, 247, 0.3);
            color: #FFFFFF;
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: var(--radius-xs);
            letter-spacing: 0.02em;
        }

        .location-badge {
            color: var(--accent-bright);
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 600;
        }

        .hero-narrative-bio {
            font-size: 1.02rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .hero-narrative-bio strong {
            color: #FFFFFF;
        }

        .metrics-bento-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            background: rgba(22, 14, 38, 0.6);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 18px 20px;
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        .metric-bento-item {
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(168, 85, 247, 0.15);
            padding-right: 12px;
        }

        .metric-bento-item:last-child {
            border-right: none;
            padding-right: 0;
        }

        .metric-bento-val {
            font-family: var(--font-mono);
            font-size: 1.65rem;
            font-weight: 800;
            color: #FFFFFF;
            background: linear-gradient(135deg, #FFFFFF 30%, var(--accent-bright) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.15;
            margin-bottom: 4px;
        }

        .metric-bento-lbl {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            line-height: 1.3;
        }

        .hero-actions-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary-purple {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 12px 24px;
            border-radius: var(--radius-full);
            font-size: 0.92rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.45);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-primary-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 26px rgba(168, 85, 247, 0.65);
            filter: brightness(1.1);
        }

        .btn-frosted-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
            color: #FFFFFF;
            padding: 12px 20px;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-frosted-action:hover {
            background: rgba(168, 85, 247, 0.16);
            border-color: var(--accent-violet);
            transform: translateY(-2px);
        }

        /* Right Hero: Tech Matrix & Terminal */
        .hero-right-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cross-functional-quote-card {
            background: rgba(22, 14, 38, 0.6);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.55;
            backdrop-filter: blur(12px);
        }

        .cross-functional-quote-card strong {
            color: var(--accent-bright);
        }

        .tech-matrix-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .tech-capsule {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(26, 17, 44, 0.7);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: var(--radius-sm);
            padding: 10px 12px;
            transition: all 0.2s ease;
            cursor: default;
        }

        .tech-capsule:hover {
            background: rgba(38, 24, 66, 0.9);
            border-color: var(--accent-glow);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
        }

        .tech-svg-box {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .tech-name {
            font-size: 0.8rem;
            font-weight: 700;
            color: #FFFFFF;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .terminal-dev-card {
            background: rgba(14, 9, 24, 0.92);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7), 0 0 35px rgba(124, 58, 237, 0.15);
            overflow: hidden;
            font-family: var(--font-mono);
        }

        .terminal-top-bar {
            background: rgba(22, 14, 38, 0.95);
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(168, 85, 247, 0.18);
        }

        .window-control-dots {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .w-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .w-dot.red { background: #EF4444; }
        .w-dot.yellow { background: #F59E0B; }
        .w-dot.green { background: #10B981; }

        .terminal-tab-pill {
            font-size: 0.76rem;
            font-weight: 600;
            color: var(--accent-bright);
            background: rgba(168, 85, 247, 0.18);
            border: 1px solid rgba(168, 85, 247, 0.3);
            padding: 3px 10px;
            border-radius: var(--radius-xs);
        }

        .terminal-copy-action {
            display: flex;
            align-items: center;
            gap: 4px;
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 0.74rem;
            font-family: var(--font-mono);
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .terminal-copy-action:hover {
            color: #FFFFFF;
        }

        .terminal-code-body {
            padding: 16px 20px;
            font-size: 0.82rem;
            line-height: 1.6;
            color: #E2E8F0;
            overflow-x: auto;
        }

        .code-keyword { color: #F472B6; font-weight: 600; }
        .code-variable { color: #60A5FA; }
        .code-property { color: #A78BFA; }
        .code-string { color: #34D399; }
        .code-number { color: #FBBF24; }
        .code-comment { color: #64748B; font-style: italic; }

        /* Sections */
        .section-wrap {
            padding: 70px 0;
            position: relative;
        }

        .section-header-block {
            margin-bottom: 40px;
        }

        .section-eyebrow {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--accent-bright);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
            display: block;
        }

        .section-heading-large {
            font-size: clamp(1.8rem, 3.2vw, 2.4rem);
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.02em;
        }

        /* Work Experience 2x2 */
        .experience-2x2-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .experience-card-item {
            background: rgba(22, 14, 38, 0.65);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-lg);
            padding: 28px;
            backdrop-filter: blur(14px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 20px;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .experience-card-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-violet), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .experience-card-item:hover {
            transform: translateY(-4px);
            border-color: rgba(192, 132, 252, 0.45);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.6), var(--glow-card);
            background: rgba(30, 20, 52, 0.8);
        }

        .experience-card-item:hover::before {
            opacity: 1;
        }

        .exp-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        .exp-badge-icon-box {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: rgba(168, 85, 247, 0.15);
            border: 1px solid rgba(168, 85, 247, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 18px rgba(124, 58, 237, 0.25);
        }

        .exp-card-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.01em;
            margin-bottom: 4px;
        }

        .exp-card-org {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--accent-bright);
            margin-bottom: 12px;
        }

        .exp-card-desc {
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .exp-card-desc strong {
            color: #FFFFFF;
        }

        .exp-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid rgba(168, 85, 247, 0.15);
        }

        .exp-tenure-tag {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .btn-learn-more-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(168, 85, 247, 0.18);
            border: 1px solid rgba(168, 85, 247, 0.35);
            color: #FFFFFF;
            padding: 7px 18px;
            border-radius: var(--radius-full);
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.04em;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-learn-more-pill:hover {
            background: var(--accent-violet);
            border-color: var(--accent-violet);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        /* Featured Projects */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
        }

        .project-glass-card {
            background: rgba(22, 14, 38, 0.65);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-lg);
            padding: 26px;
            backdrop-filter: blur(14px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 18px;
            transition: all 0.25s ease;
        }

        .project-glass-card:hover {
            transform: translateY(-4px);
            border-color: rgba(192, 132, 252, 0.4);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.6), var(--glow-card);
        }

        .project-wireframe-preview {
            background: rgba(13, 9, 22, 0.9);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: var(--radius-md);
            padding: 16px;
            font-family: var(--font-mono);
            font-size: 0.78rem;
        }

        .wireframe-head-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(168, 85, 247, 0.15);
            margin-bottom: 12px;
        }

        .wireframe-status-dot {
            color: #10B981;
            font-weight: 700;
        }

        .wireframe-schematic-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .schematic-box {
            background: rgba(168, 85, 247, 0.08);
            border: 1px dashed rgba(168, 85, 247, 0.25);
            border-radius: var(--radius-xs);
            padding: 8px;
            color: var(--text-muted);
            text-align: center;
        }

        .project-tag {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            color: var(--accent-bright);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.01em;
            margin: 4px 0 8px;
        }

        .project-summary {
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .project-tech-pills {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pill-badge {
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.2);
            color: #FFFFFF;
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: var(--radius-full);
        }

        .project-actions-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 14px;
            border-top: 1px solid rgba(168, 85, 247, 0.15);
        }

        .btn-live-preview {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            padding: 8px 18px;
            border-radius: var(--radius-full);
            font-size: 0.84rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-live-preview:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }

        .btn-code-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
            color: var(--text-secondary);
            padding: 8px 16px;
            border-radius: var(--radius-full);
            font-size: 0.84rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-code-link:hover {
            color: #FFFFFF;
            background: rgba(168, 85, 247, 0.15);
        }

        /* Core Technical Skills */
        .skills-bento-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .skill-tile {
            background: rgba(22, 14, 38, 0.6);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 22px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            backdrop-filter: blur(12px);
            transition: all 0.2s ease;
        }

        .skill-tile:hover {
            transform: translateY(-3px);
            border-color: var(--accent-violet);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            background: rgba(30, 20, 52, 0.75);
        }

        .skill-svg-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-sm);
            background: rgba(168, 85, 247, 0.12);
            border: 1px solid rgba(168, 85, 247, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .skill-info-col {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .skill-name {
            font-size: 1.05rem;
            font-weight: 800;
            color: #FFFFFF;
        }

        .skill-desc {
            font-size: 0.84rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        /* Credentials Section */
        .credentials-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .credential-card {
            background: rgba(22, 14, 38, 0.6);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 26px;
            backdrop-filter: blur(12px);
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .credential-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .credential-badge {
            font-family: var(--font-mono);
            font-size: 0.75rem;
            background: rgba(168, 85, 247, 0.15);
            color: var(--accent-bright);
            padding: 4px 10px;
            border-radius: var(--radius-xs);
            font-weight: 700;
        }

        .credential-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #FFFFFF;
        }

        .credential-sub {
            font-size: 0.94rem;
            color: var(--text-secondary);
        }

        /* Contact Section */
        .contact-layout-grid {
            display: grid;
            grid-template-columns: 1fr 1.35fr;
            gap: 40px;
            background: rgba(22, 14, 38, 0.65);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-lg);
            padding: 44px;
            backdrop-filter: blur(16px);
        }

        .contact-sidebar {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .direct-reach-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .reach-icon-box {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-sm);
            background: rgba(168, 85, 247, 0.15);
            border: 1px solid rgba(168, 85, 247, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-bright);
            flex-shrink: 0;
        }

        .reach-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .reach-val {
            font-size: 0.95rem;
            font-weight: 700;
            color: #FFFFFF;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .reach-val:hover {
            color: var(--accent-bright);
        }

        .contact-form-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-field-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            background: rgba(14, 9, 24, 0.85);
            border: 1px solid rgba(168, 85, 247, 0.25);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            color: #FFFFFF;
            font-family: var(--font-sans);
            font-size: 0.92rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--accent-glow);
            box-shadow: 0 0 16px rgba(168, 85, 247, 0.35);
        }

        .topic-chips-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 6px;
        }

        .chip-button {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .chip-button.active, .chip-button:hover {
            background: rgba(168, 85, 247, 0.2);
            border-color: var(--accent-violet);
            color: #FFFFFF;
        }

        .btn-submit-main {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 14px 28px;
            border-radius: var(--radius-full);
            font-size: 0.96rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 24px rgba(124, 58, 237, 0.45);
            transition: all 0.2s ease;
        }

        .btn-submit-main:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }

        .form-status-alert {
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            display: none;
        }

        .form-status-alert.success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.4);
            color: #34D399;
        }

        .form-status-alert.error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #F87171;
        }

        /* Footer */
        .site-footer {
            border-top: 1px solid var(--border-subtle);
            padding: 40px 0;
            margin-top: 80px;
            background: rgba(7, 5, 13, 0.9);
            font-size: 0.86rem;
            color: var(--text-muted);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-glass-card {
            background: rgba(22, 14, 38, 0.95);
            border: 1px solid rgba(192, 132, 252, 0.35);
            border-radius: var(--radius-lg);
            width: 100%;
            max-width: 560px;
            padding: 36px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), var(--glow-purple-lg);
            position: relative;
            transform: translateY(20px) scale(0.97);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .modal-overlay.open .modal-glass-card {
            transform: translateY(0) scale(1);
        }

        .modal-close-icon {
            position: absolute;
            top: 20px;
            right: 20px;
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
            transition: all 0.2s ease;
        }

        .modal-close-icon:hover {
            color: #FFFFFF;
            background: rgba(239, 68, 68, 0.2);
            border-color: #EF4444;
        }

        .modal-header-meta {
            margin-bottom: 22px;
        }

        .modal-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: -0.01em;
            margin-bottom: 4px;
        }

        .modal-subtitle {
            font-size: 0.86rem;
            color: var(--accent-bright);
            font-weight: 600;
        }

        /* Floating AI Career Assistant */
        .ai-floating-launcher {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999;
            display: flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 11px 20px;
            border-radius: var(--radius-full);
            font-size: 0.88rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 28px rgba(124, 58, 237, 0.6);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .ai-floating-launcher:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 36px rgba(168, 85, 247, 0.8);
        }

        .ai-chat-window {
            position: fixed;
            bottom: 84px;
            right: 24px;
            width: 380px;
            max-width: calc(100vw - 48px);
            height: 520px;
            background: rgba(18, 12, 32, 0.96);
            border: 1px solid rgba(192, 132, 252, 0.35);
            border-radius: var(--radius-lg);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.8), var(--glow-purple-lg);
            backdrop-filter: blur(20px);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            opacity: 0;
            pointer-events: none;
            transform: translateY(20px) scale(0.95);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .ai-chat-window.open {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }

        .ai-chat-header {
            padding: 14px 18px;
            background: rgba(24, 16, 42, 0.95);
            border-bottom: 1px solid rgba(168, 85, 247, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .ai-brand-badge {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ai-model-tag {
            font-family: var(--font-mono);
            font-size: 0.68rem;
            background: rgba(168, 85, 247, 0.25);
            color: var(--accent-bright);
            padding: 2px 6px;
            border-radius: var(--radius-xs);
            font-weight: 700;
        }

        .ai-chat-messages-box {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-size: 0.88rem;
        }

        .ai-msg {
            max-width: 85%;
            padding: 10px 14px;
            border-radius: var(--radius-md);
            line-height: 1.5;
        }

        .ai-msg.bot {
            align-self: flex-start;
            background: rgba(30, 20, 52, 0.85);
            border: 1px solid rgba(168, 85, 247, 0.25);
            color: #FFFFFF;
        }

        .ai-msg.user {
            align-self: flex-end;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
        }

        .ai-chat-footer {
            padding: 12px 16px;
            background: rgba(22, 14, 38, 0.95);
            border-top: 1px solid rgba(168, 85, 247, 0.2);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .ai-chat-form-row {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ai-input-field {
            flex: 1;
            background: rgba(14, 9, 24, 0.9);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: var(--radius-full);
            padding: 8px 14px;
            color: #FFFFFF;
            font-size: 0.86rem;
            font-family: var(--font-sans);
        }

        .ai-input-field:focus {
            outline: none;
            border-color: var(--accent-glow);
        }

        .ai-btn-send {
            background: var(--accent-violet);
            border: none;
            color: #FFFFFF;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .ai-btn-send:hover {
            filter: brightness(1.15);
        }

        .ai-powered-by-note {
            font-size: 0.68rem;
            color: var(--text-muted);
            text-align: center;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .experience-2x2-grid,
            .projects-grid,
            .skills-bento-grid,
            .credentials-row {
                grid-template-columns: 1fr;
            }
            .contact-layout-grid {
                grid-template-columns: 1fr;
                padding: 28px;
            }
        }

        @media (max-width: 640px) {
            .metrics-bento-strip {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }
            .tech-matrix-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .form-row-2col {
                grid-template-columns: 1fr;
            }
            .nav-menu-links {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Ambient Luminous Mesh -->
    <div class="ambient-mesh" aria-hidden="true">
        <div class="orb-1"></div>
        <div class="orb-2"></div>
        <div class="orb-3"></div>
    </div>
    <div class="grid-blueprint-overlay" aria-hidden="true"></div>

    <!-- Navigation Bar -->
    <header class="site-nav">
        <div class="container nav-inner">
            <a href="{{ url('/maayank') }}" class="brand-monogram-box">
                <div class="brand-logo-mark">M</div>
                <div class="brand-text-col">
                    <span class="brand-name">Maayank Malhotra</span>
                    <span class="brand-sub">Founder @ Tabstick</span>
                </div>
            </a>

            <nav>
                <ul class="nav-menu-links">
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#experience">Experience</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#credentials">Credentials</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <div class="nav-actions">
                <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-nav-resume" title="Download Official CV">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    <span>Download CV (PDF)</span>
                </a>
                <button type="button" class="btn-nav-connect" onclick="window.openModal()">
                    <span>Connect</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="hero">
            <div class="container">
                <div class="hero-grid">
                    <!-- Left Hero: 3D Avatar, Editorial Hook & Bio -->
                    <div class="hero-left-col">
                        <!-- Avatar & Status Row -->
                        <div class="hero-avatar-identity-row">
                            <div class="avatar-portal-wrap">
                                <div class="avatar-glow-ring"></div>
                                <div class="avatar-img-frame">
                                    <img src="{{ asset('images/developer-avatar.jpg') }}" alt="Maayank Malhotra – Full Stack Software Engineer" width="104" height="104" loading="eager">
                                </div>
                                <div class="avatar-beacon-pulse" title="Available for high-impact roles"></div>
                            </div>
                            <div class="identity-badge-col">
                                <div class="availability-pill">
                                    <span class="beacon-dot"></span>
                                    <span>Available for High-Impact Roles</span>
                                </div>
                                <div class="hero-lead-greeting">
                                    Hello! I am <strong>Maayank Malhotra</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Editorial Hook -->
                        <h2 class="hero-editorial-hook">
                            A Systems Engineer &amp; Designer who judges software by its
                            <span class="editorial-highlight">
                                precision
                                <svg class="hand-drawn-svg" viewBox="0 0 220 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 35 C 25 12, 195 10, 205 32 C 215 52, 160 65, 95 62 C 30 60, 8 48, 14 32 C 20 18, 90 14, 180 20" stroke="url(#heroPurpleGradient)" stroke-width="3.2" stroke-linecap="round"/>
                                    <defs>
                                        <linearGradient id="heroPurpleGradient" x1="0" y1="0" x2="220" y2="70" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#C084FC"/>
                                            <stop offset="1" stop-color="#7C3AED"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>.
                        </h2>

                        <!-- Headline -->
                        <h1 class="hero-main-title">
                            Full Stack Software Engineer &amp; Founder<span class="cursor-accent">.</span>
                        </h1>

                        <!-- Role & Location Meta (Mandatory Test Assertion Strings) -->
                        <div class="hero-role-meta">
                            <span class="role-badge">FULL STACK SOFTWARE ENGINEER • FOUNDER @ TABSTICK</span>
                            <span class="location-badge">📍 DELHI NCR, INDIA</span>
                        </div>

                        <!-- Narrative Bio -->
                        <p class="hero-narrative-bio">
                            A full-stack software engineer &amp; distributed systems architect (also known as <strong>Mayank Malhotra</strong>) functioning in the industry for <strong>4+ years</strong> now. I make meaningful and high-throughput digital products handling <strong>1.5M+ monthly transactions</strong> that create an equilibrium between user needs and business goals.
                        </p>

                        <!-- Key Performance Metrics Bento Strip (Mandatory Test Assertion Strings) -->
                        <div class="metrics-bento-strip">
                            <div class="metric-bento-item">
                                <span class="metric-bento-val">4+</span>
                                <span class="metric-bento-lbl">Years Full-Stack Experience</span>
                            </div>
                            <div class="metric-bento-item">
                                <span class="metric-bento-val">1.5M+</span>
                                <span class="metric-bento-lbl">Monthly Transactions Handled</span>
                            </div>
                            <div class="metric-bento-item">
                                <span class="metric-bento-val">1M+</span>
                                <span class="metric-bento-lbl">Monthly API Calls</span>
                            </div>
                            <div class="metric-bento-item">
                                <span class="metric-bento-val">20%</span>
                                <span class="metric-bento-lbl">Latency Reduction</span>
                            </div>
                        </div>

                        <!-- Actions Group -->
                        <div class="hero-actions-group">
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-primary-purple" title="Download Official CV (PDF)">
                                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                <span>Download Official CV</span>
                            </a>
                            <button type="button" id="hero-open-ai-chat" class="btn-frosted-action" title="Chat with Maayank's AI Career Assistant (Google Gemini 3.6 Flash)">
                                <svg width="16" height="16" fill="none" stroke="#C084FC" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span>Ask My AI (Gemini 3.6)</span>
                            </button>
                            <button type="button" class="btn-frosted-action" onclick="window.openModal()">
                                <span>Get in Touch</span>
                            </button>
                            <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-frosted-action" title="GitHub Profile">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                <span>GitHub</span>
                            </a>
                            <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="btn-frosted-action" title="LinkedIn Profile">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                <span>LinkedIn</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Hero: Interactive Engineering Terminal & Tech Matrix -->
                    <div class="hero-right-col">
                        <!-- Cross-functional Quote Box -->
                        <div class="cross-functional-quote-card">
                            I'm currently looking to join a <strong>cross-functional team</strong> that values improving people's lives through accessible engineering, scalable architecture, and thoughtful craft.
                        </div>

                        <!-- Tech Ecosystem Matrix (Real Brand SVGs, Zero Emojis) -->
                        <div class="tech-matrix-grid">
                            <div class="tech-capsule" title="Node.js &amp; Express.js">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 256 289" width="20" height="20"><path fill="#5FA04E" d="M128 0L256 73.9v147.8L128 295.6 0 221.7V73.9L128 0z"/><path fill="#FFF" d="M128 25.5l105.8 61v122.2L128 269.8 22.2 208.7V86.5L128 25.5z"/><path fill="#5FA04E" d="M128 35.8l96.9 55.9v111.9L128 259.5 31.1 203.6V91.7L128 35.8z"/></svg>
                                </div>
                                <span class="tech-name">Node.js</span>
                            </div>

                            <div class="tech-capsule" title="PHP &amp; Laravel">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 100 100" width="20" height="20"><path fill="#FF2D20" d="M50 5 L90 28 L90 72 L50 95 L10 72 L10 28 Z" fill-opacity="0.2" stroke="#FF2D20" stroke-width="4"/><path fill="#FF2D20" d="M50 18 L80 35 L80 65 L50 82 L20 65 L20 35 Z"/></svg>
                                </div>
                                <span class="tech-name">Laravel</span>
                            </div>

                            <div class="tech-capsule" title="React.js &amp; Redux">
                                <div class="tech-svg-box">
                                    <svg viewBox="-11.5 -10.23174 23 20.46348" width="20" height="20"><circle cx="0" cy="0" r="2.05" fill="#61DAFB"/><g stroke="#61DAFB" stroke-width="1" fill="none"><ellipse rx="11" ry="4.2"/><ellipse rx="11" ry="4.2" transform="rotate(60)"/><ellipse rx="11" ry="4.2" transform="rotate(120)"/></g></svg>
                                </div>
                                <span class="tech-name">React.js</span>
                            </div>

                            <div class="tech-capsule" title="TypeScript">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 24 24" width="20" height="20"><rect width="24" height="24" rx="4" fill="#3178C6"/><path d="M4 11h6v2H7.5v7h-2.5v-7H4v-2zm13.5 3c-.5-.6-1.3-.9-2.3-.9-1.3 0-2.2.6-2.2 1.8 0 1.3 1.1 1.6 2.3 2 .8.2 1.4.5 1.4 1 0 .6-.6 1-1.5 1-.9 0-1.6-.4-2-1l-1.4 1.4c.8 1.1 2 1.7 3.4 1.7 2.5 0 4-1.3 4-3.1 0-1.4-.9-2.1-2.4-2.5-.9-.3-1.4-.5-1.4-.9 0-.4.4-.7 1.1-.7.6 0 1.2.2 1.6.6l1.3-1.4z" fill="#FFF"/></svg>
                                </div>
                                <span class="tech-name">TypeScript</span>
                            </div>

                            <div class="tech-capsule" title="AWS Cloud">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#FF9900"><path d="M12.002 2c5.523 0 10 4.477 10 10s-4.477 10-10 10-10-4.477-10-10 4.477-10 10-10zm-1.8 14.5c2.8 1.6 5.8.7 7.2-.2.2-.1.3-.4.1-.6-.2-.2-.4-.2-.6-.1-1.2.8-3.8 1.5-6.3.1-.2-.1-.5-.1-.7.1-.2.2-.1.5.3.7zm-2.5-3.3c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2-1.2.5-1.2 1.2.5 1.2 1.2 1.2zm6.6 0c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2-1.2.5-1.2 1.2.5 1.2 1.2 1.2z"/></svg>
                                </div>
                                <span class="tech-name">AWS Cloud</span>
                            </div>

                            <div class="tech-capsule" title="Docker Containers">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#2496ED"><path d="M13.983 11.078h2.119a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.119a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185m-2.954-5.43h2.118a.186.186 0 00.186-.186V3.574a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.186.185.186zm0 2.715h2.118a.187.187 0 00.186-.186V6.29a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.887c0 .102.082.186.185.186zm-2.93 0h2.12a.186.186 0 00.184-.186V6.29a.185.185 0 00-.185-.185H8.1a.185.185 0 00-.185.185v1.887c0 .102.083.186.185.186zm-2.964 0h2.119a.186.186 0 00.185-.186V6.29a.185.185 0 00-.185-.185H5.136a.186.186 0 00-.186.185v1.887c0 .102.084.186.186.186zm5.893 2.715h2.118a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185zm-2.93 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.083.185.185.185zm-2.964 0h2.119a.185.185 0 00.185-.185V9.006a.185.185 0 00-.185-.186h-2.119a.186.186 0 00-.186.185v1.888c0 .102.084.185.186.185zm-2.928 0h2.119a.185.185 0 00.185-.185V9.006a.185.185 0 00-.185-.186H2.208a.186.186 0 00-.186.185v1.888c0 .102.084.185.186.185zM23.95 10.93c-.45-.632-1.378-.857-2.316-.628-.15-.494-.41-.95-.768-1.343l-.403-.43-.46.368c-.76.608-1.24 1.488-1.36 2.457-.61-.17-1.31-.194-2.022.02-.38.113-.74.288-1.066.52H1.034c-.28 0-.54.12-.725.33A.98.98 0 00.08 13.1c.328 1.94 1.34 3.738 2.87 5.105C4.85 19.9 7.37 20.73 10.05 20.73c7.58 0 13.12-4.66 13.9-9.8z"/></svg>
                                </div>
                                <span class="tech-name">Docker</span>
                            </div>

                            <div class="tech-capsule" title="WebRTC Real-Time">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#38BDF8" stroke-width="2"><path d="M12 2a10 10 0 0 0-7.07 17.07l1.42-1.42A8 8 0 1 1 12 20v2a10 10 0 0 0 0-20z"/><path d="M12 6a6 6 0 0 0-4.24 10.24l1.41-1.41A4 4 0 1 1 12 16v2a6 6 0 0 0 0-12z"/><circle cx="12" cy="12" r="2" fill="#38BDF8"/></svg>
                                </div>
                                <span class="tech-name">WebRTC</span>
                            </div>

                            <div class="tech-capsule" title="MongoDB">
                                <div class="tech-svg-box">
                                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#47A248"><path d="M12.186 24c-.382-.04-1.246-.667-1.572-1.042-.924-1.066-1.529-2.073-1.921-3.195-1.464-4.184-.877-8.625 1.583-12.015 1.163-1.603 2.523-2.909 3.916-4.004.095-.075.22-.162.278-.194.057-.031.13.01.163.09.032.081.048.272.036.425-.138 1.777-.668 3.513-1.54 5.048-1.516 2.668-2.008 5.753-1.378 8.653.255 1.173.714 2.295 1.365 3.326.353.56.76 1.077 1.218 1.544.159.162.298.32.308.35.011.03-.133.407-.32.842-.234.544-.45.74-.787.778-.105.012-.262.018-.35.013v-.019z"/></svg>
                                </div>
                                <span class="tech-name">MongoDB</span>
                            </div>
                        </div>

                        <!-- macOS Developer Terminal -->
                        <div class="terminal-dev-card">
                            <div class="terminal-top-bar">
                                <div class="window-control-dots">
                                    <div class="w-dot red"></div>
                                    <div class="w-dot yellow"></div>
                                    <div class="w-dot green"></div>
                                </div>
                                <div class="terminal-tab-pill">maayank.config.ts</div>
                                <button type="button" class="terminal-copy-action" onclick="copyTerminalCode(this)" title="Copy configuration snippet">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span>Copy</span>
                                </button>
                            </div>
                            <div class="terminal-code-body">
<pre><code><span class="code-comment">// Full Stack Engineer &amp; Founder</span>
<span class="code-keyword">export const</span> <span class="code-variable">engineer</span> = {
  <span class="code-property">name</span>: <span class="code-string">"Maayank Malhotra"</span>,
  <span class="code-property">role</span>: <span class="code-string">"Full Stack Software Engineer"</span>,
  <span class="code-property">experienceYears</span>: <span class="code-number">4</span>,
  <span class="code-property">stats</span>: {
    <span class="code-property">monthlyTransactions</span>: <span class="code-string">"1,500,000+"</span>,
    <span class="code-property">monthlyApiCalls</span>: <span class="code-string">"1,000,000+"</span>,
    <span class="code-property">performanceGain</span>: <span class="code-string">"20% optimization"</span>
  },
  <span class="code-property">core</span>: [<span class="code-string">"Node.js"</span>, <span class="code-string">"Laravel"</span>, <span class="code-string">"React"</span>, <span class="code-string">"AWS"</span>],
  <span class="code-property">founder</span>: <span class="code-string">"Tabstick (tabstick.in)"</span>
};</code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Work Experience (Exact 2x2 Glass Cards Layout from Reference, Clean Vector Icons) -->
        <section class="section-wrap" id="experience">
            <div class="container">
                <div class="section-header-block">
                    <span class="section-eyebrow">Career Milestones</span>
                    <h2 class="section-heading-large">Work Experience</h2>
                </div>

                <div class="experience-2x2-grid">
                    <!-- Experience 1: Thinktail Global -->
                    <div class="experience-card-item">
                        <div>
                            <div class="exp-card-header">
                                <div>
                                    <h3 class="exp-card-title">Software Engineer</h3>
                                    <div class="exp-card-org">Thinktail Global Pvt. Ltd.</div>
                                </div>
                                <div class="exp-badge-icon-box" title="Full Stack Engineering">
                                    <svg width="24" height="24" fill="none" stroke="#C084FC" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                            </div>
                            <p class="exp-card-desc">
                                Lead full-stack module architecture with <strong>React.js &amp; Node.js</strong>, driving high-throughput analytics, automation features, structured code reviews, and cross-functional delivery.
                            </p>
                        </div>
                        <div class="exp-card-footer">
                            <span class="exp-tenure-tag">Aug 2025 – Present</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 2: Cracode Consulting -->
                    <div class="experience-card-item">
                        <div>
                            <div class="exp-card-header">
                                <div>
                                    <h3 class="exp-card-title">Software Engineer</h3>
                                    <div class="exp-card-org">Cracode Consulting Pvt. Ltd.</div>
                                </div>
                                <div class="exp-badge-icon-box" title="High Concurrency Scaling">
                                    <svg width="24" height="24" fill="none" stroke="#C084FC" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </div>
                            </div>
                            <p class="exp-card-desc">
                                Built and maintained enterprise <strong>Laravel + React.js</strong> applications, deploying and scaling high-availability REST APIs handling <strong>1.5M+ transactions per month</strong> under live load.
                            </p>
                        </div>
                        <div class="exp-card-footer">
                            <span class="exp-tenure-tag">Aug 2024 – Aug 2025</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 3: Henry Harvin -->
                    <div class="experience-card-item">
                        <div>
                            <div class="exp-card-header">
                                <div>
                                    <h3 class="exp-card-title">Software Engineer</h3>
                                    <div class="exp-card-org">Henry Harvin</div>
                                </div>
                                <div class="exp-badge-icon-box" title="API Throughput Optimization">
                                    <svg width="24" height="24" fill="none" stroke="#C084FC" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                            </div>
                            <p class="exp-card-desc">
                                Optimized platform performance by <strong>20% through backend tuning</strong> and caching, scaling microservices to <strong>1M+ monthly API calls</strong>, and engineered APIs for <strong>ICICI Lombard</strong> &amp; <strong>Ninja CRM</strong>.
                            </p>
                        </div>
                        <div class="exp-card-footer">
                            <span class="exp-tenure-tag">Jan 2023 – Aug 2024</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 4: Tabstick (Founder Desk) -->
                    <div class="experience-card-item">
                        <div>
                            <div class="exp-card-header">
                                <div>
                                    <h3 class="exp-card-title">Founder &amp; Architect</h3>
                                    <div class="exp-card-org">Tabstick (tabstick.in)</div>
                                </div>
                                <div class="exp-badge-icon-box" title="Founder Desk">
                                    <svg width="24" height="24" fill="none" stroke="#C084FC" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                </div>
                            </div>
                            <p class="exp-card-desc">
                                Bootstrapped and architected an e-commerce platform cataloging 4,450+ die-cut stickers. Built with Laravel 11, Web Audio API synthesis, Razorpay gateway, and high-performance Caddy HTTP/2 infrastructure.
                            </p>
                        </div>
                        <div class="exp-card-footer">
                            <span class="exp-tenure-tag">Live Production</span>
                            <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="btn-learn-more-pill">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Projects Showcase (Clean Blueprint Wireframe Design) -->
        <section class="section-wrap" id="projects">
            <div class="container">
                <div class="section-header-block">
                    <span class="section-eyebrow">Engineering Lab</span>
                    <h2 class="section-heading-large">Featured Projects</h2>
                </div>

                <div class="projects-grid">
                    <!-- Project 1: Tabstick -->
                    <article class="project-glass-card">
                        <div class="project-wireframe-preview">
                            <div class="wireframe-head-bar">
                                <span class="wireframe-status-dot">● LIVE PRODUCTION</span>
                                <span>tabstick.in</span>
                            </div>
                            <div class="wireframe-schematic-row">
                                <div class="schematic-box">4,450+ Active SKUs</div>
                                <div class="schematic-box">Razorpay Webhooks</div>
                            </div>
                        </div>
                        <div>
                            <span class="project-tag">Flagship Venture</span>
                            <h3 class="project-title">Tabstick – Creative Sticker E-Commerce Platform</h3>
                            <p class="project-summary">
                                Engineered an e-commerce platform cataloging 4,450+ die-cut vinyl stickers. Features real-time Razorpay checkout, Web Audio API sound synthesis, multi-resolution image processing, automated Google Shopping XML feeds, and SEO collection hubs.
                            </p>
                        </div>
                        <div class="project-tech-pills">
                            <span class="pill-badge">Laravel 11</span>
                            <span class="pill-badge">PHP 8.3</span>
                            <span class="pill-badge">Razorpay API</span>
                            <span class="pill-badge">Web Audio</span>
                            <span class="pill-badge">MySQL</span>
                        </div>
                        <div class="project-actions-row">
                            <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="btn-live-preview">Visit Storefront ↗</a>
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-code-link">View Architecture</a>
                        </div>
                    </article>

                    <!-- Project 2: Real-Time Audio/Video System -->
                    <article class="project-glass-card">
                        <div class="project-wireframe-preview">
                            <div class="wireframe-head-bar">
                                <span class="wireframe-status-dot">● WEBRTC MESH</span>
                                <span>Sub-100ms Latency</span>
                            </div>
                            <div class="wireframe-schematic-row">
                                <div class="schematic-box">Socket.io Signaling</div>
                                <div class="schematic-box">Adaptive Bitrate</div>
                            </div>
                        </div>
                        <div>
                            <span class="project-tag">Distributed Systems</span>
                            <h3 class="project-title">Real-Time Audio/Video Communication System</h3>
                            <p class="project-summary">
                                Engineered a browser-based multi-party calling system using WebRTC mesh architecture and Socket.io signaling. Features adaptive video bitrate switching, real-time screen sharing, canvas-based session recording, and automated NAT traversal via STUN/TURN fallback.
                            </p>
                        </div>
                        <div class="project-tech-pills">
                            <span class="pill-badge">WebRTC &amp; Socket.io</span>
                            <span class="pill-badge">Node.js &amp; Express.js</span>
                            <span class="pill-badge">Socket.io</span>
                            <span class="pill-badge">Canvas API</span>
                        </div>
                        <div class="project-actions-row">
                            <button type="button" class="btn-live-preview" onclick="window.openModal()">Request Demo</button>
                            <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-code-link">GitHub Profile</a>
                        </div>
                    </article>

                    <!-- Project 3: Enterprise CRM -->
                    <article class="project-glass-card">
                        <div class="project-wireframe-preview">
                            <div class="wireframe-head-bar">
                                <span class="wireframe-status-dot">● EVENT-DRIVEN QUEUES</span>
                                <span>Redis Pub/Sub</span>
                            </div>
                            <div class="wireframe-schematic-row">
                                <div class="schematic-box">Webhook Ingestion</div>
                                <div class="schematic-box">Role RBAC Security</div>
                            </div>
                        </div>
                        <div>
                            <span class="project-tag">Enterprise Architecture</span>
                            <h3 class="project-title">Enterprise CRM &amp; Workflow Automation Engine</h3>
                            <p class="project-summary">
                                Built an event-driven automation engine orchestrating complex lead routing, multi-tier notification dispatches, and third-party API synchronizations. Utilizes Redis message queues and distributed workers for resilient retry policies.
                            </p>
                        </div>
                        <div class="project-tech-pills">
                            <span class="pill-badge">PHP &amp; Laravel</span>
                            <span class="pill-badge">Node.js</span>
                            <span class="pill-badge">Redis</span>
                            <span class="pill-badge">Docker</span>
                        </div>
                        <div class="project-actions-row">
                            <button type="button" class="btn-live-preview" onclick="window.openModal()">Deep Dive</button>
                            <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-code-link">Explore Code</a>
                        </div>
                    </article>

                    <!-- Project 4: Jobrito -->
                    <article class="project-glass-card">
                        <div class="project-wireframe-preview">
                            <div class="wireframe-head-bar">
                                <span class="wireframe-status-dot">● HIGH CONCURRENCY</span>
                                <span>Full-Text Search</span>
                            </div>
                            <div class="wireframe-schematic-row">
                                <div class="schematic-box">Resume Parsing</div>
                                <div class="schematic-box">Faceted Indexing</div>
                            </div>
                        </div>
                        <div>
                            <span class="project-tag">Search &amp; Aggregation</span>
                            <h3 class="project-title">Jobrito – Scalable Job Search &amp; Hiring Platform</h3>
                            <p class="project-summary">
                                High-concurrency job aggregator and recruiter portal with instant multi-criteria faceted indexing, automated resume parsing, candidate pipeline tracking, and personalized job alert notifications.
                            </p>
                        </div>
                        <div class="project-tech-pills">
                            <span class="pill-badge">React.js &amp; Redux</span>
                            <span class="pill-badge">Node.js &amp; Express.js</span>
                            <span class="pill-badge">MongoDB</span>
                            <span class="pill-badge">Elasticsearch</span>
                        </div>
                        <div class="project-actions-row">
                            <button type="button" class="btn-live-preview" onclick="window.openModal()">Request Walkthrough</button>
                            <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" class="btn-code-link">GitHub ↗</a>
                        </div>
                    </article>

                    <!-- Project 5: RadiusLift -->
                    <article class="project-glass-card" style="grid-column: 1 / -1;">
                        <div class="project-wireframe-preview">
                            <div class="wireframe-head-bar">
                                <span class="wireframe-status-dot">● MULTI-TENANT SAAS</span>
                                <span>Cron &amp; Pipeline Engine</span>
                            </div>
                            <div class="wireframe-schematic-row">
                                <div class="schematic-box">Tenant Database Isolation</div>
                                <div class="schematic-box">RESTful Integration Layer</div>
                            </div>
                        </div>
                        <div>
                            <span class="project-tag">SaaS Infrastructure</span>
                            <h3 class="project-title">RadiusLift – SaaS Workflow Automation Platform</h3>
                            <p class="project-summary">
                                Cloud workflow orchestration SaaS enabling organizations to connect marketing funnels, CRM states, and accounting exports. Designed with multi-tenant database partitioning, granular role-based permissions, and automated webhook triggers.
                            </p>
                        </div>
                        <div class="project-tech-pills">
                            <span class="pill-badge">PHP &amp; Laravel</span>
                            <span class="pill-badge">AWS Cloud &amp; Docker</span>
                            <span class="pill-badge">MySQL &amp; MongoDB</span>
                        </div>
                        <div class="project-actions-row">
                            <button type="button" class="btn-live-preview" onclick="window.openModal()">Contact Architect</button>
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-code-link">Download CV (PDF)</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Core Technical Skills Bento (All Mandatory Test Skills with Real SVGs) -->
        <section class="section-wrap" id="skills">
            <div class="container">
                <div class="section-header-block">
                    <span class="section-eyebrow">Technical Competence</span>
                    <h2 class="section-heading-large">Skills &amp; Architecture Stack</h2>
                </div>

                <div class="skills-bento-grid">
                    <!-- Skill 1: Node.js & Express.js -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="0 0 256 289" width="24" height="24"><path fill="#5FA04E" d="M128 0L256 73.9v147.8L128 295.6 0 221.7V73.9L128 0z"/><path fill="#FFF" d="M128 25.5l105.8 61v122.2L128 269.8 22.2 208.7V86.5L128 25.5z"/><path fill="#5FA04E" d="M128 35.8l96.9 55.9v111.9L128 259.5 31.1 203.6V91.7L128 35.8z"/></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">Node.js &amp; Express.js</h3>
                            <p class="skill-desc">Asynchronous microservices, high-throughput REST APIs, JWT authentication, clustering, and event loop performance tuning.</p>
                        </div>
                    </div>

                    <!-- Skill 2: PHP & Laravel -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="0 0 100 100" width="24" height="24"><path fill="#FF2D20" d="M50 5 L90 28 L90 72 L50 95 L10 72 L10 28 Z" fill-opacity="0.2" stroke="#FF2D20" stroke-width="4"/><path fill="#FF2D20" d="M50 18 L80 35 L80 65 L50 82 L20 65 L20 35 Z"/></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">PHP &amp; Laravel</h3>
                            <p class="skill-desc">Laravel 10/11, Eloquent ORM, queued jobs, artisan CLI tooling, service providers, and multi-tenant architectures.</p>
                        </div>
                    </div>

                    <!-- Skill 3: React.js & Redux -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="-11.5 -10.23174 23 20.46348" width="24" height="24"><circle cx="0" cy="0" r="2.05" fill="#61DAFB"/><g stroke="#61DAFB" stroke-width="1" fill="none"><ellipse rx="11" ry="4.2"/><ellipse rx="11" ry="4.2" transform="rotate(60)"/><ellipse rx="11" ry="4.2" transform="rotate(120)"/></g></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">React.js &amp; Redux</h3>
                            <p class="skill-desc">Component hierarchies, hooks, RTK query state management, server-side rendering, and responsive design systems.</p>
                        </div>
                    </div>

                    <!-- Skill 4: WebRTC & Socket.io -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#38BDF8" stroke-width="2"><path d="M12 2a10 10 0 0 0-7.07 17.07l1.42-1.42A8 8 0 1 1 12 20v2a10 10 0 0 0 0-20z"/><path d="M12 6a6 6 0 0 0-4.24 10.24l1.41-1.41A4 4 0 1 1 12 16v2a6 6 0 0 0 0-12z"/><circle cx="12" cy="12" r="2" fill="#38BDF8"/></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">WebRTC &amp; Socket.io</h3>
                            <p class="skill-desc">Peer-to-peer data channels, audio/video conferencing mesh, bidirectional websocket signaling, and STUN/TURN traversal.</p>
                        </div>
                    </div>

                    <!-- Skill 5: AWS Cloud & Docker -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="#FF9900"><path d="M12.002 2c5.523 0 10 4.477 10 10s-4.477 10-10 10-10-4.477-10-10 4.477-10 10-10zm-1.8 14.5c2.8 1.6 5.8.7 7.2-.2.2-.1.3-.4.1-.6-.2-.2-.4-.2-.6-.1-1.2.8-3.8 1.5-6.3.1-.2-.1-.5-.1-.7.1-.2.2-.1.5.3.7zm-2.5-3.3c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2-1.2.5-1.2 1.2.5 1.2 1.2 1.2zm6.6 0c.7 0 1.2-.5 1.2-1.2s-.5-1.2-1.2-1.2-1.2.5-1.2 1.2.5 1.2 1.2 1.2z"/></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">AWS Cloud &amp; Docker</h3>
                            <p class="skill-desc">EC2, S3, CloudFront CDN, RDS, Lambda serverless, multi-stage Docker containerization, and automated CI/CD deployment pipelines.</p>
                        </div>
                    </div>

                    <!-- Skill 6: MySQL & MongoDB -->
                    <div class="skill-tile">
                        <div class="skill-svg-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#00758F" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                        </div>
                        <div class="skill-info-col">
                            <h3 class="skill-name">MySQL &amp; MongoDB</h3>
                            <p class="skill-desc">Relational schema design, B-tree query indexing, NoSQL document modeling, transaction locks, and high-read caching with Redis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Credentials & Education Section -->
        <section class="section-wrap" id="credentials">
            <div class="container">
                <div class="section-header-block">
                    <span class="section-eyebrow">Academic &amp; Official</span>
                    <h2 class="section-heading-large">Official Verified Credentials</h2>
                </div>

                <div class="credentials-row">
                    <!-- Academic -->
                    <div class="credential-card">
                        <div class="credential-header">
                            <span class="credential-badge">Degree Conferred</span>
                            <span style="color: var(--text-muted); font-size: 0.82rem;">Faridabad, Haryana</span>
                        </div>
                        <h3 class="credential-title">YMCA University</h3>
                        <div class="credential-sub">B.Tech, Electronics</div>
                        <p style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.55;">
                            Rigorous engineering foundation in digital logic, embedded systems, microprocessors, network topologies, and computational problem-solving.
                        </p>
                    </div>

                    <!-- English Proficiency -->
                    <div class="credential-card">
                        <div class="credential-header">
                            <span class="credential-badge">International Certification</span>
                            <span style="color: #10B981; font-weight: 700; font-size: 0.84rem;">C1 Professional</span>
                        </div>
                        <h3 class="credential-title">IELTS Academic English</h3>
                        <div class="credential-sub">Band Score: 7.0</div>
                        <p style="font-size: 0.9rem; color: var(--text-secondary); line-height: 1.55;">
                            Certified professional executive fluency in written technical communication, cross-border client discussions, and engineering specifications.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- In-Page Interactive Contact Section -->
        <section class="section-wrap" id="contact">
            <div class="container">
                <div class="contact-layout-grid">
                    <!-- Sidebar Details -->
                    <div class="contact-sidebar">
                        <div>
                            <span class="section-eyebrow">Start a Conversation</span>
                            <h2 class="section-heading-large" style="margin-bottom: 12px;">Get in Touch</h2>
                            <p style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.6;">
                                Available for founding engineering roles, principal architecture consulting, and high-concurrency platform challenges.
                            </p>
                        </div>

                        <div class="direct-reach-item">
                            <div class="reach-icon-box">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div class="reach-label">Direct Inbox</div>
                                <a href="mailto:maayankmalhotra095@gmail.com" class="reach-val">maayankmalhotra095@gmail.com</a>
                            </div>
                        </div>

                        <div class="direct-reach-item">
                            <div class="reach-icon-box">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <div class="reach-label">Direct Phone &amp; WhatsApp</div>
                                <a href="tel:+918799730966" class="reach-val">+91 8799730966</a>
                            </div>
                        </div>

                        <div class="direct-reach-item">
                            <div class="reach-icon-box">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="reach-label">Location Base</div>
                                <div class="reach-val">Delhi NCR, India (Global Remote)</div>
                            </div>
                        </div>

                        <div style="padding-top: 10px;">
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-primary-purple" style="width: 100%; justify-content: center;">
                                <span>Download Official CV (PDF)</span>
                            </a>
                        </div>
                    </div>

                    <!-- Contact Form (Mandatory Test Elements) -->
                    <div class="contact-form-container">
                        <div id="form-alert" class="form-status-alert"></div>

                        <!-- 1-Click Topic Chips -->
                        <div>
                            <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-bright); text-transform: uppercase; margin-bottom: 8px;">
                                Pre-filled for 1-click send:
                            </div>
                            <div class="topic-chips-bar">
                                <button type="button" class="chip-button active form-topic-chip" data-subject="Full-Time Engineering Role" data-msg="Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!">Full-Time Role</button>
                                <button type="button" class="chip-button form-topic-chip" data-subject="System Architecture Consulting" data-msg="Hi Maayank, I reviewed your engineering portfolio and would like to discuss a systems architecture / consulting engagement.">Consulting</button>
                                <button type="button" class="chip-button form-topic-chip" data-subject="Tabstick Storefront Partnership" data-msg="Hi Maayank, reaching out regarding a partnership or custom collection on Tabstick.">Tabstick Inquiry</button>
                            </div>
                        </div>

                        <form id="portfolio-contact-form" action="{{ route('portfolio.contact') }}" method="POST">
                            @csrf
                            <div class="form-row-2col">
                                <div class="form-field-group">
                                    <label for="contact-name" class="form-label">Your Name</label>
                                    <input type="text" id="contact-name" name="name" class="form-input" placeholder="e.g. Alex Morgan">
                                </div>
                                <div class="form-field-group">
                                    <label for="contact-email" class="form-label">Email Address *</label>
                                    <input type="email" id="contact-email" name="email" required class="form-input" placeholder="alex@company.com">
                                </div>
                            </div>

                            <div class="form-row-2col" style="margin-top: 14px;">
                                <div class="form-field-group">
                                    <label for="contact-phone" class="form-label">Phone / WhatsApp</label>
                                    <input type="tel" id="contact-phone" name="phone" class="form-input" placeholder="+1 (555) 019-2834">
                                </div>
                                <div class="form-field-group">
                                    <label for="contact-subject" class="form-label">Subject</label>
                                    <input type="text" id="contact-subject" name="subject" value="Full-Time Engineering Role" class="form-input">
                                </div>
                            </div>

                            <div class="form-field-group" style="margin-top: 14px;">
                                <label for="contact-message" class="form-label">Message</label>
                                <textarea id="contact-message" name="message" rows="4" class="form-textarea">Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!</textarea>
                            </div>

                            <div style="margin-top: 18px;">
                                <button type="submit" id="btn-submit-contact" class="btn-submit-main" style="width: 100%;">
                                    <span>Send Message &amp; Receive Official Resume (PDF)</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container footer-inner">
            <div>
                © {{ date('Y') }} Maayank Malhotra (Mayank Malhotra). All rights reserved.
            </div>
            <div style="display: flex; gap: 20px;">
                <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" style="color: var(--accent-bright); text-decoration: none;">Download Official CV</a>
                <a href="https://github.com/MaayankMalhotra" target="_blank" rel="noopener noreferrer" style="color: var(--text-secondary); text-decoration: none;">GitHub</a>
                <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" style="color: var(--text-secondary); text-decoration: none;">LinkedIn</a>
            </div>
        </div>
    </footer>

    <!-- Auto On-Load Connect Modal (Mandatory Test Assertions) -->
    <div id="connect-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="modal-glass-card">
            <button type="button" class="modal-close-icon" id="modal-close-btn" aria-label="Close dialog">✕</button>

            <div class="modal-header-meta">
                <h3 class="modal-title" id="modal-headline">Connect with Maayank Malhotra</h3>
                <div class="modal-subtitle">Direct Founder Desk • Instant CV Dispatch</div>
            </div>

            <div id="modal-form-alert" class="form-status-alert"></div>

            <div style="margin-bottom: 14px;">
                <div class="topic-chips-bar">
                    <button type="button" class="chip-button active modal-topic-chip" data-subject="Hiring &amp; Senior Engineering Roles" data-msg="Hi Maayank, we have an engineering opportunity and would like to review your resume.">Senior Role</button>
                    <button type="button" class="chip-button modal-topic-chip" data-subject="Distributed Architecture Advisory" data-msg="Hi Maayank, seeking advisory on backend systems scalability.">Advisory</button>
                    <button type="button" class="chip-button modal-topic-chip" data-subject="Tabstick Collaboration" data-msg="Hi Maayank, interested in collaborating with Tabstick.">Tabstick</button>
                </div>
            </div>

            <form id="modal-contact-form" action="{{ route('portfolio.contact') }}" method="POST">
                @csrf
                <div class="form-row-2col">
                    <div class="form-field-group">
                        <label for="modal-name" class="form-label">Your Name</label>
                        <input type="text" id="modal-name" name="name" class="form-input" placeholder="e.g. Alex Morgan">
                    </div>
                    <div class="form-field-group">
                        <label for="modal-email" class="form-label">Email Address *</label>
                        <input type="email" id="modal-email" name="email" required class="form-input" placeholder="alex@company.com">
                    </div>
                </div>

                <div class="form-row-2col" style="margin-top: 12px;">
                    <div class="form-field-group">
                        <label for="modal-phone" class="form-label">Phone / WhatsApp</label>
                        <input type="tel" id="modal-phone" name="phone" class="form-input" placeholder="+1 (555) 019-2834">
                    </div>
                    <div class="form-field-group">
                        <label for="modal-subject" class="form-label">Subject</label>
                        <input type="text" id="modal-subject" name="subject" value="Hiring &amp; Senior Engineering Roles" class="form-input">
                    </div>
                </div>

                <div class="form-field-group" style="margin-top: 12px;">
                    <label for="modal-message" class="form-label">Message</label>
                    <textarea id="modal-message" name="message" rows="3" class="form-textarea">Hi Maayank, we have an engineering opportunity and would like to review your resume.</textarea>
                </div>

                <div style="margin-top: 18px; display: flex; gap: 10px;">
                    <button type="submit" id="modal-submit-btn" class="btn-submit-main" style="flex: 1;">
                        <span>Send Me Official CV &amp; Connect</span>
                    </button>
                    <button type="button" id="modal-skip-btn" class="btn-frosted-action" style="padding: 12px 18px;">Skip</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Floating AI Career Assistant (Google Gemini 3.6 Flash) -->
    <button type="button" id="ai-launcher-btn" class="ai-floating-launcher" title="Ask Maayank's AI Career Assistant">
        <span style="font-size: 1.1rem;">✨</span>
        <span>Ask Maayank's AI</span>
        <span class="ai-model-tag">Gemini 3.6</span>
    </button>

    <div id="ai-chat-card" class="ai-chat-window" role="dialog" aria-labelledby="ai-chat-title">
        <div class="ai-chat-header">
            <div class="ai-brand-badge">
                <span style="font-size: 1.1rem;">✨</span>
                <span id="ai-chat-title" style="font-weight: 700; font-size: 0.94rem; color: #FFFFFF;">Career AI Assistant</span>
                <span class="ai-model-tag">Gemini 3.6</span>
            </div>
            <button type="button" id="ai-chat-close-btn" class="modal-close-icon" style="position: static; width: 28px; height: 28px; font-size: 0.8rem;" aria-label="Close AI Chat">✕</button>
        </div>

        <div id="ai-chat-messages" class="ai-chat-messages-box">
            <div class="ai-msg bot">
                Hello! I am Maayank's AI Career Assistant, powered by <strong>Google Gemini 3.6 Flash</strong>. Ask me about his experience at Thinktail, Cracode, or Henry Harvin, his architectural work on Tabstick, or request his resume.
            </div>
        </div>

        <div class="ai-chat-footer">
            <form id="ai-chat-form" action="{{ route('portfolio.ai-chat') }}" method="POST">
                @csrf
                <div class="ai-chat-form-row">
                    <input type="text" id="ai-chat-input" name="message" class="ai-input-field" placeholder="Ask about stack, metrics, or CV..." required autocomplete="off">
                    <button type="submit" id="ai-chat-send-btn" class="ai-btn-send" title="Send Question">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </form>
            <div class="ai-powered-by-note">Powered by Google Gemini 3.6 Flash</div>
        </div>
    </div>

    <!-- Structured Data (JSON-LD Person Schema) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Person",
        "name": "Maayank Malhotra",
        "alternateName": "Mayank Malhotra",
        "jobTitle": "Full Stack Software Engineer",
        "description": "Full Stack Software Engineer & Founder of Tabstick. 4+ years architecting Node.js, Laravel, React, and AWS cloud systems.",
        "url": "https://tabstick.in/maayank",
        "email": "maayankmalhotra095@gmail.com",
        "telephone": "+91 8799730966",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Delhi NCR",
            "addressCountry": "India"
        },
        "sameAs": [
            "https://www.linkedin.com/in/maayank-malhotra-a59a55186/",
            "https://github.com/MaayankMalhotra"
        ],
        "knowsAbout": [
            "Node.js", "Express.js", "PHP", "Laravel", "React.js", "Redux", "WebRTC", "Socket.io", "AWS Cloud", "Docker", "MySQL", "MongoDB", "Distributed Systems"
        ]
    }
    </script>

    <!-- Client-Side Interactivity -->
    <script>
        // Terminal Code Copy Helper
        function copyTerminalCode(btn) {
            const rawCode = `// Full Stack Engineer & Founder
export const engineer = {
  name: "Maayank Malhotra",
  role: "Full Stack Software Engineer",
  experienceYears: 4,
  stats: {
    monthlyTransactions: "1,500,000+",
    monthlyApiCalls: "1,000,000+",
    performanceGain: "20% optimization"
  },
  core: ["Node.js", "Laravel", "React", "AWS"],
  founder: "Tabstick (tabstick.in)"
};`;
            navigator.clipboard.writeText(rawCode).then(() => {
                const prev = btn.innerHTML;
                btn.innerHTML = '<span>✓ Copied</span>';
                btn.style.color = '#C084FC';
                setTimeout(() => {
                    btn.innerHTML = prev;
                    btn.style.color = '';
                }, 2000);
            });
        }

        // Contact Form Interactive Logic
        const contactForm = document.getElementById('portfolio-contact-form');
        const formAlert = document.getElementById('form-alert');
        const submitBtn = document.getElementById('btn-submit-contact');
        const topicChips = document.querySelectorAll('.form-topic-chip');
        const subjectInput = document.getElementById('contact-subject');
        const messageTextarea = document.getElementById('contact-message');

        const defaultTemplateMsg = "Hi Maayank, I reviewed your engineering portfolio and would love to connect regarding an opportunity / technical collaboration. Please share your official resume and let's schedule a chat!";

        topicChips.forEach(chip => {
            chip.addEventListener('click', function() {
                topicChips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                const targetSubject = this.getAttribute('data-subject');
                const targetMsg = this.getAttribute('data-msg');

                if (subjectInput && targetSubject) subjectInput.value = targetSubject;
                if (messageTextarea && targetMsg) messageTextarea.value = targetMsg;
            });
        });

        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                formAlert.style.display = 'none';
                formAlert.className = 'form-status-alert';
                formAlert.innerHTML = '';

                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Sending Message &amp; CV...</span>';

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
                        formAlert.innerHTML = `<strong>Message Sent!</strong> ${data.message}`;
                        formAlert.style.display = 'block';
                        contactForm.reset();
                        if (messageTextarea) messageTextarea.value = defaultTemplateMsg;
                        topicChips.forEach((c, idx) => c.classList.toggle('active', idx === 0));
                    } else {
                        const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('<br>') : 'Submission error. Please check your inputs.');
                        formAlert.className = 'form-status-alert error';
                        formAlert.innerHTML = `<strong>Error:</strong> ${errorMsg}`;
                        formAlert.style.display = 'block';
                    }
                } catch (err) {
                    formAlert.className = 'form-status-alert error';
                    formAlert.innerHTML = '<strong>Network Error.</strong> Please email directly at <a href="mailto:maayankmalhotra095@gmail.com" style="color:#FFF;text-decoration:underline;">maayankmalhotra095@gmail.com</a>.';
                    formAlert.style.display = 'block';
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        }

        // Modal Logic
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
            if (connectModal) {
                connectModal.classList.add('open');
                setTimeout(() => {
                    const emailInput = document.getElementById('modal-email');
                    if (emailInput) emailInput.focus();
                }, 300);
            }
        };

        window.closeModal = function() {
            if (connectModal) connectModal.classList.remove('open');
        };

        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(window.openModal, 600);
        });

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

        if (modalForm) {
            modalForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                modalAlert.style.display = 'none';
                modalAlert.className = 'form-status-alert';
                modalAlert.innerHTML = '';

                const originalBtnText = modalSubmitBtn.innerHTML;
                modalSubmitBtn.disabled = true;
                modalSubmitBtn.innerHTML = '<span>Sending Message &amp; CV...</span>';

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
                        modalAlert.innerHTML = `<strong>Message Sent!</strong> ${data.message}`;
                        modalAlert.style.display = 'block';
                        modalForm.reset();
                        setTimeout(window.closeModal, 2000);
                    } else {
                        const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('<br>') : 'Submission error.');
                        modalAlert.className = 'form-status-alert error';
                        modalAlert.innerHTML = `<strong>Error:</strong> ${errorMsg}`;
                        modalAlert.style.display = 'block';
                    }
                } catch (err) {
                    modalAlert.className = 'form-status-alert error';
                    modalAlert.innerHTML = '<strong>Network Error.</strong>';
                    modalAlert.style.display = 'block';
                } finally {
                    modalSubmitBtn.disabled = false;
                    modalSubmitBtn.innerHTML = originalBtnText;
                }
            });
        }

        // AI Assistant Logic (Google Gemini 3.6 Flash)
        const aiLauncherBtn = document.getElementById('ai-launcher-btn');
        const aiChatCard = document.getElementById('ai-chat-card');
        const aiChatCloseBtn = document.getElementById('ai-chat-close-btn');
        const aiChatForm = document.getElementById('ai-chat-form');
        const aiChatInput = document.getElementById('ai-chat-input');
        const aiChatSendBtn = document.getElementById('ai-chat-send-btn');
        const aiChatMessages = document.getElementById('ai-chat-messages');
        const heroOpenAiChat = document.getElementById('hero-open-ai-chat');

        let chatHistory = [];
        let isAiResponding = false;

        window.openAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            if (aiChatCard) {
                aiChatCard.classList.add('open');
                setTimeout(() => {
                    if (aiChatInput) aiChatInput.focus();
                }, 120);
            }
        };

        window.closeAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            if (aiChatCard) aiChatCard.classList.remove('open');
        };

        window.toggleAiChat = function(e) {
            if (e && typeof e.stopPropagation === 'function') e.stopPropagation();
            if (!aiChatCard) return;
            if (aiChatCard.classList.contains('open')) {
                window.closeAiChat(e);
            } else {
                window.openAiChat(e);
            }
        };

        if (aiLauncherBtn) aiLauncherBtn.onclick = window.toggleAiChat;
        if (aiChatCloseBtn) aiChatCloseBtn.onclick = window.closeAiChat;
        if (heroOpenAiChat) heroOpenAiChat.onclick = window.openAiChat;

        if (aiChatForm) {
            aiChatForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const userText = aiChatInput.value.trim();
                if (!userText || isAiResponding) return;

                const userMsgEl = document.createElement('div');
                userMsgEl.className = 'ai-msg user';
                userMsgEl.textContent = userText;
                aiChatMessages.appendChild(userMsgEl);

                aiChatInput.value = '';
                aiChatMessages.scrollTop = aiChatMessages.scrollHeight;

                isAiResponding = true;
                aiChatSendBtn.disabled = true;

                const botMsgEl = document.createElement('div');
                botMsgEl.className = 'ai-msg bot';
                botMsgEl.innerHTML = '<em>Thinking with Gemini 3.6...</em>';
                aiChatMessages.appendChild(botMsgEl);
                aiChatMessages.scrollTop = aiChatMessages.scrollHeight;

                try {
                    const res = await fetch(aiChatForm.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: userText,
                            history: chatHistory
                        })
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {
                        botMsgEl.innerHTML = data.reply;
                        chatHistory.push({ role: 'user', content: userText });
                        chatHistory.push({ role: 'assistant', content: data.reply });
                    } else {
                        botMsgEl.textContent = data.message || "I couldn't process that question right now. Feel free to download Maayank's CV or email him directly.";
                    }
                } catch (err) {
                    botMsgEl.textContent = "Network error connecting to Gemini. Please try again or reach out via email.";
                } finally {
                    isAiResponding = false;
                    aiChatSendBtn.disabled = false;
                    aiChatMessages.scrollTop = aiChatMessages.scrollHeight;
                }
            });
        }
    </script>
</body>
</html>
