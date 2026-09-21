<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catering Menu Manager · Graze &amp; Gift Co. Admin</title>
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
                        <span class="text-[9px] font-bold tracking-[0.2em] uppercase text-taupe block">Menu Management Portal</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-3 sm:gap-5 text-xs">
                <a href="{{ url('/graze-n-gifts#menu') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1 text-parchment/70 hover:text-taupe transition-colors">
                    <span>Live Menu ↗</span>
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

        <!-- Top Navigation Mode Switcher -->
        <div class="flex items-center gap-2 mb-8 border-b border-divider pb-4 overflow-x-auto">
            <a href="{{ route('graze.admin.index') }}" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold tracking-wide text-espresso/70 hover:text-espresso hover:bg-white/60 transition-all flex items-center gap-2">
                <span>📋 Client Inquiries</span>
                @php $inquiryCount = \App\Models\GrazeInquiry::where('status', 'new')->count(); @endphp
                @if($inquiryCount > 0)
                    <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-bold border border-amber-300">{{ $inquiryCount }} NEW</span>
                @endif
            </a>
            <a href="{{ route('graze.admin.menu.index') }}" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold tracking-wide bg-espresso text-parchment shadow-sm flex items-center gap-2">
                <span>🍽️ Catering Menu Manager</span>
                <span class="px-2 py-0.5 rounded-full bg-taupe text-espresso text-[10px] font-bold">{{ $stats['total_items'] }}</span>
            </a>
        </div>

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

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl flex items-center justify-between text-sm shadow-sm">
                <div class="flex items-center gap-2">
                    <span class="text-base">⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-800 text-sm font-bold">✕</button>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm shadow-sm">
                <div class="font-semibold mb-1">Please correct the following:</div>
                <ul class="list-disc pl-5 space-y-0.5">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header Title & Add Item Action -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-[0.25em] text-taupe mb-1">Storefront Menu CMS</p>
                <h1 class="font-serif text-3xl sm:text-4xl text-espresso font-semibold">Catering Menu Items</h1>
                <p class="text-xs sm:text-sm text-espresso/70 mt-1">Add, edit pricing, descriptions, and dietary options across all 6 categories.</p>
            </div>

            <div class="flex items-center gap-3">
                <button type="button" onclick="openAddCategoryModal()" class="inline-flex items-center gap-2 px-4 py-3 bg-white hover:bg-linen border border-divider text-espresso rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-sm">
                    <span class="text-base leading-none font-bold">+</span>
                    <span>New Category</span>
                </button>
                <button type="button" onclick="openAddModal()" class="inline-flex items-center gap-2 px-5 py-3 bg-taupe hover:bg-[#b88e73] text-espresso rounded-xl text-xs font-bold tracking-wider uppercase transition-all shadow-md">
                    <span class="text-base leading-none font-bold">+</span>
                    <span>Add New Dish</span>
                </button>
            </div>
        </div>

        <!-- KPI Stat Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mb-8">
            <div class="bg-white p-4 rounded-xl border border-divider shadow-sm">
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-espresso/60 block">Total Menu Items</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-espresso mt-1 block">{{ $stats['total_items'] }}</span>
                <span class="text-[10px] text-espresso/50 mt-1 block">Across {{ $stats['total_categories'] }} categories</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-emerald-200/80 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-1.5 h-full bg-emerald-500"></div>
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-emerald-800 block">Active &amp; Visible</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-emerald-900 mt-1 block">{{ $stats['active_items'] }}</span>
                <span class="text-[10px] text-emerald-700/80 mt-1 block">Live on tabstick.in</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-emerald-200/80 shadow-sm relative overflow-hidden">
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-emerald-800 block">Vegetarian Dishes</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-emerald-900 mt-1 block">{{ $stats['veg_items'] }}</span>
                <span class="text-[10px] text-emerald-700/80 mt-1 block">Veg certified</span>
            </div>

            <div class="bg-white p-4 rounded-xl border border-amber-200/80 shadow-sm relative overflow-hidden">
                <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-wider text-amber-800 block">Non-Veg &amp; Fusion</span>
                <span class="text-2xl sm:text-3xl font-serif font-bold text-amber-900 mt-1 block">{{ $stats['non_veg_items'] }}</span>
                <span class="text-[10px] text-amber-700/80 mt-1 block">Halal meats</span>
            </div>
        </div>

        <!-- Category Selector Pills -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 mb-6 [scrollbar-width:none]">
            <a href="{{ route('graze.admin.menu.index') }}"
               class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ empty(request('category')) ? 'bg-espresso text-parchment shadow-sm' : 'bg-white text-espresso/70 hover:text-espresso border border-divider' }}">
                All Categories ({{ $stats['total_items'] }})
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('graze.admin.menu.index', ['category' => $cat->slug]) }}"
                   class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ request('category') === $cat->slug ? 'bg-espresso text-parchment shadow-sm' : 'bg-white text-espresso/70 hover:text-espresso border border-divider' }}">
                    {{ $cat->name }} ({{ $cat->items_count }})
                </a>
            @endforeach
            <button type="button" onclick="openAddCategoryModal()"
                    class="px-3.5 py-2 rounded-full text-xs font-bold whitespace-nowrap bg-taupe/15 text-espresso hover:bg-taupe/25 border border-dashed border-taupe/40 transition-all flex items-center gap-1.5 shrink-0">
                <span>+</span> Add Category
            </button>
        </div>

        @if($selectedCategory)
            <div class="bg-linen/80 border border-divider rounded-2xl p-4 sm:p-5 mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] uppercase font-bold tracking-widest text-taupe">Active Category View</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $selectedCategory->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                            {{ $selectedCategory->is_active ? 'Visible on Storefront' : 'Hidden' }}
                        </span>
                    </div>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-espresso mt-1">{{ $selectedCategory->name }}</h2>
                    @if($selectedCategory->subtitle)
                        <p class="text-xs text-espresso/70 italic mt-1">{{ $selectedCategory->subtitle }}</p>
                    @endif
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" onclick="openEditCategoryModal({{ json_encode($selectedCategory) }})"
                            class="px-3.5 py-2 bg-white hover:bg-linen border border-divider rounded-xl text-xs font-semibold text-espresso flex items-center gap-1.5 transition-colors shadow-sm">
                        <span>✏️</span> Edit Category
                    </button>
                    <form method="POST" action="{{ route('graze.admin.menu.category.destroy', $selectedCategory) }}"
                          onsubmit="return confirm('Delete category '{{ $selectedCategory->name }}'? {{ $selectedCategory->items()->count() > 0 ? 'WARNING: This category contains ' . $selectedCategory->items()->count() . ' dishes! Are you sure you want to proceed?' : '' }}');"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        @if($selectedCategory->items()->count() > 0)
                            <input type="hidden" name="force" value="1">
                        @endif
                        <button type="submit"
                                class="px-3.5 py-2 bg-rose-50 hover:bg-rose-100 border border-rose-200 rounded-xl text-xs font-semibold text-rose-700 flex items-center gap-1.5 transition-colors">
                            <span>🗑️</span> Delete Category
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <!-- Search & Filter Bar -->
        <div class="bg-white p-4 rounded-2xl border border-divider shadow-sm mb-6">
            <form method="GET" action="{{ route('graze.admin.menu.index') }}" class="flex flex-col sm:flex-row gap-3">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="flex-1 relative">
                    <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="Search dishes by name, description, or price..."
                           class="w-full pl-10 pr-4 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs sm:text-sm text-espresso placeholder-espresso/40 focus:outline-none focus:border-taupe">
                    <svg class="w-4 h-4 text-espresso/40 absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <div class="w-full sm:w-48">
                    <select name="type" onchange="this.form.submit()" class="w-full px-3 py-2.5 bg-linen/60 border border-divider rounded-xl text-xs text-espresso focus:outline-none focus:border-taupe">
                        <option value="">All Dietary Types</option>
                        <option value="Veg" {{ ($type ?? '') === 'Veg' ? 'selected' : '' }}>Vegetarian (Veg)</option>
                        <option value="Non-Veg" {{ ($type ?? '') === 'Non-Veg' ? 'selected' : '' }}>Non-Veg</option>
                        <option value="Veg / Non-Veg" {{ ($type ?? '') === 'Veg / Non-Veg' ? 'selected' : '' }}>Veg / Non-Veg Choice</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="px-4 py-2.5 bg-espresso hover:bg-espresso-dark text-parchment rounded-xl text-xs font-semibold uppercase tracking-wider transition-colors">
                        Filter
                    </button>
                    @if(!empty($q) || !empty($type) || !empty(request('category')))
                        <a href="{{ route('graze.admin.menu.index') }}" class="px-3 py-2.5 bg-linen text-espresso/70 hover:text-espresso rounded-xl text-xs font-semibold transition-colors">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Menu Items Table -->
        <div class="bg-white rounded-2xl border border-divider shadow-sm overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-linen/80 border-b border-divider text-[11px] font-bold uppercase tracking-wider text-espresso/70">
                            <th class="py-3.5 px-4">Dish / Item Name</th>
                            <th class="py-3.5 px-4">Category</th>
                            <th class="py-3.5 px-4">Dietary Type</th>
                            <th class="py-3.5 px-4">Price &amp; Unit</th>
                            <th class="py-3.5 px-4">Live Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-divider/70">
                        @forelse($items as $item)
                            <tr class="hover:bg-linen/40 transition-colors {{ !$item->is_active ? 'opacity-50' : '' }}">
                                <td class="py-4 px-4 align-top">
                                    <div class="font-serif text-[17px] font-bold text-espresso">{{ $item->name }}</div>
                                    @if($item->description)
                                        <div class="text-[12px] text-espresso/70 italic mt-0.5 leading-relaxed max-w-md">{{ $item->description }}</div>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top font-medium text-espresso/80">
                                    <span class="inline-block px-2.5 py-1 rounded-md bg-linen border border-divider text-[11px]">
                                        {{ $item->category?->name ?? 'Uncategorized' }}
                                    </span>
                                </td>

                                <td class="py-4 px-4 align-top">
                                    @if($item->type === 'Veg')
                                        <span class="inline-block px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 text-[10px] font-bold uppercase tracking-wider">
                                            Veg
                                        </span>
                                    @elseif($item->type === 'Non-Veg')
                                        <span class="inline-block px-2 py-0.5 rounded-full bg-amber-100 text-amber-900 border border-amber-200 text-[10px] font-bold uppercase tracking-wider">
                                            Non-Veg
                                        </span>
                                    @else
                                        <span class="inline-block px-2 py-0.5 rounded-full bg-stone-100 text-stone-800 border border-stone-200 text-[10px] font-bold uppercase tracking-wider">
                                            {{ $item->type }}
                                        </span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <span class="font-serif text-[16px] font-bold text-espresso">{{ $item->price }}</span>
                                    @if($item->unit)
                                        <span class="text-[11px] text-espresso/60 font-sans block">{{ $item->unit }}</span>
                                    @endif
                                </td>

                                <td class="py-4 px-4 align-top">
                                    <form method="POST" action="{{ route('graze.admin.menu.toggle', $item) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" title="Click to toggle live availability"
                                                class="px-2.5 py-1 rounded-full text-[10px] font-bold border transition-colors {{ $item->is_active ? 'bg-emerald-100 text-emerald-800 border-emerald-300 hover:bg-emerald-200' : 'bg-rose-100 text-rose-800 border-rose-300 hover:bg-rose-200' }}">
                                            {{ $item->is_active ? '● Active (Live)' : '○ Hidden' }}
                                        </button>
                                    </form>
                                </td>

                                <td class="py-4 px-4 align-top text-right space-x-2">
                                    <button type="button" onclick="openEditModal({{ json_encode($item) }})"
                                            class="px-3 py-1.5 bg-taupe/20 hover:bg-taupe text-espresso rounded-lg font-semibold text-xs transition-colors">
                                        Edit
                                    </button>

                                    <form method="POST" action="{{ route('graze.admin.menu.destroy', $item) }}" onsubmit="return confirm('Remove \'{{ $item->name }}\' from the menu?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 text-rose-600 hover:text-rose-900 text-xs font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-espresso/60">
                                    <div class="text-3xl mb-2">🍽️</div>
                                    <div class="font-serif text-lg text-espresso font-semibold">No Menu Items Found</div>
                                    <p class="text-xs text-espresso/50 mt-1">Try adjusting your filters or click "+ Add New Dish" above.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($items->hasPages())
                <div class="p-4 border-t border-divider bg-linen/30">
                    {{ $items->links() }}
                </div>
            @endif
        </div>

    </main>

    <!-- Modal: Add New Menu Item -->
    <div id="add-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-divider">
            <div class="flex items-center justify-between pb-4 border-b border-divider">
                <h3 class="font-serif text-2xl font-semibold text-espresso">Add New Menu Dish</h3>
                <button type="button" onclick="closeAddModal()" class="text-espresso/60 hover:text-espresso text-lg font-bold">✕</button>
            </div>

            <form method="POST" action="{{ route('graze.admin.menu.store') }}" class="mt-5 space-y-4 text-xs">
                @csrf
                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Dish / Item Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Tandoori Paneer Sliders"
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Category *</label>
                        <select name="category_id" required class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Dietary Type *</label>
                        <select name="type" required class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                            <option value="Veg">Vegetarian (Veg)</option>
                            <option value="Non-Veg">Non-Veg</option>
                            <option value="Veg / Non-Veg">Veg / Non-Veg</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Price *</label>
                        <input type="text" name="price" required placeholder="e.g. $3.50 or $50.00"
                               class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                    </div>

                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Unit (Optional)</label>
                        <input type="text" name="unit" placeholder="e.g. / pc, / pp, / cup, ea"
                               class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                    </div>
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Ingredients / Description</label>
                    <textarea name="description" rows="2" placeholder="e.g. Mini brioche buns, tandoori spiced patty, house mint slaw"
                              class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-divider">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2.5 rounded-xl border border-divider text-espresso font-medium">Cancel</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-espresso hover:bg-espresso-dark text-parchment font-bold uppercase tracking-wider">Save Dish</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Menu Item -->
    <div id="edit-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-divider">
            <div class="flex items-center justify-between pb-4 border-b border-divider">
                <h3 class="font-serif text-2xl font-semibold text-espresso">Edit Menu Dish</h3>
                <button type="button" onclick="closeEditModal()" class="text-espresso/60 hover:text-espresso text-lg font-bold">✕</button>
            </div>

            <form id="edit-form" method="POST" action="" class="mt-5 space-y-4 text-xs">
                @csrf
                @method('PUT')
                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Dish / Item Name *</label>
                    <input type="text" id="edit-name" name="name" required
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Category *</label>
                        <select id="edit-category" name="category_id" required class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Dietary Type *</label>
                        <select id="edit-type" name="type" required class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                            <option value="Veg">Vegetarian (Veg)</option>
                            <option value="Non-Veg">Non-Veg</option>
                            <option value="Veg / Non-Veg">Veg / Non-Veg</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Price *</label>
                        <input type="text" id="edit-price" name="price" required
                               class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                    </div>

                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Unit</label>
                        <input type="text" id="edit-unit" name="unit" placeholder="e.g. / pc, / pp, ea"
                               class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                    </div>
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Ingredients / Description</label>
                    <textarea id="edit-description" name="description" rows="2"
                              class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe"></textarea>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" id="edit-is-active" name="is_active" value="1" class="w-4 h-4 text-espresso rounded border-divider">
                    <label for="edit-is-active" class="text-xs text-espresso font-semibold">Active &amp; Visible on Website</label>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-divider">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2.5 rounded-xl border border-divider text-espresso font-medium">Cancel</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-espresso hover:bg-espresso-dark text-parchment font-bold uppercase tracking-wider">Update Dish</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Add New Category -->
    <div id="add-category-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-divider">
            <div class="flex items-center justify-between pb-4 border-b border-divider">
                <div>
                    <h3 class="font-serif text-2xl font-semibold text-espresso">Add New Category</h3>
                    <p class="text-[11px] text-espresso/60 mt-0.5">Creates a new category tab on the storefront menu</p>
                </div>
                <button type="button" onclick="closeAddCategoryModal()" class="text-espresso/60 hover:text-espresso text-lg font-bold">✕</button>
            </div>

            <form method="POST" action="{{ route('graze.admin.menu.category.store') }}" class="mt-5 space-y-4 text-xs">
                @csrf
                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Category Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Live Counters & Bars"
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Slug / URL Identifier (Optional)</label>
                    <input type="text" name="slug" placeholder="e.g. live-counters (auto-generated if empty)"
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Subtitle / Guidance Note (Optional)</label>
                    <textarea name="subtitle" rows="2" placeholder="e.g. Priced per guest. Minimum 20 guests. Mix & match freely."
                              class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe"></textarea>
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Display Sort Order</label>
                    <input type="number" name="sort_order" min="0" value="{{ ($categories->max('sort_order') ?? 0) + 1 }}"
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-divider">
                    <button type="button" onclick="closeAddCategoryModal()" class="px-4 py-2.5 rounded-xl border border-divider text-espresso font-medium">Cancel</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-espresso hover:bg-espresso-dark text-parchment font-bold uppercase tracking-wider">Create Category</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Category -->
    <div id="edit-category-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-divider">
            <div class="flex items-center justify-between pb-4 border-b border-divider">
                <div>
                    <h3 class="font-serif text-2xl font-semibold text-espresso">Edit Category</h3>
                    <p class="text-[11px] text-espresso/60 mt-0.5">Update category label, subtitle, and live visibility</p>
                </div>
                <button type="button" onclick="closeEditCategoryModal()" class="text-espresso/60 hover:text-espresso text-lg font-bold">✕</button>
            </div>

            <form id="edit-category-form" method="POST" action="" class="mt-5 space-y-4 text-xs">
                @csrf
                @method('PUT')
                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Category Name *</label>
                    <input type="text" id="edit-cat-name" name="name" required
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-sm focus:outline-none focus:border-taupe">
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Slug / Identifier</label>
                    <input type="text" id="edit-cat-slug" name="slug"
                           class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                </div>

                <div>
                    <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Subtitle / Guidance Note</label>
                    <textarea id="edit-cat-subtitle" name="subtitle" rows="2"
                              class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3 items-center">
                    <div>
                        <label class="block font-bold uppercase tracking-wider text-espresso/70 mb-1">Sort Order</label>
                        <input type="number" id="edit-cat-sort" name="sort_order" min="0"
                               class="w-full p-3 bg-linen/50 border border-divider rounded-xl text-espresso text-xs focus:outline-none focus:border-taupe">
                    </div>
                    <div class="pt-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="edit-cat-is-active" name="is_active" value="1" class="w-4 h-4 text-espresso rounded border-divider">
                            <span class="text-xs text-espresso font-semibold">Active &amp; Visible</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-divider">
                    <button type="button" onclick="closeEditCategoryModal()" class="px-4 py-2.5 rounded-xl border border-divider text-espresso font-medium">Cancel</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-espresso hover:bg-espresso-dark text-parchment font-bold uppercase tracking-wider">Update Category</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const addCategoryModal = document.getElementById('add-category-modal');
        const editCategoryModal = document.getElementById('edit-category-modal');

        function openAddCategoryModal() {
            addCategoryModal.classList.remove('hidden');
            addCategoryModal.classList.add('flex');
        }

        function closeAddCategoryModal() {
            addCategoryModal.classList.remove('flex');
            addCategoryModal.classList.add('hidden');
        }

        function openEditCategoryModal(cat) {
            document.getElementById('edit-category-form').action = "{{ url('/graze-n-gifts/admin/menu/categories') }}/" + cat.id;
            document.getElementById('edit-cat-name').value = cat.name || '';
            document.getElementById('edit-cat-slug').value = cat.slug || '';
            document.getElementById('edit-cat-subtitle').value = cat.subtitle || '';
            document.getElementById('edit-cat-sort').value = cat.sort_order ?? 0;
            document.getElementById('edit-cat-is-active').checked = !!cat.is_active;

            editCategoryModal.classList.remove('hidden');
            editCategoryModal.classList.add('flex');
        }

        function closeEditCategoryModal() {
            editCategoryModal.classList.remove('flex');
            editCategoryModal.classList.add('hidden');
        }

        addCategoryModal.addEventListener('click', (e) => { if (e.target === addCategoryModal) closeAddCategoryModal(); });
        editCategoryModal.addEventListener('click', (e) => { if (e.target === editCategoryModal) closeEditCategoryModal(); });

        const addModal = document.getElementById('add-modal');
        const editModal = document.getElementById('edit-modal');

        function openAddModal() {
            addModal.classList.remove('hidden');
            addModal.classList.add('flex');
        }

        function closeAddModal() {
            addModal.classList.remove('flex');
            addModal.classList.add('hidden');
        }

        function openEditModal(item) {
            document.getElementById('edit-form').action = "{{ url('/graze-n-gifts/admin/menu/items') }}/" + item.id;
            document.getElementById('edit-name').value = item.name || '';
            document.getElementById('edit-category').value = item.category_id || '';
            document.getElementById('edit-type').value = item.type || 'Veg';
            document.getElementById('edit-price').value = item.price || '';
            document.getElementById('edit-unit').value = item.unit || '';
            document.getElementById('edit-description').value = item.description || '';
            document.getElementById('edit-is-active').checked = !!item.is_active;

            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
        }

        function closeEditModal() {
            editModal.classList.remove('flex');
            editModal.classList.add('hidden');
        }

        addModal.addEventListener('click', (e) => { if (e.target === addModal) closeAddModal(); });
        editModal.addEventListener('click', (e) => { if (e.target === editModal) closeEditModal(); });
    </script>
</body>
</html>
