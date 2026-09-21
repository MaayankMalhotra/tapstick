<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Portal · Graze &amp; Gift Co.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        espresso: '#2C221E',
                        taupe: '#C9A68F',
                        gold: '#D4AF37',
                        parchment: '#FBF9F4',
                        linen: '#F4EFEB',
                        charcoal: '#1A1412'
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-charcoal text-parchment font-sans min-h-screen flex items-center justify-center p-4 selection:bg-taupe selection:text-espresso">
    <div class="w-full max-w-md bg-[#231B18] border border-taupe/30 rounded-2xl shadow-2xl p-8 sm:p-10 relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-taupe/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-gold/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-full border border-taupe/40 bg-espresso flex items-center justify-center mx-auto mb-4 shadow-inner">
                <span class="font-serif text-2xl font-bold tracking-wider text-taupe">G&amp;G</span>
            </div>
            <p class="text-[11px] font-bold tracking-[0.25em] uppercase text-taupe mb-1">Catering &amp; Events Portal</p>
            <h1 class="font-serif text-3xl font-light tracking-wide text-parchment">Graze &amp; Gift Co.</h1>
            <p class="text-xs text-parchment/60 mt-2">Sign in to manage client inquiries, dates, &amp; quotes</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-3.5 bg-emerald-950/70 border border-emerald-500/40 text-emerald-200 text-xs rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-3.5 bg-rose-950/70 border border-rose-500/40 text-rose-200 text-xs rounded-lg">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('graze.admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs uppercase tracking-widest text-taupe/90 font-semibold mb-2">Admin Email / Username</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="admin@tabstick.in or Manager"
                       class="w-full px-4 py-3 bg-espresso/80 border border-taupe/30 rounded-xl text-sm text-parchment placeholder-parchment/30 focus:outline-none focus:border-taupe focus:ring-1 focus:ring-taupe transition-colors">
            </div>

            <div>
                <label for="password" class="block text-xs uppercase tracking-widest text-taupe/90 font-semibold mb-2">Password / Passcode *</label>
                <input type="password" id="password" name="password" required placeholder="Enter password or access key"
                       class="w-full px-4 py-3 bg-espresso/80 border border-taupe/30 rounded-xl text-sm text-parchment placeholder-parchment/30 focus:outline-none focus:border-taupe focus:ring-1 focus:ring-taupe transition-colors">
                <p class="text-[11px] text-parchment/40 mt-1.5">You can sign in with your Tabstick Admin account or Graze passcode.</p>
            </div>

            <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-taupe to-[#b88e73] hover:from-[#d1b09b] hover:to-taupe text-espresso font-semibold text-xs tracking-widest uppercase transition-all duration-300 shadow-lg hover:shadow-taupe/20 mt-2">
                Access Admin Portal
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-taupe/20 flex items-center justify-between text-xs text-parchment/60">
            <a href="{{ url('/graze-n-gifts') }}" class="hover:text-taupe transition-colors">← Back to Website</a>
            <a href="{{ route('admin.dashboard') }}" class="hover:text-taupe transition-colors">Tabstick Admin ↗</a>
        </div>
    </div>
</body>
</html>
