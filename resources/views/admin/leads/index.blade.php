@extends('admin.layout')

@section('title', 'VIP Club Leads')

@section('content')
<div class="heading">
    <div>
        <div class="kicker">LEAD GENERATION &amp; VIP CLUB</div>
        <h1>VIP Club Leads</h1>
        <p>Real-time list of visitors who submitted their contact info via the 10% OFF pop-up form.</p>
    </div>
    <div style="display:flex; gap:10px;">
        <a href="{{ route('admin.leads.export') }}" class="button" style="background:#16a34a; display:inline-flex; align-items:center; gap:6px;">
            <span>📥 Export Leads (CSV)</span>
        </a>
    </div>
</div>

<div class="stats" style="grid-template-columns: repeat(4, 1fr);">
    <article style="border-left: 4px solid #38bdf8;">
        <span>Total Captured Leads</span>
        <strong>{{ $totalLeads }}</strong>
        <small style="color:#0284c7; font-weight:700;">From landing page popup</small>
    </article>
    <article style="border-left: 4px solid #16a34a;">
        <span>Web Form Sign-ups</span>
        <strong>{{ $webCount }}</strong>
        <small style="color:#16a34a; font-weight:700;">Name + WhatsApp + Email</small>
    </article>
    <article style="border-left: 4px solid #ea580c;">
        <span>Google Auth Leads</span>
        <strong>{{ $googleCount }}</strong>
        <small style="color:#ea580c; font-weight:700;">One-tap sign-ins</small>
    </article>
    <article style="border-left: 4px solid #8b5cf6;">
        <span>Active Coupon Code</span>
        <strong style="font-size:26px; font-family:monospace; margin-top:14px; color:#4338ca;">TAPSTICK10</strong>
        <small style="color:#6d28d9; font-weight:700;">10% instant discount</small>
    </article>
</div>

<div class="panel">
    <form method="GET" action="{{ route('admin.leads.index') }}" class="filters" style="margin-bottom:20px; display:flex; flex-wrap:wrap; gap:12px; align-items:flex-end;">
        <label style="flex:1; min-width:240px; margin:0;">
            Search Leads
            <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="Search by name, email, or mobile number...">
        </label>
        
        <label style="width:180px; margin:0;">
            Source
            <select name="source" onchange="this.form.submit()">
                <option value="">All Sources</option>
                <option value="web_form" {{ ($source ?? '') === 'web_form' ? 'selected' : '' }}>Web Form</option>
                <option value="google" {{ ($source ?? '') === 'google' ? 'selected' : '' }}>Google Auth</option>
            </select>
        </label>

        <button type="submit" class="button" style="padding:11px 18px; margin:0;">Filter</button>
        @if(!empty($q) || !empty($source))
            <a href="{{ route('admin.leads.index') }}" class="ghost" style="padding:10px 16px; margin:0;">Reset</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Lead Details</th>
                    <th>Email Address</th>
                    <th>Mobile &amp; WhatsApp</th>
                    <th>Source</th>
                    <th>Coupon</th>
                    <th>Converted?</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone ?? '');
                        if (strlen($cleanPhone) === 10) {
                            $waNumber = '91' . $cleanPhone;
                        } elseif (strlen($cleanPhone) === 12 && str_starts_with($cleanPhone, '91')) {
                            $waNumber = $cleanPhone;
                        } else {
                            $waNumber = $cleanPhone;
                        }
                        $waMessage = "Hi " . ($lead->name ?: 'there') . "! Thanks for joining Tapstick Club. Your 10% discount code is TAPSTICK10. Check out our freshest stickers here: " . route('home');
                        $hasOrdered = isset($orderedEmails[$lead->email]);
                    @endphp
                    <tr>
                        <td>
                            <strong style="font-size:15px; color:#0f172a; display:block;">
                                {{ $lead->name ?: 'Guest Club Member' }}
                            </strong>
                            @if($lead->ip_address)
                                <small style="color:#94a3b8; font-family:monospace; font-size:11px;">IP: {{ $lead->ip_address }}</small>
                            @endif
                        </td>
                        <td>
                            <a href="mailto:{{ $lead->email }}" style="font-weight:700; color:#2563eb; font-size:14px;">
                                {{ $lead->email }}
                            </a>
                        </td>
                        <td>
                            @if($cleanPhone)
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <span style="font-family:monospace; font-size:14px; font-weight:800; color:#0f172a;">
                                        {{ $lead->phone }}
                                    </span>
                                    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($waMessage) }}" target="_blank" rel="noopener noreferrer" 
                                       style="background:#25D366; color:#ffffff; font-size:11px; font-weight:800; padding:3px 8px; border-radius:6px; display:inline-flex; align-items:center; gap:4px; text-decoration:none;" title="Send WhatsApp Message">
                                        💬 WhatsApp
                                    </a>
                                </div>
                            @else
                                <span style="color:#94a3b8;">—</span>
                            @endif
                        </td>
                        <td>
                            @if($lead->auth_provider === 'google')
                                <span class="badge" style="background:#fef3c7; color:#92400e; font-weight:800; font-size:12px;">
                                    Google
                                </span>
                            @else
                                <span class="badge" style="background:#e0f2fe; color:#0369a1; font-weight:800; font-size:12px;">
                                    Web Form
                                </span>
                            @endif
                        </td>
                        <td>
                            <span style="font-family:monospace; font-weight:900; background:#f1f5f9; padding:4px 8px; border-radius:6px; color:#0f172a; font-size:12px;">
                                {{ $lead->discount_code ?: 'TAPSTICK10' }}
                            </span>
                        </td>
                        <td>
                            @if($hasOrdered)
                                <span class="badge" style="background:#dcfce7; color:#166534; font-weight:800; font-size:12px;">
                                    ✓ Ordered
                                </span>
                            @else
                                <span class="badge" style="background:#f1f5f9; color:#64748b; font-weight:700; font-size:12px;">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td>
                            <span style="font-weight:600;">{{ $lead->created_at->format('d M Y') }}</span>
                            <small style="color:#64748b;">{{ $lead->created_at->format('h:i A') }} ({{ $lead->created_at->diffForHumans() }})</small>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.leads.destroy', $lead) }}" onsubmit="return confirm('Remove this lead from directory?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ghost" style="padding:4px 8px; font-size:12px; color:#ef4444; border-color:#fca5a5;" title="Delete Lead">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty" style="padding:40px; text-align:center;">
                            <div style="font-size:32px; margin-bottom:8px;">🎁</div>
                            <strong style="font-size:16px; color:#0f172a; display:block; margin-bottom:4px;">No leads found</strong>
                            <p style="color:#64748b; margin:0;">Visitors who submit the 10% OFF landing page pop-up form will immediately appear here.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $leads->links() }}
    </div>
</div>
@endsection
