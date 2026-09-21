<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquiries &amp; Bookings · Graze &amp; Gift Co. Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        espresso: '#2C221E',
                        'espresso-dark': '#1C1513',
                        taupe: '#C9A68F',
                        'taupe-light': '#E8DACF',
                        gold: '#D4AF37',
                        parchment: '#FBF9F4',
                        linen: '#F4EFEB',
                        divider: '#E5DCD5',
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .custom-scroll::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scroll::-webkit-scrollbar-track { background: #F4EFEB; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #C9A68F; border-radius: 3px; }
    </style>
</head>
<body class="bg-linen text-espresso font-sans min-h-screen selection:bg-taupe selection:text-white">

    <!-- Top Navigation -->
    <header class="bg-espresso text-parchment border-b border-taupe/20 sticky top-0 z-30 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('graze.admin.index') }}" class="flex items-center gap-3 no-underline group">
                    <div class="w-9 h-9 rounded-full border border-taupe/40 bg-espresso-dark flex items-center justify-center shadow-inner group-hover:border-taupe transition-colors">
                        <span class="font-serif text-sm font-bold tracking-wider text-taupe">G&amp;G</span>
                    </div>
                    <div>
                        <span class="font-serif text-lg tracking-wide block leading-tight text-parchment">Graze &amp; Gift Co.</span>
                        <span class="text-[9px] font-bold tracking-[0.2em] uppercase text-taupe block">Catering Admin Portal</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-3 sm:gap-5 text-xs">
                <a href="{{ url('/graze-n-gifts') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1 text-parchment/70 hover:text-taupe transition-colors">
                    <span>Live Page</span>
                    <span class="text-[10px]">↗</span>
                </a>
                <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center gap-1 text-parchment/70 hover:text-taupe transition-colors">
                    <span>Tabstick Admin</span>
                    <span class="text-[10px]">↗</span>
                </a>

                <div class="h-4 w-px bg-taupe/20 hidden sm:block"></div>

                <div class="flex items-center gap-3">
                    <span class="hidden md:inline text-parchment/60 text-[11px]">
                        Signed in: <strong class="text-parchment font-medium">{{ $adminName }}</strong>
                    </span>
                    <form method="POST" action="{{ route('graze.admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-1.5 rounded-lg border border-taupe/30 hover:bg-taupe hover:text-espresso text-parchment text-[11px] font-medium transition-all">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Flash Notices -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between text-sm shadow-sm">
                <div class="flex items-center gap-2">
                    <span class="text-base">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-sm font-bold">✕</button>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm shadow-sm">
                <div class="font-semibold mb-1">Please correct the following:</div>
                <ul class="list-disc pl-5 space-y-0.5">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header Title & Export Action -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-[0.25em] text-taupe mb-1">Catering Pipeline &amp; Event Booking</p>
                <h1 class="font-serif text-3xl sm:text-4xl text-espresso font-semibold">Client Inquiries</h1>
                <p class="text-xs sm:text-sm text-espresso/70 mt-1">Real-time incoming quotes, charcuterie orders, and event dates.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('graze.admin.export') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white rounded-xl text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Export CSV</span>
                </a>
            </div>
        </div>

        <!-- KPI Stat Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 mb-8">
            <div class="bg-white p-4 rounded-xl border border-divider shadow-sm">
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-espresso/60 block">Total Inquiries</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-espresso mt-1 block">{{ $stats['total'] }}</span>
                <span class="text-[10px] text-espresso/50 mt-1 block">All-time submissions</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-amber-200/80 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-1.5 h-full bg-amber-400"></div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-amber-800 block">New Leads</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-amber-900 mt-1 block">{{ $stats['new'] }}</span>
                <span class="text-[10px] text-amber-700/80 mt-1 block">Needs contact / reply</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-purple-200/80 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-1.5 h-full bg-purple-400"></div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-purple-800 block">Quotes Sent</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-purple-900 mt-1 block">{{ $stats['quoted'] }}</span>
                <span class="text-[10px] text-purple-700/80 mt-1 block">Proposal in client hands</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-emerald-200/80 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-1.5 h-full bg-emerald-500"></div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-emerald-800 block">Confirmed</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-emerald-900 mt-1 block">{{ $stats['confirmed'] }}</span>
                <span class="text-[10px] text-emerald-700/80 mt-1 block">Deposit paid / locked</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-sky-200/80 shadow-sm relative overflow-hidden col-span-2 sm:col-span-1">
                <div class="absolute top-0 right-0 w-1.5 h-full bg-sky-500"></div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-sky-800 block">Upcoming Dates</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-sky-900 mt-1 block">{{ $stats['upcoming'] }}</span>
                <span class="text-[10px] text-sky-700/80 mt-1 block">Future calendar events</span>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-divider shadow-sm mb-6">
            <form method="GET" action="{{ route('graze.admin.index') }}" class="flex flex-col lg:flex-row lg:items-center gap-3">
                <div class="flex-1 relative">
                    <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="Search client name, phone, email, venue, or vision..."
                           class="w-full pl-10 pr-4 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs sm:text-sm text-espresso placeholder-espresso/40 focus:outline-none focus:border-taupe focus:ring-1 focus:ring-taupe transition-colors">
                    <svg class="w-4 h-4 text-espresso/40 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3">
                    <select name="status" onchange="this.form.submit()" class="px-3 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs text-espresso focus:outline-none focus:border-taupe">
                        <option value="">All Statuses</option>
                        @foreach(\App\Models\GrazeInquiry::$statuses as $key => $label)
                            <option value="{{ $key }}" {{ ($status ?? '') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>

                    <select name="service" onchange="this.form.submit()" class="px-3 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs text-espresso focus:outline-none focus:border-taupe">
                        <option value="">All Services</option>
                        @foreach(\App\Models\GrazeInquiry::$services as $key => $label)
                            <option value="{{ $key }}" {{ ($service ?? '') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>

                    <select name="sort" onchange="this.form.submit()" class="col-span-2 sm:col-span-1 px-3 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs text-espresso focus:outline-none focus:border-taupe">
                        <option value="latest" {{ ($sort ?? '') === 'latest' ? 'selected' : '' }}>Newest Submitted</option>
                        <option value="event_asc" {{ ($sort ?? '') === 'event_asc' ? 'selected' : '' }}>Event Date (Soonest)</option>
                        <option value="event_desc" {{ ($sort ?? '') === 'event_desc' ? 'selected' : '' }}>Event Date (Latest)</option>
                        <option value="oldest" {{ ($sort ?? '') === 'oldest' ? 'selected' : '' }}>Oldest Submitted</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="px-4 py-2.5 bg-espresso hover:bg-espresso-dark text-parchment rounded-xl text-xs font-semibold uppercase tracking-wider transition-colors">
                        Filter
                    </button>
                    @if(!empty($q) || !empty($status) || !empty($service) || ($sort ?? 'latest') !== 'latest')
                        <a href="{{ route('graze.admin.index') }}" class="px-3 py-2.5 bg-linen text-espresso/70 hover:text-espresso rounded-xl text-xs font-semibold transition-colors">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Inquiries Table -->
        <div class="bg-white rounded-2xl border border-divider shadow-sm overflow-hidden mb-6">
            <div class="overflow-x-auto custom-scroll">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-linen/80 border-b border-divider text-[11px] font-bold uppercase tracking-wider text-espresso/70">
                            <th class="py-3.5 px-4">Client</th>
                            <th class="py-3.5 px-4">Direct Contact</th>
                            <th class="py-3.5 px-4">Event Date &amp; Venue</th>
                            <th class="py-3.5 px-4">Service &amp; Dietary</th>
                            <th class="py-3.5 px-4">Guests &amp; Budget</th>
                            <th class="py-3.5 px-4">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-divider/70">
                        @forelse($inquiries as $inquiry)
                            @php
                                $statusColors = [
                                    'new' => 'bg-amber-100 text-amber-800 border-amber-300',
                                    'contacted' => 'bg-blue-100 text-blue-800 border-blue-300',
                                    'quoted' => 'bg-purple-100 text-purple-800 border-purple-300',
                                    'confirmed' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
                                    'completed' => 'bg-gray-100 text-gray-700 border-gray-300',
                                    'cancelled' => 'bg-rose-100 text-rose-800 border-rose-300',
                                ];
                                $badgeClass = $statusColors[$inquiry->status] ?? 'bg-gray-100 text-gray-800 border-gray-300';
                            @endphp
                            <tr class="hover:bg-linen/40 transition-colors">
                                <td class="py-4 px-4 align-top">
                                    <div class="font-bold text-sm text-espresso">{{ $inquiry->full_name }}</div>
                                    <div class="text-[11px] text-espresso/50 mt-0.5">
                                        #{{ $inquiry->id }} · {{ $inquiry->created_at?->diffForHumans() }}
                                    </div>
                                    @if($inquiry->event_type)
                                        <span class="inline-block mt-1 px-2 py-0.5 bg-taupe/20 text-espresso text-[10px] font-semibold rounded-md uppercase tracking-wider">
                                            {{ $inquiry->event_type_label }}
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <div class="space-y-1.5">
                                        @if($inquiry->wa_link)
                                            <a href="{{ $inquiry->wa_link }}" target="_blank" rel="noopener noreferrer"
                                               class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-[#25D366]/15 hover:bg-[#25D366]/25 border border-[#25D366]/40 text-[#075e54] font-bold rounded-lg text-[11px] transition-colors"
                                               title="Open WhatsApp chat with prefilled message">
                                                <span>💬</span>
                                                <span>{{ $inquiry->phone }}</span>
                                            </a>
                                        @else
                                            <span class="font-mono text-espresso/80">{{ $inquiry->phone }}</span>
                                        @endif

                                        <div>
                                            <a href="mailto:{{ $inquiry->email }}" class="text-blue-700 hover:underline text-[11px] block font-medium">
                                                {{ $inquiry->email }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <div class="font-bold text-espresso text-[13px]">
                                        {{ $inquiry->event_date ? date('M d, Y', strtotime($inquiry->event_date)) : 'Date TBD' }}
                                    </div>
                                    <div class="text-[11px] text-espresso/70 mt-0.5 flex items-center gap-1">
                                        <span>📍</span>
                                        <span>{{ $inquiry->city ?: 'Location not specified' }}</span>
                                    </div>
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <div class="font-semibold text-espresso">{{ $inquiry->service_label }}</div>
                                    @if($inquiry->dietary && $inquiry->dietary !== 'na')
                                        <div class="text-[11px] text-emerald-800 font-medium mt-1 inline-flex items-center gap-1 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                                            <span>🌱</span>
                                            <span>{{ $inquiry->dietary_label }}</span>
                                        </div>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <div class="text-espresso">
                                        <strong class="text-sm font-semibold">{{ $inquiry->guest_count ?: '—' }}</strong> guests
                                    </div>
                                    <div class="text-[11px] text-taupe font-bold uppercase tracking-wider mt-0.5">
                                        {{ $inquiry->budget_label ?: 'Budget TBD' }}
                                    </div>
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold border {{ $badgeClass }}">
                                        {{ $inquiry->status_label }}
                                    </span>
                                    @if($inquiry->admin_notes)
                                        <div class="text-[10px] text-espresso/60 italic mt-1 line-clamp-1 max-w-[140px]" title="{{ $inquiry->admin_notes }}">
                                            📝 {{ $inquiry->admin_notes }}
                                        </div>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top text-right">
                                    <button type="button" onclick="openDetailsModal({{ json_encode($inquiry) }})"
                                            class="px-3 py-1.5 bg-taupe/20 hover:bg-taupe text-espresso rounded-lg font-semibold text-xs transition-colors">
                                        Manage
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-espresso/60">
                                    <div class="text-3xl mb-2">🧀🍇</div>
                                    <div class="font-serif text-lg text-espresso font-semibold">No Inquiries Found</div>
                                    <p class="text-xs text-espresso/50 mt-1">When visitors submit the quote request form on /graze-n-gifts, they will appear here in real time.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($inquiries->hasPages())
                <div class="p-4 border-t border-divider bg-linen/30">
                    {{ $inquiries->links() }}
                </div>
            @endif
        </div>

    </main>

    <!-- Details & Status Modal -->
    <div id="details-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] flex flex-col shadow-2xl border border-divider overflow-hidden transform transition-all">
            
            <!-- Modal Header -->
            <div class="px-6 py-4 bg-espresso text-parchment flex items-center justify-between border-b border-taupe/20">
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-[0.2em] text-taupe block">Client Inquiry</span>
                    <h3 id="modal-client-name" class="font-serif text-2xl font-semibold text-parchment">Client Name</h3>
                </div>
                <button onclick="closeDetailsModal()" class="text-parchment/60 hover:text-parchment text-lg font-bold">✕</button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto custom-scroll space-y-6 flex-1 text-xs sm:text-sm">
                
                <!-- Quick Contact Bar -->
                <div class="flex flex-wrap items-center gap-2 p-3 bg-linen/60 rounded-xl border border-divider">
                    <a id="modal-wa-btn" href="#" target="_blank" class="px-3 py-1.5 bg-[#25D366] text-white font-bold rounded-lg text-xs flex items-center gap-1.5 shadow-sm">
                        <span>💬 WhatsApp Client</span>
                    </a>
                    <a id="modal-call-btn" href="#" class="px-3 py-1.5 bg-sky-600 text-white font-bold rounded-lg text-xs flex items-center gap-1.5 shadow-sm">
                        <span>📞 Call</span>
                    </a>
                    <a id="modal-email-btn" href="#" class="px-3 py-1.5 bg-slate-700 text-white font-bold rounded-lg text-xs flex items-center gap-1.5 shadow-sm">
                        <span>✉️ Email</span>
                    </a>
                </div>

                <!-- Event Info Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 p-4 bg-parchment rounded-xl border border-divider/60">
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">Event Date</span>
                        <strong id="modal-date" class="text-sm font-bold text-espresso block mt-0.5">—</strong>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">City / Venue</span>
                        <strong id="modal-city" class="text-sm font-bold text-espresso block mt-0.5">—</strong>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">Event Type</span>
                        <strong id="modal-event-type" class="text-sm font-bold text-espresso block mt-0.5">—</strong>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">Service</span>
                        <strong id="modal-service" class="text-sm font-bold text-espresso block mt-0.5">—</strong>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">Guests</span>
                        <strong id="modal-guests" class="text-sm font-bold text-espresso block mt-0.5">—</strong>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block">Budget</span>
                        <strong id="modal-budget" class="text-sm font-bold text-taupe block mt-0.5">—</strong>
                    </div>
                </div>

                <!-- Dietary Preference -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block mb-1">Dietary Requirement</span>
                    <div id="modal-dietary" class="p-3 bg-white rounded-xl border border-divider text-espresso font-medium">None specified</div>
                </div>

                <!-- Vision Statement -->
                <div>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-espresso/50 block mb-1">Client Vision &amp; Notes</span>
                    <div id="modal-vision" class="p-4 bg-linen/50 rounded-xl border border-divider text-espresso leading-relaxed italic whitespace-pre-wrap">No vision provided</div>
                </div>

                <!-- Status & Internal Admin Notes Form -->
                <form id="modal-update-form" method="POST" action="" class="space-y-4 pt-4 border-t border-divider">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="modal-status-select" class="block text-xs font-bold uppercase tracking-wider text-espresso/70 mb-1.5">Update Status</label>
                            <select id="modal-status-select" name="status" class="w-full px-3 py-2.5 bg-white border border-divider rounded-xl text-xs sm:text-sm text-espresso font-semibold focus:outline-none focus:border-taupe">
                                @foreach(\App\Models\GrazeInquiry::$statuses as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-end justify-end">
                            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-espresso hover:bg-espresso-dark text-parchment rounded-xl font-semibold text-xs uppercase tracking-wider transition-colors shadow-sm">
                                Save Updates
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="modal-admin-notes" class="block text-xs font-bold uppercase tracking-wider text-espresso/70 mb-1.5">Internal Admin Notes (Quote details, dietary customizations, booking terms)</label>
                        <textarea id="modal-admin-notes" name="admin_notes" rows="3" placeholder="Add internal notes for your team..."
                                  class="w-full p-3 bg-white border border-divider rounded-xl text-xs sm:text-sm text-espresso focus:outline-none focus:border-taupe"></textarea>
                    </div>
                </form>

            </div>

            <!-- Modal Footer with Delete Option -->
            <div class="px-6 py-3 bg-linen/60 border-t border-divider flex items-center justify-between">
                <form id="modal-delete-form" method="POST" action="" onsubmit="return confirm('Permanently delete this inquiry?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-semibold">
                        🗑 Delete Inquiry
                    </button>
                </form>

                <button type="button" onclick="closeDetailsModal()" class="px-4 py-2 bg-white border border-divider text-espresso/80 hover:text-espresso rounded-xl text-xs font-medium">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('details-modal');

        function openDetailsModal(inquiry) {
            document.getElementById('modal-client-name').textContent = inquiry.full_name || 'Guest Client';
            document.getElementById('modal-date').textContent = inquiry.event_date || 'Date TBD';
            document.getElementById('modal-city').textContent = inquiry.city || 'Not specified';
            document.getElementById('modal-event-type').textContent = inquiry.event_type || 'General';
            document.getElementById('modal-service').textContent = inquiry.service || 'Catering';
            document.getElementById('modal-guests').textContent = inquiry.guest_count ? inquiry.guest_count + ' guests' : 'TBD';
            document.getElementById('modal-budget').textContent = inquiry.budget || 'TBD';
            document.getElementById('modal-dietary').textContent = inquiry.dietary || 'None specified';
            document.getElementById('modal-vision').textContent = inquiry.vision || 'No additional vision notes submitted by client.';

            // Contact actions
            const waClean = (inquiry.phone || '').replace(/[^0-9]/g, '');
            const waNumber = waClean.length === 10 ? '1' + waClean : waClean;
            const waText = encodeURIComponent(`Hi ${inquiry.full_name || ''}! Thank you for inquiring with Graze & Gift Co. regarding your event on ${inquiry.event_date || ''}.`);
            
            document.getElementById('modal-wa-btn').href = `https://wa.me/${waNumber}?text=${waText}`;
            document.getElementById('modal-call-btn').href = `tel:${inquiry.phone}`;
            document.getElementById('modal-email-btn').href = `mailto:${inquiry.email}`;

            // Form actions
            const baseUpdateUrl = "{{ url('/graze-n-gifts/admin/inquiries') }}/" + inquiry.id;
            document.getElementById('modal-update-form').action = baseUpdateUrl;
            document.getElementById('modal-delete-form').action = baseUpdateUrl;

            document.getElementById('modal-status-select').value = inquiry.status || 'new';
            document.getElementById('modal-admin-notes').value = inquiry.admin_notes || '';

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDetailsModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeDetailsModal();
        });
    </script>
</body>
</html>
