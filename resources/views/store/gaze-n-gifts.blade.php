<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Graze &amp; Gift Co. — Luxury Grazing Tables &amp; Custom Gifts | Oakville &amp; GTA</title>
    <meta name="description" content="Graze &amp; Gift Co. creates luxury grazing tables, Indo-Fusion high tea, charcuterie cups, and custom gift boxes for birthdays, baby showers, and corporate events in Oakville &amp; the GTA.">
    <meta name="keywords" content="grazing table Oakville,charcuterie board GTA,Indo-fusion high tea,custom gift boxes Oakville,luxury grazing Mississauga,Graze and Gift Co">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/gaze-n-gifts') }}">
    <link rel="icon" href="{{ asset('graze-assets/graze_n_gifts_logo.jpg') }}" type="image/jpeg">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Social Meta -->
    <meta property="og:title" content="Graze &amp; Gift Co. — Luxury Grazing Tables &amp; Custom Gifts">
    <meta property="og:description" content="Luxury grazing tables, Indo-Fusion high tea, charcuterie cups &amp; custom gift boxes. Serving Oakville &amp; the GTA.">
    <meta property="og:url" content="{{ url('/gaze-n-gifts') }}">
    <meta property="og:site_name" content="Graze &amp; Gift Co.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('graze-assets/images/grazing%20table_1.jpeg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        parchment: '#FBF9F4',
                        surface: '#FFFFFF',
                        espresso: '#3A2F2B',
                        taupe: '#C9A68F',
                        'body-mid': '#6B5C55',
                        muted: '#999999',
                        divider: '#DDD5CC',
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    },
                    letterSpacing: {
                        widest2: '0.2em',
                    }
                }
            }
        };
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background: #FBF9F4;
            color: #3A2F2B;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        body::-webkit-scrollbar, html::-webkit-scrollbar {
            display: none;
        }
        body, html {
            scrollbar-width: none;
        }
        .eyebrow {
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #C9A68F;
            margin-bottom: 14px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 700;
            display: block;
        }
        .section-heading {
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 16px;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: clamp(34px, 5vw, 54px);
            font-weight: 600;
            line-height: 1.1;
        }
        .taupe-rule {
            background: #C9A68F;
            width: 32px;
            height: 1px;
            margin-bottom: 28px;
        }
        .btn-taupe {
            color: #FBF9F4;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            cursor: pointer;
            background: #C9A68F;
            border: none;
            border-radius: 6px;
            padding: 16px 36px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: opacity 0.15s;
            display: inline-block;
        }
        .btn-taupe:hover {
            opacity: 0.85;
        }
        .btn-outline {
            color: #3A2F2B;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            cursor: pointer;
            background: transparent;
            border: 1px solid #3A2F2B;
            border-radius: 6px;
            padding: 15px 36px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
            display: inline-block;
        }
        .btn-outline:hover {
            color: #FBF9F4;
            background: #3A2F2B;
        }
        .btn-espresso {
            color: #FBF9F4;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            cursor: pointer;
            text-align: center;
            background: #3A2F2B;
            border: none;
            border-radius: 6px;
            padding: 16px 28px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: opacity 0.15s;
            display: inline-block;
        }
        .btn-espresso:hover {
            opacity: 0.85;
        }
        .field-wrap {
            flex-direction: column;
            gap: 8px;
            display: flex;
        }
        .field-label {
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #3A2F2B;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 13px;
            font-weight: 700;
        }
        .field-label .sub {
            letter-spacing: 0.04em;
            text-transform: none;
            color: #999;
            margin-left: 6px;
            font-weight: 400;
        }
        .field-input, .field-select, .field-textarea {
            color: #3A2F2B;
            appearance: none;
            background: #FBF9F4;
            border: 1px solid #DDD5CC;
            border-radius: 6px;
            outline: none;
            width: 100%;
            padding: 14px 16px;
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            font-size: 16px;
            transition: border-color 0.15s;
        }
        .field-input:focus, .field-select:focus, .field-textarea:focus {
            border-color: #C9A68F;
        }
        .field-input::placeholder, .field-textarea::placeholder {
            color: #BBB;
        }
        .field-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='7' viewBox='0 0 11 7'%3E%3Cpath d='M1 1l4.5 4.5L10 1' stroke='%23C9A68F' stroke-width='1.5' fill='none' stroke-linecap='square'/%3E%3C/svg%3E");
            background-position: right 16px center;
            background-repeat: no-repeat;
            padding-right: 44px;
        }
        .field-textarea {
            resize: none;
            min-height: 120px;
            line-height: 1.7;
        }
        .carousel-track {
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            gap: 12px;
            display: flex;
            overflow-x: auto;
        }
        .carousel-track::-webkit-scrollbar {
            display: none;
        }
        .carousel-slide {
            scroll-snap-align: start;
            flex-shrink: 0;
        }
        @keyframes heroIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .hero-in {
            animation: 0.8s both heroIn;
        }
    </style>
