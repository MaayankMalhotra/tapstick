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

    <!-- Google Fonts: Plus Jakarta Sans, Caveat (hand-drawn text), & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Deep Midnight Purple & Radiant Violet Aesthetic (Matching Screenshot Exactly) -->
    <style>
        :root {
            /* Deep Midnight Purple Theme from Screenshot */
            --bg-base: #0B0813;
            --bg-deep: #07050C;
            --bg-surface: rgba(22, 14, 38, 0.72);
            --bg-card: rgba(26, 17, 44, 0.65);
            --bg-card-hover: rgba(36, 23, 62, 0.85);

            /* Luminous Purple & Violet Accents */
            --accent-purple: #9D4EDD;
            --accent-violet: #A855F7;
            --accent-glow: #C084FC;
            --accent-bright: #E0AAFF;
            --accent-magenta: #D946EF;
            --accent-cyan: #38BDF8;
            --accent-green: #10B981;

            /* Borders */
            --border-subtle: rgba(168, 85, 247, 0.18);
            --border-highlight: rgba(192, 132, 252, 0.45);
            --border-card: rgba(168, 85, 247, 0.22);

            /* Text */
            --text-primary: #FFFFFF;
            --text-secondary: #CBD5E1;
            --text-muted: #8E8A9E;

            /* Fonts */
            --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-hand: 'Caveat', cursive;
            --font-mono: 'JetBrains Mono', monospace;

            /* Border Radii */
            --radius-xs: 8px;
            --radius-sm: 12px;
            --radius-md: 20px;
            --radius-lg: 28px;
            --radius-full: 9999px;

            /* Glows */
            --glow-purple-sm: 0 0 25px rgba(157, 78, 221, 0.3);
            --glow-purple-lg: 0 0 70px rgba(168, 85, 247, 0.35);
            --glow-avatar: 0 0 60px rgba(168, 85, 247, 0.55);
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

        /* Ambient Purple Aurora Mesh Background */
        .ambient-purple-mesh {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .purple-orb-1 {
            position: absolute;
            top: -10%;
            left: 20%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.22) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(100px);
            animation: orbFloat 22s ease-in-out infinite alternate;
        }

        .purple-orb-2 {
            position: absolute;
            top: 35%;
            right: -10%;
            width: 750px;
            height: 750px;
            background: radial-gradient(circle, rgba(157, 78, 221, 0.18) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(110px);
            animation: orbFloat 26s ease-in-out infinite alternate-reverse;
        }

        .purple-orb-3 {
            position: absolute;
            bottom: 5%;
            left: -5%;
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, rgba(217, 70, 239, 0.15) 0%, rgba(11, 8, 19, 0) 70%);
            border-radius: 50%;
            filter: blur(95px);
            animation: orbFloat 24s ease-in-out infinite alternate;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -25px) scale(1.08); }
            100% { transform: translate(-25px, 30px) scale(0.95); }
        }

        /* Grid Pattern */
        .grid-pattern-overlay {
            position: fixed;
            inset: 0;
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.04) 1px, transparent 0),
                linear-gradient(to right, rgba(168, 85, 247, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(168, 85, 247, 0.02) 1px, transparent 1px);
            background-size: 40px 40px, 80px 80px, 80px 80px;
            pointer-events: none;
            z-index: 0;
            opacity: 0.85;
        }

        .container {
            width: 100%;
            max-width: 1220px;
            margin: 0 auto;
            padding: 0 28px;
            position: relative;
            z-index: 1;
        }

        /* ==========================================================================
           TOP NAVIGATION BAR (MINIMALIST MONOGRAM STYLE)
           ========================================================================== */
        .dev-navbar {
            padding: 24px 0 16px;
            position: relative;
            z-index: 50;
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .brand-monogram-symbol {
            font-size: 1.8rem;
            font-weight: 300;
            font-family: serif, 'Plus Jakarta Sans';
            color: #FFFFFF;
            line-height: 1;
            text-shadow: 0 0 12px rgba(168, 85, 247, 0.8);
            transform: scaleX(1.1);
            display: inline-block;
        }

        .nav-brand-title {
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #FFFFFF;
        }

        .nav-brand-title span {
            color: var(--accent-violet);
        }

        .nav-center-menu {
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
        }

        .nav-center-link {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-center-link:hover, .nav-center-link.active {
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
            gap: 7px;
            background: rgba(168, 85, 247, 0.12);
            color: var(--accent-bright);
            border: 1px solid rgba(168, 85, 247, 0.35);
            padding: 8px 18px;
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-nav-resume:hover {
            background: rgba(168, 85, 247, 0.25);
            border-color: var(--accent-violet);
            color: #FFFFFF;
            transform: translateY(-1px);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.4);
        }

        .btn-nav-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            font-size: 0.86rem;
            font-weight: 800;
            padding: 9px 20px;
            border-radius: var(--radius-full);
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.45);
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-nav-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px rgba(168, 85, 247, 0.65);
            filter: brightness(1.1);
        }

        /* ==========================================================================
           HERO SECTION: 3D MEMOJI AVATAR & QUOTE LAYOUT
           ========================================================================== */
        .hero-section {
            padding: 50px 0 70px;
            position: relative;
        }

        .hero-wrapper {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 48px;
            align-items: center;
        }

        /* Left Hero Content with Avatar */
        .hero-avatar-quote-row {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 28px;
        }

        .avatar-glow-wrap {
            position: relative;
            width: 110px;
            height: 110px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-glow-backdrop {
            position: absolute;
            inset: -15px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.6) 0%, rgba(124, 58, 237, 0.2) 50%, transparent 75%);
            border-radius: 50%;
            filter: blur(16px);
            animation: avatarPulse 3s infinite alternate ease-in-out;
        }

        @keyframes avatarPulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            100% { transform: scale(1.1); opacity: 1; }
        }

        .avatar-art {
            position: relative;
            z-index: 2;
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: linear-gradient(145deg, #1C122D, #0B0813);
            border: 2px solid rgba(192, 132, 252, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .avatar-emoji-icon {
            font-size: 3.4rem;
            line-height: 1;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.6));
        }

        .hero-quote-box {
            display: flex;
            flex-direction: column;
        }

        .hero-handwritten-hello {
            font-family: var(--font-hand);
            font-size: 1.35rem;
            color: var(--accent-bright);
            display: flex;
            align-items: center;
            gap: 6px;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .hero-handwritten-hello span {
            color: #FFFFFF;
            font-weight: 700;
        }

        .hero-designer-note {
            font-size: 0.86rem;
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .hero-judges-title {
            font-size: clamp(1.4rem, 2.8vw, 2.1rem);
            font-weight: 800;
            line-height: 1.2;
            color: #FFFFFF;
            letter-spacing: -0.02em;
        }

        /* Circular Highlight around "cover..." exactly like screenshot */
        .hand-drawn-circle {
            position: relative;
            display: inline-block;
            color: var(--accent-bright);
            padding: 0 8px;
        }

        .hand-drawn-circle::after {
            content: '';
            position: absolute;
            inset: -4px -6px;
            border: 2px solid rgba(192, 132, 252, 0.7);
            border-radius: 50% 45% 55% 48% / 48% 52% 48% 52%;
            transform: rotate(-2deg);
            pointer-events: none;
            box-shadow: 0 0 12px rgba(168, 85, 247, 0.4);
        }

        .hero-sub-judge {
            font-size: 0.76rem;
            color: var(--text-muted);
            margin-top: 4px;
            font-style: italic;
        }

        /* Software Engineer Bold Title & Subhead */
        .hero-main-title {
            font-size: clamp(2.4rem, 4.8vw, 3.6rem);
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 1.15;
            margin-bottom: 12px;
            color: #FFFFFF;
        }

        .cursor-blink {
            display: inline-block;
            color: var(--accent-violet);
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            from, to { opacity: 1; }
            50% { opacity: 0; }
        }

        .hero-status-subhead {
            font-size: 0.96rem;
            color: var(--text-secondary);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .status-dot-blue {
            width: 8px;
            height: 8px;
            background: #3B82F6;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px #3B82F6;
        }

        .company-highlight {
            color: #60A5FA;
            font-weight: 700;
        }

        .hero-narrative-bio {
            font-size: 1.05rem;
            color: var(--text-secondary);
            line-height: 1.72;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .hero-narrative-bio strong {
            color: #FFFFFF;
            font-weight: 700;
        }

        /* Metric Counters Strip */
        .metrics-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 34px;
            padding: 18px 22px;
            background: rgba(22, 14, 38, 0.7);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            backdrop-filter: blur(16px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.08);
        }

        .metric-item {
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(168, 85, 247, 0.15);
            padding-right: 10px;
        }

        .metric-item:last-child {
            border-right: none;
            padding-right: 0;
        }

        .metric-value {
            font-family: var(--font-mono);
            font-size: 1.75rem;
            font-weight: 800;
            color: #FFFFFF;
            background: linear-gradient(135deg, #FFFFFF, var(--accent-bright));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.1;
            margin-bottom: 3px;
        }

        .metric-title {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .hero-actions-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-purple-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 12px 24px;
            border-radius: var(--radius-full);
            font-size: 0.92rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 4px 22px rgba(124, 58, 237, 0.5);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-purple-pill:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(168, 85, 247, 0.7);
            filter: brightness(1.1);
        }

        .btn-frosted-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
            color: #FFFFFF;
            padding: 12px 22px;
            border-radius: var(--radius-full);
            font-size: 0.92rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-frosted-pill:hover {
            background: rgba(168, 85, 247, 0.2);
            border-color: var(--accent-violet);
            transform: translateY(-2px);
        }

        /* Right Hero Column: Interactive Cosmic Orbital Hub */
        .cosmic-orbital-hub {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .team-pitch-quote {
            font-size: 0.95rem;
            color: var(--text-secondary);
            margin-bottom: 22px;
            max-width: 440px;
            line-height: 1.55;
        }

        .team-pitch-quote span {
            color: var(--accent-bright);
            font-weight: 700;
        }

        /* Orbiting Tech Icons Row */
        .tech-icons-orbit-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .tech-icon-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(26, 17, 44, 0.85);
            border: 1px solid rgba(168, 85, 247, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .tech-icon-circle:hover {
            transform: translateY(-3px) scale(1.1);
            border-color: var(--accent-bright);
        }

        /* Cosmic Planetary Center Shield */
        .orbit-system-wrap {
            position: relative;
            width: 320px;
            height: 240px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .orbit-ring {
            position: absolute;
            border: 1px dashed rgba(168, 85, 247, 0.35);
            border-radius: 50%;
            transform: rotateX(65deg);
        }

        .ring-1 { width: 310px; height: 310px; animation: spinOrbit 30s linear infinite; }
        .ring-2 { width: 230px; height: 230px; border-color: rgba(192, 132, 252, 0.25); animation: spinOrbit 22s linear infinite reverse; }

        @keyframes spinOrbit {
            from { transform: rotateX(65deg) rotateZ(0deg); }
            to { transform: rotateX(65deg) rotateZ(360deg); }
        }

        .center-monogram-shield {
            position: relative;
            z-index: 5;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #9D4EDD 0%, #581C87 70%, #240046 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 50px rgba(168, 85, 247, 0.65), inset 0 2px 4px rgba(255, 255, 255, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.25);
        }

        .shield-symbol {
            font-size: 2.2rem;
            font-weight: 300;
            color: #FFFFFF;
            font-family: serif;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        /* Dropper / Wand 3D element from screenshot */
        .wand-dropper-art {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 2.4rem;
            filter: drop-shadow(0 10px 20px rgba(157, 78, 221, 0.6));
            transform: rotate(-35deg);
            animation: floatWand 4s ease-in-out infinite alternate;
        }

        @keyframes floatWand {
            0% { transform: rotate(-35deg) translateY(0); }
            100% { transform: rotate(-30deg) translateY(-10px); }
        }

        /* macOS Terminal Window */
        .terminal-window {
            margin-top: 24px;
            background: rgba(14, 10, 24, 0.88);
            border: 1px solid rgba(168, 85, 247, 0.28);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7), var(--glow-purple-sm);
            overflow: hidden;
            font-family: var(--font-mono);
            text-align: left;
            width: 100%;
            max-width: 440px;
        }

        .terminal-header {
            background: rgba(22, 14, 36, 0.95);
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(168, 85, 247, 0.15);
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
            font-size: 0.76rem;
            color: var(--text-muted);
        }

        .terminal-copy-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            font-size: 0.74rem;
            font-family: var(--font-mono);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s;
        }

        .terminal-copy-btn:hover {
            color: var(--accent-bright);
        }

        .terminal-body {
            padding: 16px 18px;
            font-size: 0.82rem;
            line-height: 1.65;
            color: #E2E8F0;
            overflow-x: auto;
        }

        .code-keyword { color: #F43F5E; }
        .code-var { color: var(--accent-cyan); }
        .code-property { color: var(--accent-glow); }
        .code-string { color: #34D399; }
        .code-number { color: #FBBF24; }
        .code-comment { color: #64748B; font-style: italic; }

        /* ==========================================================================
           SECTION 2: WORK EXPERIENCE (2x2 GRID MATCHING SCREENSHOT EXACTLY)
           ========================================================================== */
        .section-wrap {
            padding: 80px 0;
            position: relative;
        }

        .section-title-large {
            font-size: clamp(2rem, 3.6vw, 2.75rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #FFFFFF;
            margin-bottom: 36px;
        }

        .experience-screenshot-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        /* 2x2 Glass Card Matching Screenshot */
        .cib-experience-card {
            background: linear-gradient(145deg, rgba(28, 18, 48, 0.65) 0%, rgba(18, 12, 32, 0.85) 100%);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 28px 28px 24px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 220px;
            backdrop-filter: blur(16px);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .cib-experience-card::before {
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

        .cib-experience-card:hover {
            border-color: rgba(192, 132, 252, 0.55);
            transform: translateY(-4px);
            box-shadow: 0 16px 45px rgba(0, 0, 0, 0.6), var(--glow-purple-sm);
        }

        .cib-experience-card:hover::before {
            opacity: 1;
        }

        .cib-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 14px;
        }

        .cib-card-text {
            flex: 1;
        }

        .cib-card-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #FFFFFF;
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .cib-card-org {
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--accent-bright);
            margin-bottom: 6px;
        }

        .cib-card-desc {
            font-size: 0.88rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .cib-card-desc strong {
            color: #FFFFFF;
        }

        /* 3D Visual Icon Element (Star Ribbon, Glow Bulb, Coffee Mug, Rocket) */
        .cib-3d-visual {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: radial-gradient(circle at 35% 35%, rgba(168, 85, 247, 0.35) 0%, rgba(20, 13, 34, 0.8) 100%);
            border: 1px solid rgba(192, 132, 252, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.9rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .cib-experience-card:hover .cib-3d-visual {
            transform: scale(1.1) rotate(6deg);
        }

        .cib-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid rgba(168, 85, 247, 0.12);
        }

        .cib-card-time {
            font-family: var(--font-mono);
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        /* LEARN MORE pill button exactly matching screenshot */
        .btn-learn-more-pill {
            background: rgba(124, 58, 237, 0.15);
            border: 1px solid rgba(168, 85, 247, 0.45);
            color: var(--accent-bright);
            padding: 5px 16px;
            border-radius: var(--radius-full);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-learn-more-pill:hover {
            background: var(--accent-violet);
            color: #FFFFFF;
            border-color: var(--accent-violet);
            box-shadow: 0 0 15px rgba(168, 85, 247, 0.5);
        }

        /* ==========================================================================
           FEATURED PROJECTS (MATCHING SCREENSHOT WIREFRAME MOCKUP LAYOUT)
           ========================================================================== */
        .featured-project-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 360px), 1fr));
            gap: 28px;
        }

        .mockup-project-card {
            background: linear-gradient(145deg, rgba(26, 17, 44, 0.7) 0%, rgba(16, 10, 28, 0.9) 100%);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            backdrop-filter: blur(16px);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
        }

        .mockup-project-card:hover {
            border-color: rgba(192, 132, 252, 0.6);
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), var(--glow-purple-sm);
        }

        /* Tilted UI Wireframe Box matching screenshot bottom-right */
        .project-wireframe-box {
            background: rgba(10, 6, 18, 0.9);
            border: 1px solid rgba(168, 85, 247, 0.25);
            border-radius: var(--radius-sm);
            padding: 16px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 8px;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.6);
        }

        .wireframe-header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding-bottom: 8px;
        }

        .wireframe-logo-pill {
            font-family: var(--font-mono);
            font-size: 0.7rem;
            color: var(--accent-bright);
            background: rgba(168, 85, 247, 0.15);
            padding: 2px 8px;
            border-radius: 4px;
        }

        .wireframe-status-tag {
            font-family: var(--font-mono);
            font-size: 0.68rem;
            color: var(--accent-green);
            background: rgba(16, 185, 129, 0.12);
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
        }

        .wireframe-sketch-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 8px;
            opacity: 0.75;
        }

        .wireframe-block {
            height: 38px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px dashed rgba(168, 85, 247, 0.3);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.68rem;
            font-family: var(--font-mono);
            color: var(--text-muted);
        }

        .project-tag-pill {
            font-family: var(--font-mono);
            font-size: 0.72rem;
            color: var(--accent-bright);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
            display: block;
        }

        .mockup-project-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: #FFFFFF;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .mockup-project-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 20px;
            flex: 1;
        }

        .project-stack-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 20px;
        }

        .stack-pill {
            font-family: var(--font-mono);
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--accent-bright);
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.25);
            padding: 3px 10px;
            border-radius: 6px;
        }

        .project-action-btn {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.86rem;
            font-weight: 700;
            color: #FFFFFF;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-card);
            padding: 10px 18px;
            border-radius: var(--radius-full);
            transition: all 0.2s ease;
            width: fit-content;
        }

        .project-action-btn:hover {
            background: var(--accent-violet);
            border-color: var(--accent-violet);
            box-shadow: 0 0 18px rgba(168, 85, 247, 0.45);
        }

        /* ==========================================================================
           CORE TECHNICAL SKILLS
           ========================================================================== */
        .skills-filter-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 32px;
        }

        .skill-filter-btn {
            background: rgba(22, 14, 38, 0.7);
            border: 1px solid var(--border-card);
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
            color: #FFFFFF;
            border-color: var(--accent-violet);
        }

        .skill-filter-btn.active {
            background: rgba(168, 85, 247, 0.25);
            border-color: var(--accent-bright);
            color: #FFFFFF;
            box-shadow: 0 0 16px rgba(168, 85, 247, 0.35);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 340px), 1fr));
            gap: 22px;
        }

        .skill-card {
            background: linear-gradient(145deg, rgba(26, 17, 44, 0.65) 0%, rgba(16, 10, 28, 0.85) 100%);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 24px;
            display: flex;
            flex-direction: column;
            backdrop-filter: blur(14px);
            transition: all 0.25s ease;
        }

        .skill-card:hover {
            border-color: rgba(192, 132, 252, 0.5);
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5), var(--glow-purple-sm);
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
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(168, 85, 247, 0.25);
        }

        .skill-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #FFFFFF;
        }

        .skill-category {
            font-size: 0.72rem;
            color: var(--text-muted);
            text-transform: uppercase;
            font-family: var(--font-mono);
        }

        .skill-pct {
            font-family: var(--font-mono);
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--accent-bright);
        }

        .meter-track {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-full);
            overflow: hidden;
            margin-bottom: 14px;
        }

        .meter-fill {
            height: 100%;
            width: var(--progress, 80%);
            background: linear-gradient(90deg, #7C3AED, #C084FC);
            border-radius: var(--radius-full);
        }

        .skill-info {
            font-size: 0.88rem;
            color: var(--text-secondary);
            line-height: 1.6;
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
            font-weight: 600;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-card);
            color: var(--text-secondary);
            padding: 3px 8px;
            border-radius: 6px;
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
            background: linear-gradient(145deg, rgba(26, 17, 44, 0.65) 0%, rgba(16, 10, 28, 0.85) 100%);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
        }

        .edu-card:hover {
            border-color: rgba(192, 132, 252, 0.45);
            transform: translateY(-3px);
        }

        .edu-level {
            font-family: var(--font-mono);
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--accent-bright);
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .edu-degree {
            font-size: 1.15rem;
            font-weight: 800;
            color: #FFFFFF;
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
            border-top: 1px solid rgba(168, 85, 247, 0.12);
            padding-top: 12px;
        }

        .score-pill {
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: #34D399;
            padding: 3px 10px;
            border-radius: 6px;
            font-weight: 700;
        }

        /* ==========================================================================
           CONTACT & DIRECT FOUNDER DESK
           ========================================================================== */
        .contact-box {
            background: linear-gradient(135deg, rgba(26, 17, 44, 0.95) 0%, rgba(14, 9, 24, 0.98) 100%);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-lg);
            padding: clamp(32px, 5vw, 64px);
            text-align: center;
            max-width: 920px;
            margin: 0 auto;
            box-shadow: var(--glow-purple-sm);
            position: relative;
        }

        .contact-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 14px;
            color: #FFFFFF;
        }

        .contact-subtitle {
            font-size: 1.08rem;
            color: var(--text-secondary);
            max-width: 660px;
            margin: 0 auto 36px;
            line-height: 1.7;
        }

        /* Direct Official Resume Download Banner */
        .resume-download-banner {
            max-width: 760px;
            margin: 0 auto 32px;
            background: linear-gradient(135deg, rgba(32, 20, 56, 0.9) 0%, rgba(18, 11, 32, 0.95) 100%);
            border: 1px solid rgba(192, 132, 252, 0.4);
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
            color: var(--accent-bright);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .resume-banner-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #FFFFFF;
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
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            padding: 11px 20px;
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(124, 58, 237, 0.5);
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-download-cv:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(168, 85, 247, 0.7);
            filter: brightness(1.1);
        }

        .btn-view-cv {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-secondary);
            border: 1px solid var(--border-card);
            padding: 11px 16px;
            border-radius: var(--radius-full);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-view-cv:hover {
            color: #FFFFFF;
            border-color: var(--accent-violet);
            background: rgba(168, 85, 247, 0.15);
        }

        /* Interactive Contact Form */
        .portfolio-contact-form {
            text-align: left;
            margin: 0 auto 36px;
            max-width: 760px;
            background: rgba(18, 11, 32, 0.75);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-md);
            padding: clamp(22px, 4vw, 38px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5);
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
            color: #F43F5E;
            margin-left: 2px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: #110A1E;
            border: 1.5px solid var(--border-card);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            color: #FFFFFF;
            font-family: var(--font-sans);
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--accent-violet);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.25);
            background: #170E28;
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
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: none;
            border-radius: var(--radius-full);
            padding: 15px 24px;
            font-family: var(--font-sans);
            font-size: 1rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 4px 22px rgba(124, 58, 237, 0.55);
            transition: all 0.2s ease;
        }

        .btn-submit-contact:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px rgba(168, 85, 247, 0.75);
            filter: brightness(1.1);
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
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.45);
            color: #34D399;
        }

        .form-status-alert.error {
            display: block;
            background: rgba(244, 63, 94, 0.15);
            border: 1px solid rgba(244, 63, 94, 0.45);
            color: #FB7185;
        }

        .form-topic-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .form-topic-chip {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
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
            background: rgba(168, 85, 247, 0.2);
            border-color: var(--accent-violet);
            color: #FFFFFF;
        }

        .form-topic-chip.active {
            background: rgba(168, 85, 247, 0.35);
            border-color: var(--accent-bright);
            color: #FFFFFF;
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
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-card);
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
            color: #FFFFFF;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .btn-action-sm {
            background: rgba(168, 85, 247, 0.12);
            border: 1px solid var(--border-card);
            color: var(--accent-bright);
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: 0.8rem;
            font-weight: 700;
            font-family: var(--font-mono);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-action-sm:hover {
            background: var(--accent-violet);
            color: #FFFFFF;
            border-color: var(--accent-violet);
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
            color: var(--accent-bright);
        }

        /* ==========================================================================
           FOOTER
           ========================================================================== */
        .dev-footer {
            border-top: 1px solid var(--border-subtle);
            padding: 34px 0;
            background: var(--bg-deep);
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
            background: rgba(7, 5, 12, 0.88);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
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
            background: linear-gradient(145deg, rgba(28, 18, 48, 0.98) 0%, rgba(14, 9, 24, 0.99) 100%);
            border: 1px solid rgba(192, 132, 252, 0.5);
            border-radius: var(--radius-lg);
            max-width: 530px;
            width: 100%;
            padding: 30px 32px;
            box-shadow: 0 25px 65px rgba(0, 0, 0, 0.8), var(--glow-purple-sm);
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
            border: 1px solid var(--border-card);
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
            background: rgba(244, 63, 94, 0.2);
            border-color: rgba(244, 63, 94, 0.5);
            color: #FB7185;
            transform: rotate(90deg);
        }

        .modal-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(168, 85, 247, 0.15);
            border: 1px solid rgba(192, 132, 252, 0.35);
            color: var(--accent-bright);
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
            color: #FFFFFF;
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
            border-top: 1px solid rgba(168, 85, 247, 0.15);
            font-size: 0.84rem;
            color: var(--text-muted);
            flex-wrap: wrap;
            gap: 8px;
        }

        .modal-direct-link {
            color: var(--accent-bright);
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
            padding: 12px 22px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: var(--radius-full);
            box-shadow: 0 8px 32px rgba(124, 58, 237, 0.55), 0 0 24px rgba(168, 85, 247, 0.45);
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
            box-shadow: 0 12px 42px rgba(124, 58, 237, 0.75), 0 0 35px rgba(168, 85, 247, 0.6);
            filter: brightness(1.1);
        }

        .ai-launcher-pulse {
            position: relative;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #34D399;
        }

        .ai-launcher-pulse::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background-color: #34D399;
            opacity: 0.6;
            animation: pulseRing 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes pulseRing {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(2.6); opacity: 0; }
        }

        .ai-launcher-badge {
            background: rgba(0, 0, 0, 0.35);
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #F3E8FF;
            border: 1px solid rgba(255, 255, 255, 0.2);
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
            background: linear-gradient(180deg, rgba(28, 18, 48, 0.98) 0%, rgba(14, 9, 24, 0.99) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(192, 132, 252, 0.45);
            border-radius: 22px;
            box-shadow: 0 25px 65px rgba(0, 0, 0, 0.8), var(--glow-purple-sm);
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
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.25) 0%, rgba(168, 85, 247, 0.2) 100%);
            border-bottom: 1px solid rgba(168, 85, 247, 0.15);
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
            background: linear-gradient(135deg, #7C3AED, #C084FC);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            box-shadow: 0 0 16px rgba(168, 85, 247, 0.5);
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
            color: var(--accent-bright);
            margin: 2px 0 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .ai-chat-close-btn {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-card);
            color: #CBD5E1;
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
            border-bottom: 1px solid rgba(168, 85, 247, 0.12);
            background: rgba(14, 9, 24, 0.65);
            scrollbar-width: none;
        }
        .ai-chat-chips::-webkit-scrollbar {
            display: none;
        }

        .ai-chip {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-full);
            color: #E2E8F0;
            font-size: 0.74rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            user-select: none;
            flex-shrink: 0;
            font-family: var(--font-sans);
        }

        .ai-chip:hover {
            background: rgba(168, 85, 247, 0.2);
            border-color: var(--accent-bright);
            color: #FFFFFF;
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
            background: linear-gradient(135deg, #7C3AED, #A855F7);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.82rem;
            font-weight: 800;
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
            background: #1C122D;
            border: 1px solid rgba(168, 85, 247, 0.25);
            color: #E2E8F0;
            border-top-left-radius: 4px;
        }

        .ai-message-row.user .ai-message-bubble {
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: #FFFFFF;
            font-weight: 500;
            border-top-right-radius: 4px;
            box-shadow: 0 4px 14px rgba(124, 58, 237, 0.4);
        }

        .ai-message-bubble strong {
            color: var(--accent-bright);
        }

        .ai-message-bubble a {
            color: var(--accent-bright);
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
            background-color: var(--accent-bright);
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
            border-top: 1px solid rgba(168, 85, 247, 0.15);
            background: rgba(18, 11, 32, 0.95);
        }

        .ai-chat-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .ai-chat-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-card);
            border-radius: var(--radius-full);
            color: #F8FAFC;
            padding: 10px 16px;
            font-size: 0.88rem;
            font-family: var(--font-sans);
            outline: none;
            transition: border-color 0.2s;
        }

        .ai-chat-input:focus {
            border-color: var(--accent-violet);
            box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.25);
        }

        .ai-chat-send-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7C3AED, #A855F7);
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
            box-shadow: 0 0 16px rgba(168, 85, 247, 0.6);
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
            color: #8E8A9E;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        /* ==========================================================================
           RESPONSIVE BREAKPOINTS
           ========================================================================== */
        @media (max-width: 960px) {
            .hero-wrapper {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .experience-screenshot-grid {
                grid-template-columns: 1fr;
            }
            .metrics-strip {
                grid-template-columns: repeat(2, 1fr);
            }
            .nav-center-menu {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 0 18px !important;
            }
            .dev-navbar {
                padding: 16px 0;
            }
            .btn-nav-resume {
                display: none;
            }
            .btn-nav-primary {
                padding: 7px 14px;
                font-size: 0.8rem;
            }
            .hero-avatar-quote-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
            .hero-main-title {
                font-size: 2.1rem;
            }
            .hero-narrative-bio {
                font-size: 0.96rem;
            }
            .metrics-strip {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
                padding: 14px;
            }
            .metric-value {
                font-size: 1.45rem;
            }
            .hero-actions-row {
                flex-direction: column;
                align-items: stretch;
            }
            .hero-actions-row a, .hero-actions-row button {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
            .experience-screenshot-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .cib-experience-card {
                padding: 20px 18px;
            }
            .cib-3d-visual {
                width: 48px;
                height: 48px;
                font-size: 1.6rem;
            }
            .resume-download-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }
            .resume-banner-actions {
                width: 100%;
                flex-direction: column;
            }
            .btn-download-cv, .btn-view-cv {
                width: 100%;
                justify-content: center;
            }
            .form-grid-2 {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .form-input, .form-select, .form-textarea {
                font-size: 16px !important;
            }
            .ai-launcher-btn {
                bottom: 16px !important;
                right: 14px !important;
                padding: 10px 16px !important;
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
    <!-- Ambient Purple Aurora Lighting Mesh -->
    <div class="ambient-purple-mesh" aria-hidden="true">
        <div class="purple-orb-1"></div>
        <div class="purple-orb-2"></div>
        <div class="purple-orb-3"></div>
    </div>
    <div class="grid-pattern-overlay" aria-hidden="true"></div>

    <!-- Top Minimalist Monogram Navigation -->
    <header class="dev-navbar">
        <div class="container nav-inner">
            <a href="{{ route('portfolio') }}" class="nav-brand">
                <span class="brand-monogram-symbol">Σ</span>
                <span class="nav-brand-title">Maayank<span>.dev</span></span>
            </a>

            <ul class="nav-center-menu">
                <li><a href="#about" class="nav-center-link active">Home</a></li>
                <li><a href="#experience" class="nav-center-link">About</a></li>
                <li><a href="#projects" class="nav-center-link">Lab</a></li>
                <li><a href="#skills" class="nav-center-link">Skills</a></li>
                <li><a href="#contact" class="nav-center-link">Contact</a></li>
            </ul>

            <div class="nav-actions">
                <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-nav-resume" title="Download Official CV (PDF)">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Download CV</span>
                </a>
                <button type="button" class="btn-nav-primary" onclick="window.openModal()">
                    <span>Get in Touch ✦</span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section: Matching Screenshot Avatar + Quote Layout -->
        <section class="hero-section" id="about">
            <div class="container">
                <div class="hero-wrapper">
                    <!-- Left Hero: Avatar + Hand-drawn Quote + Bio -->
                    <div>
                        <!-- Avatar & Hand-drawn Hook Row (Exactly as in screenshot) -->
                        <div class="hero-avatar-quote-row">
                            <div class="avatar-glow-wrap">
                                <div class="avatar-glow-backdrop"></div>
                                <div class="avatar-art">
                                    <span class="avatar-emoji-icon" aria-label="Maayank Developer Memoji">👨🏻‍💻</span>
                                </div>
                            </div>
                            <div class="hero-quote-box">
                                <div class="hero-handwritten-hello">
                                    Hello! I Am <span>Maayank Malhotra</span> ✍️
                                </div>
                                <div class="hero-designer-note">A Designer &amp; Engineer who</div>
                                <h2 class="hero-judges-title">
                                    Judges a book<br>
                                    by its <span class="hand-drawn-circle">cover...</span>
                                </h2>
                                <div class="hero-sub-judge">Because if the code &amp; UI does not impress you, what else can?</div>
                            </div>
                        </div>

                        <!-- Main Big Statement -->
                        <h1 class="hero-main-title">
                            I'm a Software Engineer<span class="cursor-blink">.</span>
                        </h1>

                        <!-- Status Subtitle with Blue Pulse Dot -->
                        <div class="hero-status-subhead">
                            <span class="status-dot-blue"></span>
                            <span>Currently, <strong>FULL STACK SOFTWARE ENGINEER • FOUNDER @ TABSTICK</strong></span>
                            <span style="color: var(--accent-bright); font-family: var(--font-mono); font-size: 0.85rem;">• 📍 DELHI NCR, INDIA</span>
                        </div>

                        <!-- Narrative Bio -->
                        <p class="hero-narrative-bio">
                            A full-stack software engineer &amp; distributed systems architect (also known as <strong>Mayank Malhotra</strong>) functioning in the industry for <strong>4+ years</strong> now. I make meaningful and high-throughput digital products handling <strong>1.5M+ monthly transactions</strong> that create an equilibrium between user needs and business goals.
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

                        <!-- Hero Actions -->
                        <div class="hero-actions-row">
                            <a href="{{ route('portfolio.resume') }}" download="Maayank_Malhotra_Resume.pdf" class="btn-purple-pill" title="Download Official CV (PDF)">
                                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                <span>Download Official CV</span>
                            </a>
                            <button type="button" id="hero-open-ai-chat" class="btn-frosted-pill" title="Chat with Maayank's AI Career Assistant (Google Gemini 3.6 Flash)">
                                <span>✨ Ask My AI (Gemini 3.6)</span>
                            </button>
                            <a href="#experience" class="btn-frosted-pill">
                                <span>⚡ View Experience</span>
                            </a>
                            <a href="#projects" class="btn-frosted-pill">
                                <span>🚀 Explore Lab (7)</span>
                            </a>
                            <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener noreferrer" class="btn-frosted-pill">
                                <span>LinkedIn ↗</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Hero: Cosmic Orbital Hub with Planetary Monogram -->
                    <div class="cosmic-orbital-hub">
                        <div class="team-pitch-quote">
                            I'm currently looking to join a <span>cross-functional team</span> that values improving people's lives through accessible engineering &amp; scalable architecture.
                        </div>

                        <!-- Orbiting Tech Circles -->
                        <div class="tech-icons-orbit-row">
                            <div class="tech-icon-circle" title="React.js">⚛️</div>
                            <div class="tech-icon-circle" title="Node.js">🟢</div>
                            <div class="tech-icon-circle" title="PHP / Laravel">🐘</div>
                            <div class="tech-icon-circle" title="TypeScript">📜</div>
                            <div class="tech-icon-circle" title="Docker">🐳</div>
                            <div class="tech-icon-circle" title="AWS Cloud">☁️</div>
                            <div class="tech-icon-circle" title="WebRTC">📡</div>
                            <div class="tech-icon-circle" title="MongoDB">🍃</div>
                        </div>

                        <!-- Cosmic Planetary Monogram Center with Wand -->
                        <div class="orbit-system-wrap">
                            <div class="orbit-ring ring-1"></div>
                            <div class="orbit-ring ring-2"></div>
                            <div class="center-monogram-shield">
                                <span class="shield-symbol">Σ</span>
                            </div>
                            <span class="wand-dropper-art" aria-hidden="true">🪄</span>
                        </div>

                        <!-- Interactive Terminal Window -->
                        <div class="terminal-window">
                            <div class="terminal-header">
                                <div class="terminal-dots">
                                    <div class="terminal-dot dot-red"></div>
                                    <div class="terminal-dot dot-yellow"></div>
                                    <div class="terminal-dot dot-green"></div>
                                </div>
                                <div class="terminal-title">maayank.config.ts</div>
                                <button type="button" class="terminal-copy-btn" onclick="copyTerminalCode(this)">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    <span>Copy</span>
                                </button>
                            </div>
                            <div class="terminal-body">
<pre id="terminal-code-snippet"><code><span class="code-comment">// Full Stack Engineer &amp; Founder</span>
<span class="code-keyword">export const</span> <span class="code-var">engineer</span> = {
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

        <!-- Work Experience (Exact 2x2 Glass Cards Layout from Screenshot) -->
        <section class="section-wrap" id="experience">
            <div class="container">
                <h2 class="section-title-large">Work Experience</h2>

                <div class="experience-screenshot-grid">
                    <!-- Experience 1: Thinktail Global -->
                    <div class="cib-experience-card">
                        <div class="cib-card-top">
                            <div class="cib-card-text">
                                <h3 class="cib-card-title">Software Engineer</h3>
                                <div class="cib-card-org">Thinktail Global Pvt. Ltd.</div>
                                <p class="cib-card-desc">
                                    Lead full-stack module architecture with <strong>React.js &amp; Node.js</strong>, driving high-throughput analytics, automation features, structured code reviews, and cross-functional delivery.
                                </p>
                            </div>
                            <div class="cib-3d-visual" title="Engineering Leadership">
                                <span>🏅</span>
                            </div>
                        </div>
                        <div class="cib-card-footer">
                            <span class="cib-card-time">Aug 2025 – Present</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 2: Cracode Consulting -->
                    <div class="cib-experience-card">
                        <div class="cib-card-top">
                            <div class="cib-card-text">
                                <h3 class="cib-card-title">Software Engineer</h3>
                                <div class="cib-card-org">Cracode Consulting Pvt. Ltd.</div>
                                <p class="cib-card-desc">
                                    Built and maintained enterprise <strong>Laravel + React.js</strong> applications, deploying and scaling high-availability REST APIs handling <strong>1.5M+ transactions per month</strong> under live load.
                                </p>
                            </div>
                            <div class="cib-3d-visual" title="High Scale Systems">
                                <span>💡</span>
                            </div>
                        </div>
                        <div class="cib-card-footer">
                            <span class="cib-card-time">Aug 2024 – Aug 2025</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 3: Henry Harvin -->
                    <div class="cib-experience-card">
                        <div class="cib-card-top">
                            <div class="cib-card-text">
                                <h3 class="cib-card-title">Software Engineer</h3>
                                <div class="cib-card-org">Henry Harvin</div>
                                <p class="cib-card-desc">
                                    Optimized platform performance by <strong>20% through backend tuning</strong> and caching, scaling microservices to <strong>1M+ monthly API calls</strong>, and engineered APIs for <strong>ICICI Lombard</strong> &amp; <strong>Ninja CRM</strong>.
                                </p>
                            </div>
                            <div class="cib-3d-visual" title="API Engineering">
                                <span>☕</span>
                            </div>
                        </div>
                        <div class="cib-card-footer">
                            <span class="cib-card-time">Jan 2023 – Aug 2024</span>
                            <a href="#contact" class="btn-learn-more-pill" onclick="window.openModal()">LEARN MORE</a>
                        </div>
                    </div>

                    <!-- Experience 4: Tabstick (Founder Desk) -->
                    <div class="cib-experience-card">
                        <div class="cib-card-top">
                            <div class="cib-card-text">
                                <h3 class="cib-card-title">Founder &amp; Architect</h3>
                                <div class="cib-card-org">Tabstick (tabstick.in)</div>
                                <p class="cib-card-desc">
                                    Bootstrapped and architected an e-commerce platform cataloging 4,450+ die-cut stickers. Built with Laravel 11, Web Audio API synthesis, Razorpay gateway, and high-performance Caddy HTTP/2 infrastructure.
                                </p>
                            </div>
                            <div class="cib-3d-visual" title="Founder & Innovation">
                                <span>🚀</span>
                            </div>
                        </div>
                        <div class="cib-card-footer">
                            <span class="cib-card-time">Live Production</span>
                            <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="btn-learn-more-pill">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Projects Showcase (Matching Screenshot Wireframe Card Style) -->
        <section class="section-wrap" id="projects">
            <div class="container">
                <h2 class="section-title-large">Featured Projects</h2>

                <div class="featured-project-container">
                    <!-- Project 1: Tabstick -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">tabstick.in</span>
                                <span class="wireframe-status-tag">● LIVE PRODUCTION</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Catalog 4,450+ SKUs</div>
                                <div class="wireframe-block">Razorpay API</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">Tabstick – Creative Sticker E-Commerce Platform</h3>
                        <p class="mockup-project-desc">
                            Engineered an e-commerce platform cataloging 4,450+ die-cut vinyl stickers. Features real-time Razorpay checkout, Web Audio API sound synthesis, multi-resolution image processing, automated Google Shopping XML feeds, and SEO collection hubs.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">Laravel 11</span>
                            <span class="stack-pill">PHP 8.3</span>
                            <span class="stack-pill">MySQL</span>
                            <span class="stack-pill">Razorpay</span>
                            <span class="stack-pill">Caddy HTTP/2</span>
                        </div>
                        <a href="https://tabstick.in" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Visit tabstick.in ↗</span>
                        </a>
                    </article>

                    <!-- Project 2: Real-Time Audio/Video System -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">snoutiq.com</span>
                                <span class="wireframe-status-tag">● LIVE WEBRTC</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Peer-to-Peer Stream</div>
                                <div class="wireframe-block">Call Recording</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">Real-Time Audio/Video Communication System</h3>
                        <p class="mockup-project-desc">
                            Built a real-time, device-to-device communication system utilizing WebRTC and Socket.io. Features call recording, live chat, and multi-browser support — delivering low-latency media streams comparable to hardware sensor telemetry.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">PHP</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">WebRTC</span>
                            <span class="stack-pill">Socket.io</span>
                            <span class="stack-pill">Media Streams</span>
                        </div>
                        <a href="https://snoutiq.com" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Live: snoutiq.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 3: Enterprise CRM Engine -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">crm.henryharvin.com</span>
                                <span class="wireframe-status-tag">● LIVE ENTERPRISE</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Lead Dispatch Engine</div>
                                <div class="wireframe-block">Webhooks</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">Enterprise CRM &amp; Workflow Automation Engine</h3>
                        <p class="mockup-project-desc">
                            Developed an enterprise-grade CRM with automated lead tracking, sales pipeline management, task automation, and real-time analytical dashboards with automated email triggers and webhook notification pipelines.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">MERN Stack</span>
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">MongoDB</span>
                            <span class="stack-pill">Webhooks</span>
                        </div>
                        <a href="https://crm.henryharvin.com" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Live: crm.henryharvin.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 4: Jobrito -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">jobrito.com</span>
                                <span class="wireframe-status-tag">● AWS DEPLOYMENT</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Search &amp; Filters</div>
                                <div class="wireframe-block">Resume Parser</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">Jobrito – Scalable Job Search &amp; Hiring Platform</h3>
                        <p class="mockup-project-desc">
                            Built and deployed a full-featured job listing platform on AWS with Nginx and CI/CD automation. Features multi-faceted search filters, resume upload parsers, applicant management, and an administrative control panel.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">AWS EC2</span>
                            <span class="stack-pill">Nginx</span>
                            <span class="stack-pill">CI/CD</span>
                        </div>
                        <a href="https://jobrito.com" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Live: jobrito.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 5: RadiusLift SaaS -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">radiuslift.com</span>
                                <span class="wireframe-status-tag">● LIVE SAAS</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Billing Modules</div>
                                <div class="wireframe-block">Workflow Engine</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">RadiusLift – SaaS Workflow Automation Platform</h3>
                        <p class="mockup-project-desc">
                            Built core modules for a SaaS platform supporting business workflow automation and subscription-based service delivery, including third-party API integrations and admin management tooling.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">SaaS Billing</span>
                            <span class="stack-pill">REST APIs</span>
                        </div>
                        <a href="https://radiuslift.com" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Live: radiuslift.com ↗</span>
                        </a>
                    </article>

                    <!-- Project 6: Think Champ -->
                    <article class="mockup-project-card">
                        <div class="project-wireframe-box">
                            <div class="wireframe-header-bar">
                                <span class="wireframe-logo-pill">think-champ.com</span>
                                <span class="wireframe-status-tag">● WEB APP</span>
                            </div>
                            <div class="wireframe-sketch-grid">
                                <div class="wireframe-block">Custom UI Modules</div>
                                <div class="wireframe-block">REST APIs</div>
                            </div>
                        </div>
                        <span class="project-tag-pill">Featured Project</span>
                        <h3 class="mockup-project-name">Think Champ – Custom Enterprise Web App</h3>
                        <p class="mockup-project-desc">
                            Delivered a custom web application handling responsive UI development, backend API integration, and feature enhancements tailored to strict client specifications.
                        </p>
                        <div class="project-stack-row">
                            <span class="stack-pill">React.js</span>
                            <span class="stack-pill">Node.js</span>
                            <span class="stack-pill">UI Library</span>
                            <span class="stack-pill">REST APIs</span>
                        </div>
                        <a href="https://think-champ.com" target="_blank" rel="noopener noreferrer" class="project-action-btn">
                            <span>Live: think-champ.com ↗</span>
                        </a>
                    </article>
                </div>
            </div>
        </section>

        <!-- Technical Competencies & Skills Matrix -->
        <section class="section-wrap" id="skills">
            <div class="container">
                <h2 class="section-title-large">Core Technical Competencies</h2>

                <!-- Interactive Filters -->
                <div class="skills-filter-nav">
                    <button type="button" class="skill-filter-btn active" data-filter="all">⚡ All Skills</button>
                    <button type="button" class="skill-filter-btn" data-filter="backend">🛠️ Backend &amp; Architecture</button>
                    <button type="button" class="skill-filter-btn" data-filter="frontend">🎨 Frontend &amp; UI</button>
                    <button type="button" class="skill-filter-btn" data-filter="cloud">☁️ Cloud, DevOps &amp; DB</button>
                    <button type="button" class="skill-filter-btn" data-filter="realtime">📡 Real-Time &amp; Media</button>
                    <button type="button" class="skill-filter-btn" data-filter="leadership">👥 Leadership &amp; Delivery</button>
                </div>

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

        <!-- Education & Credentials -->
        <section class="section-wrap" id="education">
            <div class="container">
                <h2 class="section-title-large">Education &amp; Qualifications</h2>

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
                                <label for="contact-email" class="form-label">Your Email <span class="req">*</span> <small style="color:var(--accent-bright);font-weight:normal;text-transform:none;">(Resume sent here)</small></label>
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
                                <span style="font-size:0.75rem; color:var(--accent-bright); font-family:var(--font-mono);">⚡ Pre-filled for 1-click send</span>
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
                <span class="status-pulse" style="width:6px; height:6px; background:var(--accent-bright);"></span>
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
                    <label for="modal-email" class="form-label" style="font-size: 0.78rem;">Your Email <span class="req">*</span> <small style="color:var(--accent-bright);text-transform:none;">(Resume sent here)</small></label>
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
                        <span style="width:6px;height:6px;background:#34D399;border-radius:50%;display:inline-block;"></span>
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

        // Copy Email Helper
        function copyEmail(btn) {
            navigator.clipboard.writeText('maayankmalhotra095@gmail.com').then(() => {
                const prev = btn.innerHTML;
                btn.innerHTML = '<span>✓ Copied!</span>';
                btn.style.background = '#A855F7';
                btn.style.color = '#FFFFFF';
                btn.style.borderColor = '#A855F7';
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
            formatted = formatted.replace(/(?:^|\n)#{1,3}\s+(.*?)(?=\n|$)/g, '<div style="font-weight:700; font-size:0.92rem; margin:8px 0 4px 0; color:#C084FC;">$1</div>');
            formatted = formatted.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            formatted = formatted.replace(/(?:^|\n)[\*\-]\s+(.*?)(?=\n|$)/g, '<div style="margin: 4px 0 4px 8px; display:flex; gap:8px; align-items:flex-start;"><span style="color:#C084FC; font-weight:bold; line-height:1.4;">•</span><span style="flex:1;">$1</span></div>');
            formatted = formatted.replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer" style="color:#C084FC; text-decoration:underline;">$1</a>');
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