</head>
<body class="bg-parchment text-espresso">

    <!-- ==========================================================================
         NAVIGATION BAR
         ========================================================================== -->
    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between py-4 transition-all duration-300" style="padding-left: clamp(20px, 4vw, 48px); padding-right: clamp(20px, 4vw, 48px);">
        <!-- Brand Logo -->
        <a href="#hero" class="flex items-center gap-2.5 no-underline">
            <img src="{{ asset('graze-assets/graze_n_gifts_logo.jpg') }}" alt="Graze &amp; Gift Co." class="w-9 h-9 rounded-full object-cover shrink-0 shadow-sm">
            <span id="header-brand-text" class="font-serif font-bold uppercase text-[17px] tracking-[0.12em] text-[#FBF9F4] transition-colors duration-300">
                Graze <span class="italic text-taupe">&amp;</span> Gift Co.
            </span>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="#services" class="header-nav-link font-sans text-[14px] font-semibold uppercase tracking-widest2 no-underline transition-colors duration-150 text-white/85 hover:text-taupe">Services</a>
            <a href="#menu" class="header-nav-link font-sans text-[14px] font-semibold uppercase tracking-widest2 no-underline transition-colors duration-150 text-white/85 hover:text-taupe">Menu</a>
            <a href="#about" class="header-nav-link font-sans text-[14px] font-semibold uppercase tracking-widest2 no-underline transition-colors duration-150 text-white/85 hover:text-taupe">About</a>
            <a href="#gallery" class="header-nav-link font-sans text-[14px] font-semibold uppercase tracking-widest2 no-underline transition-colors duration-150 text-white/85 hover:text-taupe">Gallery</a>
            <a href="#reviews" class="header-nav-link font-sans text-[14px] font-semibold uppercase tracking-widest2 no-underline transition-colors duration-150 text-white/85 hover:text-taupe">Reviews</a>
            <a href="#inquiry" id="header-cta-btn" class="font-sans inline-block px-5 py-3 text-[13px] font-bold uppercase tracking-[0.18em] no-underline rounded-md transition-all duration-300" style="background: rgba(255,255,255,0.15); color: #FBF9F4; border: 1px solid rgba(255,255,255,0.5);">Request a Quote</a>
        </nav>

        <!-- Mobile Hamburger Button -->
        <button type="button" id="mobile-menu-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 focus:outline-none" aria-label="Toggle Navigation">
            <span class="w-6 h-0.5 bg-white transition-all duration-300 mobile-line-1"></span>
            <span class="w-6 h-0.5 bg-white transition-all duration-300 mobile-line-2"></span>
            <span class="w-6 h-0.5 bg-white transition-all duration-300 mobile-line-3"></span>
        </button>
    </header>

    <!-- Mobile Drawer Overlay -->
    <div id="mobile-drawer" class="fixed inset-0 z-40 bg-[#FBF9F4] flex flex-col justify-center items-center gap-6 px-8 transition-all duration-300 opacity-0 pointer-events-none translate-y-[-10px]">
        <a href="#services" class="mobile-nav-link font-serif text-[24px] font-semibold uppercase tracking-[0.12em] text-espresso hover:text-taupe">Services</a>
        <a href="#menu" class="mobile-nav-link font-serif text-[24px] font-semibold uppercase tracking-[0.12em] text-espresso hover:text-taupe">Menu</a>
        <a href="#about" class="mobile-nav-link font-serif text-[24px] font-semibold uppercase tracking-[0.12em] text-espresso hover:text-taupe">About</a>
        <a href="#gallery" class="mobile-nav-link font-serif text-[24px] font-semibold uppercase tracking-[0.12em] text-espresso hover:text-taupe">Gallery</a>
        <a href="#reviews" class="mobile-nav-link font-serif text-[24px] font-semibold uppercase tracking-[0.12em] text-espresso hover:text-taupe">Reviews</a>
        <div class="w-12 h-px bg-divider my-2"></div>
        <a href="#inquiry" class="mobile-nav-link btn-taupe w-full max-w-xs text-center">Request a Quote</a>
    </div>

    <main>
        <!-- ==========================================================================
             HERO SECTION
             ========================================================================== -->
        <section id="hero" class="relative min-h-screen flex flex-col items-center justify-center text-center px-6 md:px-10 lg:px-16 overflow-hidden hero-in">
            <!-- Background Image -->
            <img src="{{ asset('graze-assets/images/grazing table_1.jpeg') }}" alt="Grazing table spread" class="absolute inset-0 w-full h-full object-cover object-[center_25%] select-none pointer-events-none">
            
            <!-- Warm Overlay -->
            <div class="absolute inset-0" style="background: rgba(20, 13, 10, 0.52);"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center pt-28 pb-20 max-w-4xl mx-auto">
                <p class="font-sans mb-6 text-[13px] font-semibold uppercase tracking-widest2 text-white/75">
                    Fine Epicurean Artistry &nbsp;·&nbsp; Burlington &amp; The GTA
                </p>

                <h1 class="font-serif mb-4 font-bold uppercase leading-none tracking-[0.14em] text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.5)]" style="font-size: clamp(46px, 8vw, 78px);">
                    Graze <span class="text-[#C9A68F] italic">&amp;</span> Gift Co.
                </h1>

                <p class="font-serif mb-10 font-normal italic text-white/85 tracking-[0.06em]" style="font-size: clamp(26px, 3.5vw, 40px);">
                    Gather. Graze. Gift.
                </p>

                <!-- Decorative Ornament -->
                <div class="flex items-center gap-3 w-full max-w-xs mb-8">
                    <div class="flex-1 h-px bg-white/40"></div>
                    <div class="flex items-center gap-1">
                        <div class="w-1.5 h-1.5 rounded-full bg-white/60"></div>
                        <div class="w-4 h-2 rounded-full border border-white/60"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-white/60"></div>
                    </div>
                    <div class="flex-1 h-px bg-white/40"></div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full max-w-[260px] sm:max-w-none">
                    <a href="#inquiry" class="w-full sm:w-[240px] text-center font-sans inline-block px-8 py-4 text-[13px] font-bold uppercase tracking-[0.2em] no-underline rounded-md transition-opacity hover:opacity-85" style="background: #C9A68F; color: #FBF9F4;">
                        Request a Quote
                    </a>
                    <a href="#menu" class="w-full sm:w-[240px] text-center font-sans inline-block px-8 py-4 text-[13px] font-bold uppercase tracking-[0.2em] no-underline rounded-md border border-white/70 text-white transition-colors hover:bg-white/10">
                        View Menu &amp; Pricing
                    </a>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             SERVICES SECTION
             ========================================================================== -->
        <section id="services" class="py-20 md:py-28 px-6 md:px-12 lg:px-20 bg-parchment">
            <div class="max-w-6xl mx-auto">
                <span class="eyebrow">Our Offerings</span>
                <h2 class="section-heading text-espresso">Services</h2>
                <div class="taupe-rule"></div>

                <!-- Tabs Container -->
                <div class="flex overflow-x-auto mt-8 border-b border-divider [scrollbar-width:none]" style="touch-action: pan-x;" id="services-tabs-bar">
                    <!-- Tab buttons generated by JS -->
                </div>

                <!-- Active Service Container -->
                <div id="active-service-content" class="pt-10 pb-2">
                    <!-- Injected dynamically based on active tab -->
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             INDO-FUSION FULL CATERING MENU SECTION (OFFICIAL PDF SPEC)
             ========================================================================== -->
        <section id="menu" class="py-20 md:py-28 px-6 md:px-12 lg:px-20 bg-parchment/60 border-t border-b border-divider">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-3">
                    <div>
                        <span class="eyebrow">Epicurean Artistry</span>
                        <h2 class="section-heading text-espresso">Catering Menu</h2>
                        <p class="font-serif text-[19px] text-taupe italic mt-1">Indo-Fusion Grazing Table &middot; Full Menu &amp; À La Carte</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ asset('graze-assets/graze-and-gifts-indo-fusion-menu.pdf') }}" download="Graze-and-Gifts-Indo-Fusion-Menu.pdf" target="_blank" class="inline-flex items-center gap-2 px-5 py-3 rounded-md border border-taupe/70 bg-white hover:bg-taupe hover:text-white text-espresso font-sans text-[12px] font-bold uppercase tracking-[0.16em] transition-all shadow-sm">
                            <svg class="w-4 h-4 text-taupe group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Download PDF Menu</span>
                        </a>
                        <a href="#inquiry" onclick="preselectService('indo-fusion')" class="btn-taupe text-[12px] py-3 px-6 text-center">
                            Request This Menu
                        </a>
                    </div>
                </div>

                <!-- Dietary Highlights -->
                <div class="flex flex-wrap items-center gap-2 my-6">
                    <span class="text-[11px] font-bold uppercase tracking-wider px-3 py-1 bg-white rounded-full border border-divider shadow-2xs text-espresso">Nut-Free</span>
                    <span class="text-[11px] font-bold uppercase tracking-wider px-3 py-1 bg-white rounded-full border border-divider shadow-2xs text-espresso">Sesame-Free</span>
                    <span class="text-[11px] font-bold uppercase tracking-wider px-3 py-1 bg-white rounded-full border border-divider shadow-2xs text-espresso">Halal-Friendly</span>
                    <span class="text-[11px] font-bold uppercase tracking-wider px-3 py-1 bg-white rounded-full border border-divider shadow-2xs text-espresso">Vegetarian &amp; Vegan Options</span>
                </div>

                <div class="taupe-rule"></div>

                <!-- Modern Segmented Pill Selector -->
                <div class="flex items-center justify-start lg:justify-center overflow-x-auto py-3 my-6 [scrollbar-width:none]" id="onpage-menu-tabs-wrapper">
                    <div class="inline-flex items-center gap-1.5 p-1.5 bg-[#EAE2D7] rounded-full border border-divider/80 shadow-inner shrink-0" id="onpage-menu-tabs">
                        <!-- Injected by JS -->
                    </div>
                </div>

                <!-- Category Subtitle -->
                <div class="text-center mb-8">
                    <p id="onpage-category-subtitle" class="font-sans text-[13px] sm:text-[14px] italic text-body-mid font-medium max-w-xl mx-auto"></p>
                </div>

                <!-- Active Menu Items Grid -->
                <div id="onpage-menu-items" class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">
                    <!-- Injected by JS -->
                </div>

                <!-- Luxury Custom Orders Banner -->
                <div class="mt-16 p-8 sm:p-12 rounded-2xl bg-espresso text-parchment relative overflow-hidden shadow-2xl border border-taupe/30">
                    <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-taupe/15 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left">
                        <div class="max-w-2xl">
                            <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-taupe block mb-2">Bespoke Catering &amp; Events</span>
                            <h3 class="font-serif text-2xl sm:text-3xl font-semibold text-parchment leading-tight">
                                Custom Packages &amp; Dietary Accommodations
                            </h3>
                            <p class="font-sans text-sm sm:text-[15px] text-parchment/75 mt-2 leading-relaxed">
                                Looking for a personalized Indo-Fusion spread, live chaat styling, or specific allergy rebuilds? We design custom grazing tables for weddings, bridal showers, birthdays, and corporate celebrations across Oakville, Burlington &amp; the GTA.
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-3.5 w-full sm:w-auto shrink-0">
                            <a href="#inquiry" onclick="preselectService('indo-fusion')" class="w-full sm:w-auto px-8 py-4 bg-taupe hover:bg-[#b88e73] text-espresso font-sans text-[12px] font-bold uppercase tracking-[0.2em] rounded-md transition-all shadow-md text-center">
                                Request a Quote
                            </a>
                            <a href="https://wa.me/16047616232?text=Hi%20Graze%20%26%20Gift%20Co.!%20I%20would%20like%20to%20inquire%20about%20a%20custom%20catering%20package." target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-4 border border-white/25 hover:bg-white/10 text-parchment font-sans text-[12px] font-bold uppercase tracking-[0.16em] rounded-md transition-all text-center flex items-center justify-center gap-2">
                                <span>💬 WhatsApp Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             ABOUT FOUNDER SECTION
             ========================================================================== -->
        <section id="about" class="py-20 md:py-28 px-6 md:px-12 lg:px-20" style="background: #F4EFE8;">
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-stretch">
                <!-- Founder Photo with Offset Border -->
                <div class="relative mx-auto lg:mx-0 w-full" style="padding-right: 20px; padding-bottom: 20px;">
                    <div class="relative w-full h-full min-h-[400px]">
                        <div class="absolute inset-0" style="border: 2px solid #C9A68F; transform: translate(20px, 20px);"></div>
                        <div class="relative w-full h-full overflow-hidden shadow-lg">
                            <img src="{{ asset('graze-assets/images/founder.jpeg') }}" alt="Manica — founder of Graze &amp; Gift Co." class="w-full h-full object-cover object-top">
                        </div>
                    </div>
                </div>

                <!-- Founder Story -->
                <div class="flex flex-col justify-center">
                    <span class="eyebrow">Meet the Founder</span>
                    <h2 class="section-heading text-espresso">Meet Manica 🤍</h2>
                    <div class="taupe-rule"></div>

                    <p class="font-sans text-[17px] text-body-mid leading-[1.85] mb-5">
                        Hi, I'm the founder of Graze &amp; Gift. I'm a proud mom of two and an analyst by profession — but I found the courage to pursue what truly brings me joy: creating beautiful, memorable experiences through food styling and gifting.
                    </p>

                    <p class="font-sans text-[17px] text-body-mid leading-[1.85] mb-5">
                        What started as a passion has grown into Graze &amp; Gift, where I get to combine creativity with thoughtful details to make every celebration feel special. From elegant grazing tables and curated gift boxes to customized return gifts, every setup is designed with care, quality, and a personal touch.
                    </p>

                    <p class="font-sans text-[17px] text-body-mid leading-[1.85] mb-8">
                        I believe every celebration deserves something unique — whether it's a birthday, bridal shower, baby shower, wedding, corporate event, or an intimate gathering with loved ones. Thank you for supporting this dream and being part of the journey.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#inquiry" class="btn-taupe text-center">Request a Quote</a>
                        <a href="https://www.instagram.com/graze_n_gifts" target="_blank" rel="noopener noreferrer" class="btn-outline text-center">Follow on Instagram</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             GALLERY SECTION
             ========================================================================== -->
        <section id="gallery" class="py-20 md:py-28 px-6 md:px-12 lg:px-20 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-end justify-between mb-2">
                    <div>
                        <span class="eyebrow">Our Work</span>
                        <h2 class="section-heading text-espresso">Gallery</h2>
                    </div>
                    <a href="https://www.instagram.com/graze_n_gifts" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-block mb-1 font-sans text-[11px] font-bold uppercase tracking-[0.22em] no-underline pb-0.5 text-espresso border-b border-taupe hover:text-taupe transition-colors">
                        @graze_n_gifts →
                    </a>
                </div>
                <div class="taupe-rule"></div>

                <!-- Carousel Wrapper with Left/Right Chevrons -->
                <div class="relative">
                    <button type="button" id="gallery-prev-btn" class="absolute left-2 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/90 shadow-md flex items-center justify-center text-espresso hover:bg-white transition-all" aria-label="Previous image">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <button type="button" id="gallery-next-btn" class="absolute right-2 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-white/90 shadow-md flex items-center justify-center text-espresso hover:bg-white transition-all" aria-label="Next image">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </button>

                    <div id="gallery-carousel-track" class="carousel-track py-2">
                        <!-- 24 cards injected by JS -->
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             REVIEWS SECTION
             ========================================================================== -->
        <section id="reviews" class="py-20 md:py-28 px-6 md:px-12 lg:px-20 bg-espresso text-parchment">
            <div class="max-w-6xl mx-auto">
                <span class="eyebrow" style="color: #C9A68F;">Client Love</span>
                <h2 class="section-heading mb-12 text-parchment">Reviews</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Review 1 -->
                    <div class="flex flex-col bg-[#2F2622] rounded-lg overflow-hidden border border-white/10 p-3">
                        <video src="{{ asset('graze-assets/reviews/review_1.mp4') }}" controls playsinline class="w-full aspect-[9/16] object-cover rounded bg-black"></video>
                        <p class="mt-4 font-sans italic text-[14px] leading-relaxed text-parchment/80 text-center">
                            "It looks so pretty, so stunning. It's something different. Every time we go to a party, it's all just kept on one table, but this looks so organized and so pretty. I loved it!"
                        </p>
                    </div>

                    <!-- Review 2 -->
                    <div class="flex flex-col bg-[#2F2622] rounded-lg overflow-hidden border border-white/10 p-3">
                        <video src="{{ asset('graze-assets/reviews/review_2.mp4') }}" controls playsinline class="w-full aspect-[9/16] object-cover rounded bg-black"></video>
                        <p class="mt-4 font-sans italic text-[14px] leading-relaxed text-parchment/80 text-center">
                            "The setup is amazing and it looks very presentable. There's stuff for the kids, there's stuff for the grown-ups, and it's all very appetizing, very nicely done. Thank you everyone for decorating and setting tables for our event today!"
                        </p>
                    </div>

                    <!-- Review 3 -->
                    <div class="flex flex-col bg-[#2F2622] rounded-lg overflow-hidden border border-white/10 p-3">
                        <video src="{{ asset('graze-assets/reviews/review_3.mp4') }}" controls playsinline class="w-full aspect-[9/16] object-cover rounded bg-black"></video>
                        <p class="mt-4 font-sans italic text-[14px] leading-relaxed text-parchment/80 text-center">
                            "It is amazing — the snacks, the structures that are amazingly placed, and the easy access. It's very properly categorized. I would any day go for that!"
                        </p>
                    </div>

                    <!-- Review 4 -->
                    <div class="flex flex-col bg-[#2F2622] rounded-lg overflow-hidden border border-white/10 p-3">
                        <video src="{{ asset('graze-assets/reviews/review_4.mp4') }}" controls playsinline class="w-full aspect-[9/16] object-cover rounded bg-black"></video>
                        <p class="mt-4 font-sans italic text-[14px] leading-relaxed text-parchment/80 text-center">
                            "Very good decoration!"
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==========================================================================
             INQUIRE FORM SECTION
             ========================================================================== -->
        <section id="inquiry" class="py-20 md:py-28 px-6 md:px-12 lg:px-20 bg-parchment">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                    <!-- Left Column -->
                    <div>
                        <span class="eyebrow">Get In Touch</span>
                        <h2 class="section-heading text-espresso">Inquire</h2>
                        <div class="taupe-rule"></div>
                        <p class="font-sans mb-12 text-[17px] text-body-mid leading-[1.85]">
                            Tell us about your vision and we'll craft something extraordinary. We respond within 24 hours via WhatsApp or email.
                        </p>

                        <div class="space-y-6 pt-4 border-t border-divider">
                            <div>
                                <p class="font-sans text-[11px] font-bold uppercase tracking-[0.2em] text-taupe mb-1">Direct Contact</p>
                                <p class="font-sans text-[15px] font-semibold text-espresso">+1 (604) 761-6232</p>
                            </div>
                            <div>
                                <p class="font-sans text-[11px] font-bold uppercase tracking-[0.2em] text-taupe mb-1">Service Areas</p>
                                <p class="font-sans text-[15px] text-body-mid">Oakville, Burlington, Mississauga, Milton &amp; the Greater Toronto Area (GTA)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Form -->
                    <form id="inquiry-form" class="flex flex-col gap-5 bg-white p-8 md:p-10 rounded-lg shadow-sm border border-divider">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-wrap">
                                <label for="fullName" class="field-label">Full Name *</label>
                                <input type="text" id="fullName" name="fullName" class="field-input" placeholder="e.g. Sarah Jenkins" required>
                            </div>
                            <div class="field-wrap">
                                <label for="phone" class="field-label">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" class="field-input" placeholder="(416) 000-0000" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-wrap">
                                <label for="email" class="field-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="field-input" placeholder="sarah@example.com" required>
                            </div>
                            <div class="field-wrap">
                                <label for="date" class="field-label">Event Date *</label>
                                <input type="date" id="date" name="date" class="field-input" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-wrap">
                                <label for="city" class="field-label">City / Venue Location *</label>
                                <input type="text" id="city" name="city" class="field-input" placeholder="e.g. Oakville, ON" required>
                            </div>
                            <div class="field-wrap">
                                <label for="guests" class="field-label">Estimated Guest Count *</label>
                                <input type="number" id="guests" name="guests" min="1" class="field-input" placeholder="e.g. 35" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-wrap">
                                <label for="budget" class="field-label">Estimated Budget *</label>
                                <select id="budget" name="budget" class="field-select" required>
                                    <option value="" disabled selected>Select a range</option>
                                    <option value="under-300">Under $300</option>
                                    <option value="300-600">$300 – $600</option>
                                    <option value="600-1000">$600 – $1,000</option>
                                    <option value="1000-2000">$1,000 – $2,000</option>
                                    <option value="2000+">$2,000+</option>
                                </select>
                            </div>
                            <div class="field-wrap">
                                <label for="eventType" class="field-label">Event Type *</label>
                                <select id="eventType" name="eventType" class="field-select" required>
                                    <option value="" disabled selected>Select event type</option>
                                    <option value="birthday">Birthday</option>
                                    <option value="wedding">Wedding / Engagement</option>
                                    <option value="baby-shower">Baby Shower</option>
                                    <option value="bridal-shower">Bridal Shower</option>
                                    <option value="corporate">Corporate Event</option>
                                    <option value="eid-diwali">Eid / Diwali</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="field-wrap">
                                <label for="service" class="field-label">Service Interested In *</label>
                                <select id="service" name="service" class="field-select" required>
                                    <option value="" disabled selected>Select primary service</option>
                                    <option value="charcuterie-cups">Charcuterie Cups &amp; Grazing Boxes</option>
                                    <option value="grazing-table">Grazing Table (4ft / 6ft / 8ft)</option>
                                    <option value="indo-fusion">Indo-Fusion Grazing Table</option>
                                    <option value="high-tea">High Tea</option>
                                    <option value="gift-boxes">Custom Return Gifts</option>
                                    <option value="paint-sip">Paint &amp; Sip</option>
                                    <option value="platter-rental">Platter Rental</option>
                                    <option value="multiple">Multiple Services</option>
                                </select>
                            </div>
                            <div class="field-wrap">
                                <label for="dietary" class="field-label">Dietary Preference</label>
                                <select id="dietary" name="dietary" class="field-select">
                                    <option value="" disabled selected>Select preference</option>
                                    <option value="standard">Standard</option>
                                    <option value="vegetarian">Vegetarian / Vegan</option>
                                    <option value="halal">Halal</option>
                                    <option value="gluten-free">Gluten-Free</option>
                                    <option value="na">No preference / Mix</option>
                                </select>
                            </div>
                        </div>

                        <div class="field-wrap">
                            <label for="vision" class="field-label">Tell Us About Your Vision <span class="sub">(Optional)</span></label>
                            <textarea id="vision" name="vision" class="field-textarea" placeholder="Theme, colour scheme, specific foods, timing, or anything else you have in mind..."></textarea>
                        </div>

                        <button type="submit" class="btn-espresso w-full mt-2">
                            <span>Request Quote via WhatsApp</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Floating Toast Notification -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 max-w-sm w-full px-5 py-4 rounded-md shadow-lg border transition-all duration-300 opacity-0 translate-x-8 pointer-events-none bg-espresso border-taupe text-parchment">
        <p id="toast-title" class="font-serif text-[15px] font-semibold mb-0.5">Inquiry Received</p>
        <p id="toast-message" class="font-sans text-[13px] leading-relaxed opacity-90">We'll be in touch via WhatsApp or email within 24 hours.</p>
    </div>

    <!-- ==========================================================================
         FOOTER
         ========================================================================== -->
    <footer class="py-14 px-6 md:px-12 lg:px-20 bg-parchment border-t border-divider">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-10 mb-10">
                <div>
                    <p class="font-serif text-[22px] font-bold uppercase tracking-[0.14em] text-espresso mb-1">
                        Graze <span class="text-taupe italic">&amp;</span> Gift Co.
                    </p>
                    <p class="font-sans text-[10px] font-semibold uppercase tracking-[0.24em] text-taupe mb-4">Gather. Graze. Gift.</p>
                    <p class="font-sans text-[14px] text-muted leading-[1.75] max-w-xs">
                        Luxury grazing tables, Indo-Fusion high tea, charcuterie cups, and custom gift experiences. Serving Burlington, Oakville &amp; the GTA.
                    </p>
                </div>

                <div class="flex flex-col gap-3">
                    <p class="font-sans text-[10px] font-bold uppercase tracking-[0.24em] text-espresso mb-1">Navigate</p>
                    <a href="#services" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">Services</a>
                    <a href="#about" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">About</a>
                    <a href="#gallery" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">Gallery</a>
                    <a href="#reviews" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">Reviews</a>
                    <a href="#inquiry" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">Inquire</a>
                    <a href="{{ route('graze.admin.index') }}" class="font-sans text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid/70 hover:text-taupe transition-colors">Admin Portal</a>
                </div>

                <div class="flex flex-col gap-3">
                    <p class="font-sans text-[10px] font-bold uppercase tracking-[0.24em] text-espresso mb-1">Connect</p>
                    <a href="https://www.instagram.com/graze_n_gifts" target="_blank" rel="noopener noreferrer" class="font-sans w-fit text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">Instagram</a>
                    <a href="https://wa.me/16047616232" target="_blank" rel="noopener noreferrer" class="font-sans w-fit text-[12px] font-semibold uppercase tracking-[0.18em] no-underline text-body-mid hover:text-taupe transition-colors">WhatsApp</a>
                </div>
            </div>

            <div class="border-t border-divider pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="font-sans text-[12px] text-muted">
                    &copy; 2026 Graze &amp; Gift Co. All rights reserved.
                </p>
                <p class="font-sans text-[12px] text-muted">
                    Fine Epicurean Artistry &middot; Serving Oakville, Burlington &amp; GTA
                </p>
            </div>
        </div>
    </footer>

    <!-- ==========================================================================
         MODAL: INDO-FUSION FULL MENU
         ========================================================================== -->
    <div id="indo-fusion-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200" role="dialog" aria-modal="true">
        <div class="bg-white rounded-lg max-w-3xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden">
            <!-- Modal Header -->
            <div class="p-6 border-b border-divider flex items-center justify-between bg-parchment">
                <div>
                    <span class="font-sans text-[11px] font-bold uppercase tracking-[0.2em] text-taupe block mb-1">Indo-Fusion Grazing Table</span>
                    <h3 class="font-serif text-[24px] font-bold text-espresso uppercase tracking-[0.06em]">Full Menu Options</h3>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ asset('graze-assets/graze-and-gifts-indo-fusion-menu.pdf') }}" download="Graze-and-Gifts-Indo-Fusion-Menu.pdf" target="_blank" class="px-3 py-1.5 rounded border border-taupe text-espresso hover:bg-taupe hover:text-white text-[11px] font-bold uppercase tracking-wider flex items-center gap-1 transition-colors">
                        <span>📄 Download PDF</span>
                    </a>
                    <button type="button" class="close-modal-btn w-9 h-9 rounded-full bg-white flex items-center justify-center text-espresso hover:bg-taupe hover:text-white transition-colors" aria-label="Close modal">✕</button>
                </div>
            </div>

            <!-- Category Tabs -->
            <div class="flex overflow-x-auto border-b border-divider px-6 bg-white [scrollbar-width:none]" id="indo-menu-tabs">
                <!-- Injected by JS -->
            </div>

            <!-- Items List -->
            <div class="p-6 overflow-y-auto flex-1 divide-y divide-divider/60" id="indo-menu-items">
                <!-- Injected by JS -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-parchment border-t border-divider flex justify-between items-center">
                <span class="font-sans text-[12px] text-muted">All items subject to seasonal availability and custom spice preferences.</span>
                <a href="#inquiry" class="close-modal-btn btn-taupe text-[11px] py-2.5 px-5">Inquire Now</a>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
         MODAL: HIGH TEA FULL MENU
         ========================================================================== -->
    <div id="high-tea-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-200" role="dialog" aria-modal="true">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] flex flex-col shadow-2xl overflow-hidden">
            <!-- Modal Header -->
            <div class="p-6 border-b border-divider flex items-center justify-between bg-parchment">
                <div>
                    <span id="ht-modal-badge" class="font-sans text-[11px] font-bold uppercase tracking-[0.2em] text-taupe block mb-1">High Tea Menu</span>
                    <h3 id="ht-modal-title" class="font-serif text-[24px] font-bold text-espresso uppercase tracking-[0.06em]">Classic High Tea</h3>
                    <p id="ht-modal-price" class="font-sans text-[13px] text-muted mt-1">$28 per person</p>
                </div>
                <button type="button" class="close-modal-btn w-9 h-9 rounded-full bg-white flex items-center justify-center text-espresso hover:bg-taupe hover:text-white transition-colors" aria-label="Close modal">✕</button>
            </div>

            <!-- Items List -->
            <div class="p-6 overflow-y-auto flex-1 space-y-6" id="ht-modal-sections">
                <!-- Injected by JS -->
            </div>

            <!-- Modal Footer -->
            <div class="p-4 bg-parchment border-t border-divider flex justify-between items-center">
                <span class="font-sans text-[12px] text-muted">Includes fine china setting and floral table decor.</span>
                <a href="#inquiry" class="close-modal-btn btn-taupe text-[11px] py-2.5 px-5">Inquire Now</a>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
         CLIENT DATA & JAVASCRIPT
         ========================================================================== -->
    <script>
        const servicesData = JSON.parse('[{"id": "charcuterie-cups", "number": "01", "name": "Charcuterie Cups & Grazing Boxes", "shortName": "Charcuterie Cups", "tagline": "Individual portions, elevated.", "photo": "/graze-assets/images/charcuterie cups_2.JPG", "photoPosition": "object-bottom lg:object-center", "desc": "Individually styled, grab-and-go charcuterie cups \\u2014 perfect for parties, showers, weddings, corporate events, and lunchboxes. Each cup is built fresh and packed abundantly. Choose from four tiers to match your crowd and budget.", "badges": ["Nut-Free", "Sesame-Free", "Halal-Friendly"], "note": "Minimum order of 10 cups. Mix & match tiers within one order.", "cupTiers": [{"name": "Classic", "price": "$11", "tagline": "The signature cup", "items": ["Two artisan cheeses", "Cured Italian salami", "Crackers & grissini", "Fresh grapes & berries", "Dried fruit, olives & nuts"]}, {"name": "Vegetarian", "price": "$11", "tagline": "No meat, all flavour", "items": ["Two artisan cheeses", "Marinated vegetables", "Crackers & grissini", "Fresh grapes & berries", "Hummus, olives & nuts"]}, {"name": "Premium", "price": "$15", "tagline": "Elevated picks", "items": ["Prosciutto di Parma", "Parmigiano & soft cheese", "Caprese skewer", "Fresh figs & berries", "Fig jam & marcona almonds"]}], "boardTiers": [{"name": "Petite", "price": "$65", "tagline": "Serves 4\\u20136", "items": ["3 cheeses", "2 meats"]}, {"name": "Medium", "price": "$105", "tagline": "Serves 8\\u201310", "items": ["4 cheeses", "3 meats"]}, {"name": "Large", "price": "$165", "tagline": "Serves 12\\u201315", "items": ["5 cheeses", "4 meats"]}, {"name": "Grand", "price": "$260", "tagline": "Serves 20\\u201325", "items": ["6 cheeses", "5 meats"]}], "volumePricing": [{"qty": "10\\u201324 cups", "discount": "Standard pricing", "bestFor": "Small gatherings"}, {"qty": "25\\u201349 cups", "discount": "5% off", "bestFor": "Showers & birthdays"}, {"qty": "50+ cups", "discount": "10% off", "bestFor": "Weddings & corporate"}], "menu": [{"title": "Add-Ons & Customization", "items": ["Simple dietary swap (no pork, halal, vegetarian) \\u2014 add $2 per cup", "Full allergy rebuild (nut-free, dairy-free) \\u2014 add $5 per cup", "Individual dietary tags \\u2014 $1 per cup", "Mini desserts \\u2014 $3 per piece", "Scones & clotted cream \\u2014 $4 per person", "Cheese fondue dip \\u2014 $20 per bowl", "Fresh floral styling \\u2014 from $35", "Custom branding & tags \\u2014 from $30"]}, {"title": "Delivery & Setup", "items": ["Pickup \\u2014 Burlington \\u2014 complimentary", "Burlington & Oakville \\u2014 $20", "Hamilton, Milton, Mississauga \\u2014 $35", "Toronto, Vaughan, Brampton \\u2014 $55", "On-site styling & setup \\u2014 from $75"]}, {"title": "Booking Terms", "items": ["A 50% deposit confirms your date; balance due at pickup or delivery", "Final guest count, dietary needs & allergy builds confirmed 5 days prior \\u2014 no late additions", "Quotes valid 7 days. Peak dates book 3\\u20134 weeks ahead", "Cancellations within 72 hours retain the deposit", "Cups and boards are prepared fresh \\u2014 best enjoyed within 4 hours"]}]}, {"id": "grazing-table", "number": "02", "name": "Grazing Table", "shortName": "Grazing Table", "tagline": "A statement centrepiece.", "photo": "/graze-assets/images/grazing table_2.jpeg", "desc": "Every grazing table is styled fresh on-site into an abundant, edible centrepiece \\u2014 layered with cured meats, artisan and local cheeses, seasonal fruit, house dips, crackers, and florals. All builds are nut-free and sesame-free by default, with halal-friendly meats and an Indo-fusion twist available on request.", "badges": ["Nut-Free", "Sesame-Free", "Halal-Friendly", "Indo-Fusion Available"], "note": "Plus: full styling with florals, greenery, boards, bowls & serving labels \\u2014 set up and arranged at your venue.", "pricing": [{"size": "4 ft", "guests": "15\\u201325 guests", "price": "$375", "perGuest": "approx. $18\\u201322 / guest"}, {"size": "6 ft", "guests": "30\\u201345 guests", "price": "$595", "perGuest": "approx. $14\\u201318 / guest"}, {"size": "8 ft", "guests": "50\\u201370 guests", "price": "$795", "perGuest": "approx. $12\\u201315 / guest"}], "menu": [{"title": "The Savoury", "items": ["Cured & halal-friendly meats \\u2014 folded salami, prosciutto-style, turkey", "Artisan + local Ontario cheeses (soft, hard & aged)", "Marinated olives & cornichons", "Roasted & marinated vegetables", "Indo-fusion bites \\u2014 spiced paneer, samosa minis, chutney (on request)"]}, {"title": "The Sweet & Crisp", "items": ["Seasonal fresh fruit & berries", "Dried fruit & candied (nut-free) clusters", "Honeycomb, fig jam & house dips", "Artisan crackers, crostini & breadsticks", "Dark chocolate & sweet garnishes"]}, {"title": "Premium Additions", "items": ["Grazing boxes / individual cups \\u2014 $14 ea", "Dessert grazing extension \\u2014 from $120", "Imported & specialty cheeses \\u2014 from $40", "Fresh floral upgrade \\u2014 from $50", "Warm dips & sliders station \\u2014 from $90"]}, {"title": "Make It a Moment", "items": ["Custom signage & name cards \\u2014 from $25", "Mocktail / kanji & kombucha pairing \\u2014 from $60", "Return gifts & favours \\u2014 from $8 ea", "Extended 10 ft / U-shape builds \\u2014 quoted", "Themed colour palettes \\u2014 complimentary"]}], "steps": ["Reach out with your date, guest count, venue & any dietary needs", "We send a tailored quote and lock your date with a 50% deposit", "We arrive 1.5\\u20132 hrs before service to build and style on-site", "You enjoy a stunning centrepiece \\u2014 we handle setup & board pickup"]}, {"id": "indo-fusion", "number": "03", "name": "Indo-Fusion Grazing Table", "shortName": "Indo-Fusion", "tagline": "Charcuterie meets South Asian flair.", "photo": "/graze-assets/images/indo fusion_1.jpeg", "desc": "A vibrant spread where chaat-stall favourites meet grazing-table styling. Every item is made fresh, nut-free and sesame-free, with halal meats throughout. Build your own by the piece, or choose a package below for the best value.", "badges": ["Nut-Free", "Sesame-Free", "Halal-Friendly"], "packages": [{"name": "Chaat Starter", "price": "$16", "perGuest": "per guest", "min": "Min. 15 guests", "items": ["Choose 4 snacks", "1 dip / chutney trio", "Fresh fruit accent", "Crackers & garnish", "Styled mini grazing setup"]}, {"name": "Fusion Feast", "price": "$22", "perGuest": "per guest", "min": "Min. 20 guests", "highlight": true, "items": ["Choose 6 snacks", "Veg + non-veg mix", "2 dips + chutney trio", "1 dessert (gulab jamun)", "1 welcome drink", "Full styling & florals"]}, {"name": "Royal Spread", "price": "$28", "perGuest": "per guest", "min": "Min. 25 guests", "items": ["Choose 8 snacks", "Premium non-veg picks", "Live-style plating", "2 desserts", "2 drinks (incl. mocktail)", "Signage + premium florals"]}], "serviceNotes": ["Free 6-piece tasting box for first-time clients booking 25+ guests.", "Mix-and-match any snacks; veg and non-veg kept clearly separated.", "Custom Indo-fusion requests & regional dishes welcome.", "Delivery & setup within Burlington and the GTA \\u2014 quoted by distance.", "50% deposit secures your date; balance due on event day."], "fullMenu": {"title": "Indo-Fusion Grazing Table \\u2014 Full Menu", "badges": ["Nut-Free", "Sesame-Free", "Halal-Friendly", "Vegetarian & Vegan Options"], "categories": [{"id": "snacks", "label": "Snacks & Bites", "subtitle": "Priced per piece unless noted. Mix veg & non-veg freely. Minimum 10 pieces per item.", "items": [{"name": "Caprese Skewers", "desc": "Tomato, bocconcini, basil, balsamic glaze", "type": "Veg", "price": "$3.00"}, {"name": "Veg Samosas", "desc": "Crisp pastry, spiced potato & peas", "type": "Veg", "price": "$3.00"}, {"name": "Spring Rolls", "desc": "Crunchy veg rolls, sweet-chili dip", "type": "Veg", "price": "$3.00"}, {"name": "Cream Cheese Cucumber Sandwiches", "desc": "Soft tea sandwiches, fresh dill", "type": "Veg", "price": "$3.00"}, {"name": "Bruschetta", "desc": "Toasted baguette, tomato-basil", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Cheese Corn Tart", "desc": "Cheesy sweet-corn in a crisp tart", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Aloo Tikki Bites", "desc": "Mini crispy potato patties, chutney drizzle", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Hara Bhara Kebab", "desc": "Spinach & green-pea cutlets", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Corn & Cheese Balls", "desc": "Golden-fried, gooey centre", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Mac & Cheese Bites", "desc": "Crumbed & fried, creamy centre", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Mini Grilled Cheese", "desc": "Buttery, golden triangles", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Falafel", "desc": "Served with tzatziki", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Stuffed Mushrooms", "desc": "Herbed cheese filling", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Chilli Idli Cube Skewers", "desc": "Crispy idli cubes, Indo-Chinese glaze", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Veg Manchurian (Dry)", "desc": "Indo-Chinese, tangy glaze", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Honey Chilli Potatoes", "desc": "Crispy, sweet-spicy toss", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Chilli Paneer", "desc": "Indo-Chinese, sweet-spicy sauce", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Tandoori Soya Chaap", "desc": "Marinated & char-grilled, smoky glaze", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Matar Kulcha", "desc": "Spiced chickpeas, soft kulcha", "type": "Veg", "price": "$3.00"}, {"name": "Pav Bhaji", "desc": "Buttery mashed veg curry, mini pav", "type": "Veg", "price": "$3.50"}, {"name": "Vada Pav", "desc": "Mumbai-style potato slider", "type": "Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Veg / Chicken Momos", "desc": "Steamed or tandoori, house chutney", "type": "Veg / Non-Veg", "price": "$3.00"}, {"name": "Paneer / Chicken Sliders", "desc": "Mini brioche, spiced patty, slaw", "type": "Veg / Non-Veg", "price": "$3.50"}, {"name": "Chicken Tikka Skewers", "desc": "Char-grilled, tandoori spice", "type": "Non-Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Chicken Malai Tikka", "desc": "Creamy, mildly spiced", "type": "Non-Veg", "price": "$4.00", "unit": "/ pp"}]}, {"id": "chaat", "label": "Chaat, Platters & Cones", "subtitle": "Crowd favourites for grazing counters & grab-and-go. Platters serve 4\\u20136.", "items": [{"name": "Chaat Platter", "desc": "Papdi, samosa, chutneys, sev, yogurt \\u2014 sharing size", "type": "Veg", "price": "$50.00"}, {"name": "Loaded Chaat Platter", "desc": "Papdi, samosa, chutneys, sev, yogurt", "type": "Veg", "price": "$28.00", "unit": "/ platter"}, {"name": "Papdi Chaat", "desc": "Crispy papdi, yogurt, chutneys, sev", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Katori Chaat", "desc": "Edible basket, spiced filling, yogurt & chutney", "type": "Veg", "price": "$3.50", "unit": "/ pc"}, {"name": "Pani Puri Shots", "desc": "Pre-filled puris with spiced water shots", "type": "Veg", "price": "$3.00", "unit": "/ cup"}, {"name": "Dahi Puri", "desc": "Crispy puris, yogurt, chutneys, sev", "type": "Veg", "price": "$3.00", "unit": "/ cup"}, {"name": "Aloo Tikki Chaat", "desc": "Tikki, chutneys, yogurt, sev", "type": "Veg", "price": "$3.50", "unit": "/ pc"}, {"name": "Samosa Chaat", "desc": "Crushed samosa, chole, chutneys", "type": "Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Ragda Pattice", "desc": "Potato patties, white-pea curry", "type": "Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Sev Puri", "desc": "Papdi, potato, chutneys, sev", "type": "Veg", "price": "$3.00", "unit": "/ cup"}, {"name": "Bhel Puri", "desc": "Puffed rice, tangy chutneys, onion & sev", "type": "Veg", "price": "$3.00", "unit": "/ cup"}, {"name": "Fries Cones", "desc": "Masala fries, chutney drizzle, sev", "type": "Veg", "price": "$4.00", "unit": "/ cone"}]}, {"id": "wraps", "label": "Wraps, Rolls & Sliders", "subtitle": "Fresh wraps and rolls with spiced fillings and chutneys.", "items": [{"name": "Paneer Tikka Wrap", "desc": "Grilled paneer tikka, mint chutney \\u2014 bite-sized", "type": "Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Chicken Tikka Wrap", "desc": "Tandoori chicken, onions, chutney \\u2014 bite-sized", "type": "Non-Veg", "price": "$3.50", "unit": "/ pp"}, {"name": "Paneer Kathi Roll", "desc": "Spiced paneer, onions, mint chutney", "type": "Veg", "price": "$3.50", "unit": "/ pc"}, {"name": "Veg Frankie", "desc": "Mumbai-style veg roll", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Hummus & Falafel Wrap", "desc": "Fresh veg, tahini-free", "type": "Veg", "price": "$3.50", "unit": "/ pc"}, {"name": "Chilli Paneer Slider", "desc": "Indo-Chinese paneer, mini bun", "type": "Veg", "price": "$3.50", "unit": "/ pc"}, {"name": "Mumbai Grilled Sandwich", "desc": "Veg, chutney, cheese, masala", "type": "Veg", "price": "$3.00", "unit": "/ pc"}]}, {"id": "pasta", "label": "Pasta & Fusion Mains", "subtitle": "Wok noodles, pastas, and savory fusion mains.", "items": [{"name": "Veg Noodles", "desc": "Wok-tossed hakka noodles", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Schezwan Noodles", "desc": "Spicy Indo-Chinese", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Veg Fried Rice", "desc": "Wok-tossed, mixed veg", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "White Sauce Pasta", "desc": "Creamy alfredo-style, herbed", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Pink Sauce Pasta", "desc": "Creamy tomato-ros\\u00e9, herbed", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Pesto Pasta", "desc": "Basil pesto, parmesan", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Baked Penne", "desc": "Cheesy, oven-baked", "type": "Veg", "price": "$3.00", "unit": "/ plate"}, {"name": "Paneer Makhani + Mini Naan", "desc": "Rich butter gravy, soft naan", "type": "Veg", "price": "$4.00", "unit": "/ pp"}]}, {"id": "desserts", "label": "Desserts", "subtitle": "Handcrafted Indian mithai, miniature desserts, and dessert extensions.", "items": [{"name": "Gulab Jamun", "desc": "Warm, syrup-soaked classic", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Rasmalai", "desc": "Saffron cream, chilled", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Rabdi Jalebi Cups", "desc": "Warm jalebi layered with rabdi", "type": "Veg", "price": "$3.00", "unit": "ea"}, {"name": "Kulfi / Kulfi Falooda", "desc": "Traditional frozen dessert", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Motichoor Laddoo", "desc": "Classic festive sweet", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Gajar Halwa", "desc": "Warm carrot pudding (seasonal)", "type": "Veg", "price": "$3.00", "unit": "/ pp"}, {"name": "Mini Donuts", "desc": "Glazed & assorted toppings", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Cupcakes", "desc": "Buttercream, custom colours", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Brownie Bites", "desc": "Fudgy, bite-sized", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Chocolate-Dipped Strawberries", "desc": "Hand-dipped, elegant", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Fruit Tartlets", "desc": "Custard & fresh fruit", "type": "Veg", "price": "$3.00", "unit": "/ pc"}, {"name": "Mini Cheesecake Cups", "desc": "Individually styled", "type": "Veg", "price": "$3.00", "unit": "ea"}, {"name": "Mini Dessert Cups", "desc": "Layered, individually styled", "type": "Veg", "price": "$3.00", "unit": "ea"}, {"name": "Dessert Grazing Extension", "desc": "Assorted sweets display", "type": "Veg", "price": "from $90"}]}, {"id": "drinks", "label": "Drinks", "subtitle": "Served warm, urn available for chai & coffee.", "items": [{"name": "Masala Chai / Coffee", "desc": "Served warm, urn available", "type": "Veg", "price": "$3.00"}, {"name": "Filter Coffee", "desc": "South-Indian style", "type": "Veg", "price": "$3.00"}, {"name": "Mango Lassi", "desc": "Thick, sweet, chilled", "type": "Veg", "price": "$3.00"}, {"name": "Rose Falooda Milk", "desc": "Rose, vermicelli, basil seeds", "type": "Veg", "price": "$4.00"}, {"name": "Thandai", "desc": "Spiced festive milk", "type": "Veg", "price": "$3.50"}, {"name": "Nimbu Pani / Shikanji", "desc": "Fresh spiced lemonade", "type": "Veg", "price": "$3.00"}, {"name": "Virgin Mojito", "desc": "Mint, lime, soda", "type": "Veg", "price": "$3.00"}, {"name": "Buttermilk (Chaas)", "desc": "Spiced, chilled", "type": "Veg", "price": "$3.00"}, {"name": "Kanji / Kombucha", "desc": "Fermented, probiotic", "type": "Veg", "price": "$3.50"}]}]}}, {"id": "high-tea", "number": "04", "name": "High Tea", "shortName": "High Tea", "tagline": "Elegance in every pour.", "photo": "/graze-assets/images/hightea_4.jpeg", "photoPosition": "object-[50%_75%]", "desc": "A curated high tea experience featuring fresh-baked scones, delicate finger sandwiches, tiered desserts, and a grazing spread \\u2014 fully styled to your colour palette and theme. Perfect for bridal showers, birthdays, and intimate gatherings. Themed experiences available on request.", "badges": ["Halal-Friendly", "Veg & Non-Veg Options", "Themed Events", "Custom Colour Palette"], "packages": [{"name": "Classic High Tea", "price": "$28", "perGuest": "per person", "min": "Table setting, food & floral d\\u00e9cor included", "items": ["Finger sandwiches (1 veg + 1 non-veg)", "Fresh baked scones with butter, jam & cream", "Choose 3 desserts", "Grazing table \\u2014 cookies, crackers & cheese", "Table setting & basic floral d\\u00e9cor"]}, {"name": "Bridgerton Picnic", "price": "Inquire", "perGuest": "for pricing", "min": "Themed outdoor picnic experience", "items": ["Indo-fusion savoury table", "Grazing spread with fruits & cheese", "Sweet temptations", "Refreshments & herbal teas", "Themed styling & d\\u00e9cor"]}]}, {"id": "gift-boxes", "number": "05", "name": "Custom Return Gifts", "shortName": "Return Gifts", "tagline": "Every occasion, beautifully gifted.", "photo": "/graze-assets/images/return gift_1.jpeg", "desc": "You tell us your theme and budget \\u2014 we take care of the rest. From beautifully curated gifts to personalized details, we create return gifts that perfectly match your celebration. Every order includes a personalized note to make your guests feel truly special. Starting from $7 per gift.", "badges": ["Birthdays", "Baby Showers", "Weddings", "Bridal Showers", "Eid & Diwali", "Corporate"]}, {"id": "paint-sip", "number": "06", "name": "Paint & Sip", "shortName": "Paint & Sip", "tagline": "Creativity paired with indulgence.", "desc": "Guided art sessions paired with curated grazing boards and charcuterie cups \\u2014 perfect for birthday parties, bridal showers, or girls\' nights."}, {"id": "platter-rental", "number": "07", "name": "Platter Rental", "shortName": "Platter Rental", "tagline": "Premium serveware, without the investment.", "desc": "Rent our slate boards, marble platters, gold-rimmed trays, and tiered stands \\u2014 complementing your own spread or our setups."}]');
        const highTeaData = JSON.parse('{"Classic High Tea": {"title": "Classic High Tea", "price": "", "priceLabel": "per person \\u2014 includes table setting, food & floral d\\u00e9cor", "badges": ["Halal-Friendly", "Veg & Non-Veg Options", "Custom Colour Palette"], "sections": [{"title": "Sandwich Selection", "subtitle": "Choose 1 Veg & 1 Non-Veg per guest", "items": ["Veg \\u2014 Cucumber & Cream Cheese", "Veg \\u2014 Paneer Tikka", "Veg \\u2014 Cheese & Chutney", "Non-Veg \\u2014 Chicken Mayo", "Non-Veg \\u2014 Chicken Tikka", "Non-Veg \\u2014 Egg Mayo"]}, {"title": "Fresh Baked Scones", "subtitle": "Served with butter, jam & cream", "items": ["Classic plain scones, warm from the oven"]}, {"title": "Desserts Selection", "subtitle": "Choose 3", "items": ["Macarons", "Mini Cupcakes", "Brownie Bites", "Fruit Tarts", "Mini Cheesecakes"]}, {"title": "Grazing Table", "items": ["Assorted cookies & crackers", "Artisanal cheese", "Chocolates & wafers"]}, {"title": "Optional Add-Ons", "subtitle": "On request", "items": ["Mini samosas & Indian snacks", "Paneer tikka skewers", "Juice & mocktail station"]}]}, "Bridgerton Picnic": {"title": "Bridgerton-Inspired High Tea Picnic", "priceLabel": "Inquire for pricing", "badges": ["Halal-Friendly", "Indo-Fusion", "Themed Experience", "Outdoor Picnic Style"], "sections": [{"title": "The Savoury Table", "items": ["Jalape\\u00f1o & cheese samosas", "Cucumber & mint sandwiches", "Mini chaat delicacies", "Golden crisp pakoras", "Soft dhokla bites", "Flaky masala puff pastries"]}, {"title": "The Grazing Spread", "items": ["Seasonal fruits", "Artisanal cheeses", "Garden veggies & dips"]}, {"title": "Sweet Temptations", "items": ["Chocolate-dipped strawberries", "Assorted French macarons"]}, {"title": "Refreshments", "items": ["Rose lemonade", "Aam panna & kaanji", "Herbal teas"]}]}}');
        const galleryData = [{"src": "/graze-assets/images/grazing table_3.jpeg", "label": "Full Spread with Florals"}, {"src": "/graze-assets/images/grazing table_4.jpeg", "label": "Luxury Grazing Table"}, {"src": "/graze-assets/images/indo fusion_2.jpeg", "label": "Indo-Fusion Spread"}, {"src": "/graze-assets/images/indo fusion_3.jpeg", "label": "Gulab Jamun Display"}, {"src": "/graze-assets/images/indo fusion_4.jpeg", "label": "Indo-Fusion Bites"}, {"src": "/graze-assets/images/indo fusion_5.jpeg", "label": "Indo-Fusion Event"}, {"src": "/graze-assets/images/hightea_3.jpeg", "label": "High Tea Styling"}, {"src": "/graze-assets/images/hightea_5.jpeg", "label": "High Tea Setup"}, {"src": "/graze-assets/images/hightea_7.jpeg", "label": "High Tea Table Layout"}, {"src": "/graze-assets/images/hightea_8.jpeg", "label": "High Tea Ambiance"}, {"src": "/graze-assets/images/grazing table_6.JPG", "label": "Grazing Table Detail"}, {"src": "/graze-assets/images/grazing table_7.jpeg", "label": "Grazing Table Styling"}, {"src": "/graze-assets/images/grazing table_8.jpeg", "label": "Grazing Table Spread"}, {"src": "/graze-assets/images/grazing table_9.jpeg", "label": "Grazing Table Setup"}, {"src": "/graze-assets/images/grazing table_10.jpeg", "label": "Grazing Table Detail"}, {"src": "/graze-assets/images/charcuterie cups.JPG", "label": "Charcuterie Cups"}, {"src": "/graze-assets/images/charcuterie cups_1.JPG", "label": "Charcuterie Cups"}, {"src": "/graze-assets/images/kids charcuterie cups_1.JPG", "label": "Kids Charcuterie Cups"}, {"src": "/graze-assets/images/kids charcuterie cups_2.JPG", "label": "Kids Charcuterie Cups"}, {"src": "/graze-assets/images/return gift_2.jpeg", "label": "Custom Return Gifts"}, {"src": "/graze-assets/images/return gift_3.jpeg", "label": "Edible Art Gift"}, {"src": "/graze-assets/images/return gift_4.jpeg", "label": "Party Return Gifts"}, {"src": "/graze-assets/images/return gift_5.jpeg", "label": "Gift Box Spread"}, {"src": "/graze-assets/images/return gift_6.JPG", "label": "Custom Return Gifts"}];

        let activeServiceId = 'charcuterie-cups';

        // 1. Navigation Scroll Listener
        const header = document.getElementById('main-header');
        const headerBrandText = document.getElementById('header-brand-text');
        const headerNavLinks = document.querySelectorAll('.header-nav-link');
        const headerCtaBtn = document.getElementById('header-cta-btn');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileDrawer = document.getElementById('mobile-drawer');

        function updateHeader() {
            const scrolled = window.scrollY > 40;
            if (scrolled) {
                header.style.background = 'rgba(251, 249, 244, 0.97)';
                header.style.backdropFilter = 'blur(10px)';
                header.classList.add('shadow-[0_1px_0_#DDD5CC]');
                headerBrandText.style.color = '#3A2F2B';
                headerNavLinks.forEach(l => l.style.color = '#6B5C55');
                headerCtaBtn.style.background = '#C9A68F';
                headerCtaBtn.style.color = '#FBF9F4';
                headerCtaBtn.style.border = 'none';
                mobileMenuBtn.querySelectorAll('span').forEach(s => s.style.backgroundColor = '#3A2F2B');
            } else {
                header.style.background = 'transparent';
                header.style.backdropFilter = 'none';
                header.classList.remove('shadow-[0_1px_0_#DDD5CC]');
                headerBrandText.style.color = '#FBF9F4';
                headerNavLinks.forEach(l => l.style.color = 'rgba(255,255,255,0.85)');
                headerCtaBtn.style.background = 'rgba(255,255,255,0.15)';
                headerCtaBtn.style.color = '#FBF9F4';
                headerCtaBtn.style.border = '1px solid rgba(255,255,255,0.5)';
                mobileMenuBtn.querySelectorAll('span').forEach(s => s.style.backgroundColor = '#FFFFFF');
            }
        }
        window.addEventListener('scroll', updateHeader, { passive: true });
        updateHeader();

        // 2. Mobile Drawer Toggle
        let isDrawerOpen = false;
        function toggleDrawer(open) {
            isDrawerOpen = typeof open === 'boolean' ? open : !isDrawerOpen;
            if (isDrawerOpen) {
                mobileDrawer.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
                mobileDrawer.classList.add('opacity-100', 'translate-y-0');
                document.body.style.overflow = 'hidden';
            } else {
                mobileDrawer.classList.add('opacity-0', 'pointer-events-none', 'translate-y-[-10px]');
                mobileDrawer.classList.remove('opacity-100', 'translate-y-0');
                document.body.style.overflow = '';
            }
        }
        mobileMenuBtn.addEventListener('click', () => toggleDrawer());
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => toggleDrawer(false));
        });

        // 3. Render Services Tabs
        const tabsBar = document.getElementById('services-tabs-bar');
        const activeContent = document.getElementById('active-service-content');

        function renderServicesTabs() {
            tabsBar.innerHTML = '';
            servicesData.forEach(s => {
                const isActive = s.id === activeServiceId;
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = `relative flex flex-col items-start shrink-0 px-6 py-4 bg-transparent border-0 cursor-pointer transition-all duration-200 -mb-px border-b-2 ${isActive ? 'border-taupe' : 'border-transparent'}`;
                btn.innerHTML = `
                    <span class="font-sans text-[12px] font-bold uppercase tracking-[0.22em] mb-1.5 block text-taupe">${s.number}</span>
                    <span class="font-serif text-[16px] font-bold uppercase tracking-[0.06em] leading-snug whitespace-nowrap transition-colors duration-150 ${isActive ? 'text-espresso' : 'text-body-mid'}">${s.shortName}</span>
                `;
                btn.addEventListener('click', () => {
                    activeServiceId = s.id;
                    renderServicesTabs();
                    renderActiveService();
                });
                tabsBar.appendChild(btn);
            });
        }

        function renderActiveService() {
            const s = servicesData.find(item => item.id === activeServiceId);
            if (!s) return;

            let badgesHtml = '';
            if (s.badges && s.badges.length) {
                badgesHtml = '<div class="flex flex-wrap gap-2 mb-8">' +
                    s.badges.map(b => `<span class="font-sans text-[13px] font-semibold uppercase tracking-[0.14em] text-taupe border border-taupe px-3 py-1 rounded-md">${b}</span>`).join('') +
                    '</div>';
            }

            let buttonsHtml = `
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="#inquiry" onclick="preselectService('${s.id}')" class="btn-taupe text-center">Inquire About This Service</a>
                    ${s.fullMenu ? `<button type="button" onclick="openIndoMenuModal()" class="btn-outline">View Full Menu</button>` : ''}
                </div>
            `;

            let pricingCardsHtml = '';
            if (s.pricing) {
                pricingCardsHtml = s.pricing.map(p => `
                    <div class="p-5 border border-divider bg-surface rounded-md flex items-center justify-between gap-3">
                        <div>
                            <p class="font-serif text-[18px] font-bold uppercase tracking-[0.08em] text-espresso leading-snug">${p.size}</p>
                            <p class="font-sans text-[13px] text-muted mt-0.5">${p.guests}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <p class="font-serif text-[24px] font-semibold text-espresso leading-none">${p.price}</p>
                            <p class="font-sans text-[12px] text-muted mt-0.5">${p.perGuest}</p>
                        </div>
                    </div>
                `).join('');
            } else if (s.cupTiers) {
                pricingCardsHtml = s.cupTiers.map(t => `
                    <div class="p-5 border border-divider bg-surface rounded-md">
                        <div class="flex items-center justify-between gap-3 mb-3">
                            <div>
                                <p class="font-serif text-[18px] font-bold uppercase tracking-[0.08em] text-espresso leading-snug">${t.name}</p>
                                <p class="font-sans text-[13px] text-muted mt-0.5">${t.tagline}</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="font-serif text-[24px] font-semibold text-espresso leading-none">${t.price}</p>
                                <p class="font-sans text-[12px] text-muted mt-0.5">per cup</p>
                            </div>
                        </div>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1">
                            ${t.items.map(item => `<li class="font-sans text-[13px] text-body-mid flex gap-2 leading-snug"><span class="text-taupe shrink-0">—</span>${item}</li>`).join('')}
                        </ul>
                    </div>
                `).join('');
            } else if (s.packages) {
                pricingCardsHtml = s.packages.map(pkg => `
                    <div class="p-5 border border-divider bg-surface rounded-md">
                        ${pkg.highlight ? `<span class="inline-block font-sans text-[10px] font-bold uppercase tracking-[0.14em] bg-taupe text-parchment px-2.5 py-1 rounded-full mb-2">Most Popular</span>` : ''}
                        <div class="flex items-center justify-between gap-3 mb-3">
                            <div>
                                <p class="font-serif text-[18px] font-bold uppercase tracking-[0.08em] text-espresso leading-snug">${pkg.name}</p>
                                <p class="font-sans text-[13px] text-muted mt-0.5">${pkg.min}</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="font-serif text-[24px] font-semibold text-espresso leading-none">${pkg.price}</p>
                                <p class="font-sans text-[12px] text-muted mt-0.5">${pkg.perGuest}</p>
                            </div>
                        </div>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1 mb-3">
                            ${pkg.items.map(item => `<li class="font-sans text-[13px] text-body-mid flex gap-2 leading-snug"><span class="text-taupe shrink-0">—</span>${item}</li>`).join('')}
                        </ul>
                        ${highTeaData[pkg.name] ? `<button type="button" onclick="openHighTeaModal('${pkg.name}')" class="btn-outline text-[12px] py-1.5 px-3 mt-1">View Full Menu</button>` : ''}
                    </div>
                `).join('');
            }

            let boardsHtml = '';
            if (s.boardTiers) {
                boardsHtml = `
                    <div class="mt-12">
                        <p class="font-serif text-[18px] font-bold uppercase tracking-[0.1em] text-espresso mb-4">Charcuterie Boards</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            ${s.boardTiers.map(b => `
                                <div class="p-5 border border-divider bg-surface rounded-md flex flex-col items-center text-center">
                                    <p class="font-serif text-[18px] font-bold uppercase tracking-[0.08em] text-espresso leading-snug">${b.name}</p>
                                    <p class="font-sans text-[13px] text-muted mt-0.5 mb-3">${b.tagline}</p>
                                    <ul class="flex flex-col gap-1 mb-4">
                                        ${b.items.map(it => `<li class="font-sans text-[13px] text-body-mid leading-snug">${it}</li>`).join('')}
                                    </ul>
                                    <p class="font-serif text-[24px] font-semibold text-espresso leading-none mt-auto">${b.price}</p>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            }

            let volumePricingHtml = '';
            if (s.volumePricing) {
                volumePricingHtml = `
                    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                        <div>
                            <p class="font-serif text-[20px] font-semibold uppercase tracking-[0.08em] text-espresso mb-4">Volume Pricing</p>
                            <div class="space-y-3">
                                ${s.volumePricing.map(v => `
                                    <div class="p-4 border border-divider bg-surface rounded-md flex justify-between items-center">
                                        <span class="font-sans text-[14px] font-bold text-espresso">${v.qty}</span>
                                        <span class="font-sans text-[14px] text-taupe font-semibold">${v.discount}</span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                        ${s.menu ? `
                            <div>
                                <p class="font-serif text-[20px] font-semibold uppercase tracking-[0.08em] text-espresso mb-4">What's in Every Cup</p>
                                <div class="p-5 border border-divider bg-surface rounded-md space-y-4">
                                    ${s.menu.map(m => `
                                        <div>
                                            <p class="font-sans text-[13px] font-bold uppercase tracking-[0.14em] text-espresso mb-1">${m.title}</p>
                                            <p class="font-sans text-[14px] text-body-mid leading-relaxed">${m.desc}</p>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        ` : ''}
                    </div>
                `;
            }

            let stepsHtml = '';
            if (s.steps) {
                stepsHtml = `
                    <div class="mt-12">
                        <p class="font-serif text-[20px] font-semibold uppercase tracking-[0.08em] text-espresso mb-6">How It Works</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            ${s.steps.map(st => `
                                <div class="p-6 border border-divider bg-surface rounded-md">
                                    <span class="font-serif text-[28px] font-bold text-taupe mb-2 block">${st.step}</span>
                                    <h4 class="font-serif text-[17px] font-bold text-espresso mb-2 uppercase">${st.title}</h4>
                                    <p class="font-sans text-[14px] text-body-mid leading-relaxed">${st.desc}</p>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            }

            activeContent.innerHTML = `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">
                    <div>
                        <p class="font-sans text-[13px] font-bold uppercase tracking-[0.18em] mb-3 text-taupe">${s.number} &nbsp;/&nbsp; ${s.tagline}</p>
                        <h3 class="font-serif font-bold uppercase leading-tight mb-3 tracking-[0.08em] text-espresso" style="font-size: clamp(26px, 3.5vw, 38px);">${s.name}</h3>
                        <div class="taupe-rule"></div>
                        <p class="font-sans mb-6 text-[17px] text-body-mid leading-[1.85]">${s.desc}</p>
                        ${badgesHtml}
                        ${buttonsHtml}
                    </div>

                    ${s.photo ? `
                        <div class="relative w-full aspect-[4/5] max-h-[560px] overflow-hidden rounded-md shadow-md">
                            <img src="${s.photo}" alt="${s.name}" class="w-full h-full object-cover ${s.photoPosition || 'object-center'}">
                        </div>
                    ` : `
                        <div class="w-full min-h-[300px] rounded-md border-2 border-dashed border-divider bg-surface flex items-center justify-center">
                            <p class="font-sans text-[13px] text-muted uppercase tracking-[0.18em]">Custom Curation Available</p>
                        </div>
                    `}
                </div>

                ${pricingCardsHtml ? `
                    <div class="mt-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            ${pricingCardsHtml}
                        </div>
                        ${s.note ? `<p class="font-sans text-[13px] text-muted mt-3 italic">${s.note}</p>` : ''}
                    </div>
                ` : ''}

                ${boardsHtml}
                ${volumePricingHtml}
                ${stepsHtml}
            `;
        }

        // 4. Render Gallery
        const galleryTrack = document.getElementById('gallery-carousel-track');
        function renderGallery() {
            galleryTrack.innerHTML = '';
            galleryData.forEach(img => {
                const slide = document.createElement('div');
                slide.className = 'carousel-slide flex-shrink-0 relative overflow-hidden aspect-[3/4] bg-parchment border border-divider rounded-md shadow-sm';
                slide.style.width = 'clamp(280px, 75vw, 380px)';
                slide.innerHTML = `
                    <img src="${img.src}" alt="${img.label}" class="w-full h-full object-cover object-center" loading="lazy">
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-3" style="background: linear-gradient(to top, rgba(30,20,15,0.75), transparent);">
                        <p class="font-serif text-[15px] font-semibold text-white tracking-[0.06em]">${img.label}</p>
                    </div>
                `;
                galleryTrack.appendChild(slide);
            });
        }

        document.getElementById('gallery-prev-btn').addEventListener('click', () => {
            galleryTrack.scrollBy({ left: -360, behavior: 'smooth' });
        });
        document.getElementById('gallery-next-btn').addEventListener('click', () => {
            galleryTrack.scrollBy({ left: 360, behavior: 'smooth' });
        });

        // 5. Pre-select service in quote form
        window.preselectService = function(serviceId) {
            const select = document.getElementById('service');
            if (select) {
                select.value = serviceId;
            }
        };

        // 6. Indo-Fusion Menu Modal
        const indoModal = document.getElementById('indo-fusion-modal');
        let indoActiveCategory = 'chaat';

        window.openIndoMenuModal = function() {
            indoModal.classList.remove('opacity-0', 'pointer-events-none');
            indoModal.classList.add('opacity-100');
            document.body.style.overflow = 'hidden';
            renderIndoMenu();
        };

        // On-Page Menu State
        let onpageActiveCategory = 'snacks';

        function renderOnPageMenu() {
            const indoService = servicesData.find(s => s.id === 'indo-fusion');
            if (!indoService || !indoService.fullMenu) return;

            const tabs = document.getElementById('onpage-menu-tabs');
            if (!tabs) return;

            tabs.innerHTML = indoService.fullMenu.categories.map(cat => {
                const isActive = cat.id === onpageActiveCategory;
                return `
                    <button type="button" onclick="switchOnPageMenuCategory('${cat.id}')"
                            class="px-5 py-2.5 rounded-full text-[12px] font-bold uppercase tracking-[0.14em] whitespace-nowrap transition-all duration-200 ${isActive ? 'bg-espresso text-parchment shadow-sm' : 'text-espresso/70 hover:text-espresso hover:bg-white/70'}">
                        ${cat.label}
                    </button>
                `;
            }).join('');

            const activeCat = indoService.fullMenu.categories.find(c => c.id === onpageActiveCategory) || indoService.fullMenu.categories[0];
            
            const subElem = document.getElementById('onpage-category-subtitle');
            if (subElem) {
                subElem.textContent = activeCat.subtitle || '';
            }

            const itemsCont = document.getElementById('onpage-menu-items');
            if (!itemsCont) return;

            itemsCont.innerHTML = activeCat.items.map(it => `
                <div class="bg-white hover:bg-[#FAF8F5] border border-divider/70 rounded-xl p-4 sm:p-5 transition-all duration-200 flex flex-col justify-between shadow-[0_1px_4px_rgba(0,0,0,0.02)] hover:shadow-md hover:border-taupe/60 group">
                    <div>
                        <div class="flex items-baseline justify-between gap-3">
                            <div class="flex items-center gap-2 flex-wrap flex-1">
                                <h4 class="font-serif text-[18px] sm:text-[19px] font-bold text-espresso group-hover:text-taupe transition-colors leading-snug">${it.name}</h4>
                                <span class="text-[9px] uppercase font-bold tracking-wider px-2 py-0.5 rounded-full ${it.type === 'Veg' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : (it.type === 'Non-Veg' ? 'bg-amber-50 text-amber-900 border border-amber-200' : 'bg-stone-100 text-stone-800 border border-stone-200')}">${it.type}</span>
                            </div>
                            <div class="text-right shrink-0">
                                <span class="font-serif text-[19px] font-bold text-taupe">${it.price}</span>
                                ${it.unit ? `<span class="font-sans text-[11px] text-body-mid font-medium inline-block ml-0.5">${it.unit}</span>` : ''}
                            </div>
                        </div>
                        ${it.desc ? `<p class="font-sans text-[13px] text-body-mid italic mt-2 leading-relaxed">${it.desc}</p>` : ''}
                    </div>
                </div>
            `).join('');
        }

        window.switchOnPageMenuCategory = function(catId) {
            onpageActiveCategory = catId;
            renderOnPageMenu();
        };

        function renderIndoMenu() {
            const indoService = servicesData.find(s => s.id === 'indo-fusion');
            if (!indoService || !indoService.fullMenu) return;

            const tabs = document.getElementById('indo-menu-tabs');
            tabs.innerHTML = indoService.fullMenu.categories.map(cat => `
                <button type="button" onclick="switchIndoCategory('${cat.id}')" class="px-4 py-3 text-[13px] font-bold uppercase tracking-[0.14em] whitespace-nowrap border-b-2 transition-colors ${cat.id === indoActiveCategory ? 'border-taupe text-espresso' : 'border-transparent text-muted hover:text-espresso'}">
                    ${cat.label}
                </button>
            `).join('');

            const activeCat = indoService.fullMenu.categories.find(c => c.id === indoActiveCategory) || indoService.fullMenu.categories[0];
            const itemsCont = document.getElementById('indo-menu-items');
            itemsCont.innerHTML = activeCat.items.map(it => `
                <div class="py-3 flex justify-between items-start gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-serif text-[17px] font-bold text-espresso">${it.name}</h4>
                            <span class="text-[10px] uppercase font-bold px-1.5 py-0.5 rounded ${it.type === 'Veg' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">${it.type}</span>
                        </div>
                        <p class="font-sans text-[13px] text-muted mt-0.5">${it.desc || ''}</p>
                    </div>
                    <div class="text-right shrink-0">
                        <span class="font-serif text-[18px] font-semibold text-espresso">${it.price}</span>
                        ${it.unit ? `<span class="font-sans text-[12px] text-muted block">${it.unit}</span>` : ''}
                    </div>
                </div>
            `).join('');
        }

        window.switchIndoCategory = function(catId) {
            indoActiveCategory = catId;
            renderIndoMenu();
        };

        // 7. High Tea Menu Modal
        const htModal = document.getElementById('high-tea-modal');
        window.openHighTeaModal = function(pkgName) {
            const data = highTeaData[pkgName];
            if (!data) return;

            document.getElementById('ht-modal-title').textContent = data.title;
            document.getElementById('ht-modal-price').textContent = data.priceLabel || `${data.price || ''} per person`;

            const secCont = document.getElementById('ht-modal-sections');
            secCont.innerHTML = data.sections.map(sec => `
                <div class="border-b border-divider pb-4 last:border-0">
                    <h4 class="font-serif text-[18px] font-bold text-espresso uppercase tracking-[0.06em] mb-1">${sec.title}</h4>
                    ${sec.subtitle ? `<p class="font-sans text-[12px] text-taupe uppercase font-semibold tracking-wider mb-2">${sec.subtitle}</p>` : ''}
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1 mt-2">
                        ${sec.items.map(it => `<li class="font-sans text-[13px] text-body-mid flex gap-2"><span class="text-taupe">—</span>${it}</li>`).join('')}
                    </ul>
                </div>
            `).join('');

            htModal.classList.remove('opacity-0', 'pointer-events-none');
            htModal.classList.add('opacity-100');
            document.body.style.overflow = 'hidden';
        };

        // Modal Close Handlers
        document.querySelectorAll('.close-modal-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                indoModal.classList.add('opacity-0', 'pointer-events-none');
                htModal.classList.add('opacity-0', 'pointer-events-none');
                document.body.style.overflow = '';
            });
        });
        [indoModal, htModal].forEach(m => {
            m.addEventListener('click', (e) => {
                if (e.target === m) {
                    m.classList.add('opacity-0', 'pointer-events-none');
                    document.body.style.overflow = '';
                }
            });
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                indoModal.classList.add('opacity-0', 'pointer-events-none');
                htModal.classList.add('opacity-0', 'pointer-events-none');
                document.body.style.overflow = '';
            }
        });

        // 8. Inquire Form WhatsApp Submission
        const inquiryForm = document.getElementById('inquiry-form');
        const toast = document.getElementById('toast');
        let toastTimeout;

        function showToast(title, message, isSuccess = true) {
            if (toastTimeout) clearTimeout(toastTimeout);
            document.getElementById('toast-title').textContent = title;
            document.getElementById('toast-message').textContent = message;
            toast.className = `fixed bottom-6 right-6 z-50 max-w-sm w-full px-5 py-4 rounded-md shadow-lg border transition-all duration-300 opacity-100 translate-x-0 ${isSuccess ? 'bg-espresso border-taupe text-parchment' : 'bg-red-800 border-red-500 text-white'}`;
            toastTimeout = setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-x-8', 'pointer-events-none');
                toast.classList.remove('opacity-100', 'translate-x-0');
            }, 5000);
        }

        inquiryForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = inquiryForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Saving &amp; Opening WhatsApp...</span>';
            }

            const formData = new FormData(inquiryForm);
            const data = Object.fromEntries(formData.entries());

            const lines = [
                "Hi Graze & Gift Co.! I'd like to inquire about your services.",
                `Name: ${data.fullName}`,
                `Phone: ${data.phone}`,
                `Email: ${data.email}`,
                `Event Date: ${data.date}`,
                `City / Venue: ${data.city}`,
                `Guests: ${data.guests}`,
                `Budget: ${data.budget}`,
                `Event Type: ${data.eventType}`,
                `Service: ${data.service}`,
                data.dietary ? `Dietary: ${data.dietary}` : null,
                data.vision ? `Notes: ${data.vision}` : null
            ].filter(Boolean);

            const waText = encodeURIComponent(lines.join("\n"));
            const waUrl = `https://wa.me/16047616232?text=${waText}`;

            // Save inquiry to backend database
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

            try {
                await fetch('/api/graze/inquiry', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });
            } catch (err) {
                console.warn('API submission note:', err);
            }

            // Always open WhatsApp for seamless customer experience
            window.open(waUrl, '_blank');

            showToast("Inquiry Confirmed", "Opening WhatsApp chat. We have saved your event details and will be in touch!");
            inquiryForm.reset();

            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });

        // Initialize on load
        renderServicesTabs();
        renderActiveService();
        renderOnPageMenu();
        renderGallery();
    </script>
</body>
</html>
