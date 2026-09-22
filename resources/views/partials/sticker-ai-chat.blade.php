<!-- ==========================================================================
     TABSTICK AI STICKER CHATBOT & STYLIST WIDGET
     Trained & grounded on all 4,479 live waterproof stickers
     ========================================================================== -->
<div id="sticker-ai-widget" class="sticker-ai-container">
    <!-- Floating Launcher Button -->
    <button type="button" id="sticker-ai-launcher" class="sticker-ai-launcher" aria-label="Chat with Tabstick AI Sticker Stylist">
        <span class="launcher-icon-wrap">
            <span class="launcher-emoji">🤖</span>
            <span class="launcher-sparkle">⚡</span>
        </span>
        <span class="launcher-label">
            <span class="launcher-title">STICKER AI</span>
            <span class="launcher-badge">4.5K+ DECALS</span>
        </span>
        <span class="launcher-ping"></span>
    </button>

    <!-- Floating Chat Window -->
    <div id="sticker-ai-window" class="sticker-ai-window hidden" role="dialog" aria-labelledby="sticker-ai-title" aria-modal="false">
        <!-- Chat Header -->
        <div class="sticker-ai-header">
            <div class="sticker-ai-header-brand">
                <div class="header-avatar-box">
                    <span class="header-avatar-emoji">🤖</span>
                </div>
                <div>
                    <h3 id="sticker-ai-title" class="header-title">Tabstick AI Stylist</h3>
                    <div class="header-status">
                        <span class="status-dot"></span>
                        <span class="status-text">Online • 4,479 Stickers Trained</span>
                    </div>
                </div>
            </div>
            <div class="header-actions">
                <button type="button" id="sticker-ai-reset-btn" class="header-action-btn" title="Clear conversation" aria-label="Reset Chat">
                    ↺
                </button>
                <button type="button" id="sticker-ai-close-btn" class="header-action-btn" title="Close chat" aria-label="Close Chat">
                    ✕
                </button>
            </div>
        </div>

        <!-- Quick Prompt Chips -->
        <div class="sticker-ai-chips-bar" id="sticker-ai-chips">
            <button type="button" class="sticker-chip" data-prompt="Show me the best car and bike bumper stickers">🚗 Bumper Decals</button>
            <button type="button" class="sticker-chip" data-prompt="What are your most popular Anime stickers? Naruto, Gojo, One Piece">⚡ Anime &amp; Manga</button>
            <button type="button" class="sticker-chip" data-prompt="Show me coding and developer stickers for my laptop (Python, Linux, Git)">💻 Dev &amp; Tech</button>
            <button type="button" class="sticker-chip" data-prompt="Do you have holographic and glitter stickers?">✨ Holographic</button>
            <button type="button" class="sticker-chip" data-prompt="Show me cool stickers under ₹150">💰 Under ₹150</button>
            <button type="button" class="sticker-chip" data-prompt="Show me mountain adventure and travel stickers">🏔️ Mountain &amp; Travel</button>
        </div>

        <!-- Messages Thread -->
        <div class="sticker-ai-messages" id="sticker-ai-messages">
            <!-- Initial Welcome Message -->
            <div class="ai-msg-row assistant-row">
                <div class="ai-msg-avatar">⚡</div>
                <div class="ai-msg-bubble">
                    <p class="mb-1"><strong>Yo! 👋 I'm Tabstick AI, your sticker stylist.</strong></p>
                    <p class="text-xs leading-relaxed">I know all <strong>4,479 waterproof decals</strong> in our vault! Tell me your vibe, your ride, your laptop setup, or tap any topic above to explore.</p>
                </div>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="sticker-ai-typing" class="sticker-ai-typing hidden">
            <div class="ai-msg-avatar">⚡</div>
            <div class="typing-bubble">
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
            </div>
        </div>

        <!-- Chat Input Footer -->
        <div class="sticker-ai-footer">
            <form id="sticker-ai-form" class="sticker-ai-form">
                <input type="text" id="sticker-ai-input" class="sticker-ai-input" placeholder="Ask for anime, car decals, coder vibe, price..." maxlength="300" autocomplete="off" required>
                <button type="submit" id="sticker-ai-send-btn" class="sticker-ai-send-btn" aria-label="Send message">
                    <span>➤</span>
                </button>
            </form>
            <div class="sticker-ai-disclaimer">
                <span>⚡ Powered by Google Gemini • 100% Waterproof Vinyl</span>
            </div>
        </div>
    </div>
</div>

<style>
/* ==========================================================================
   TABSTICK AI WIDGET STYLES (NEO-BRUTALIST PLAYFUL POP)
   ========================================================================== */
.sticker-ai-container {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 99999;
    font-family: 'Cabinet Grotesk', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

@media (max-width: 640px) {
    .sticker-ai-container {
        bottom: 84px;
        right: 14px;
    }
}

/* Launcher Button */
.sticker-ai-launcher {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #FFE600;
    color: #111111;
    border: 2.5px solid #111111;
    box-shadow: 4px 4px 0px #111111;
    border-radius: 9999px;
    padding: 10px 18px;
    cursor: pointer;
    transition: transform 0.15s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.15s ease;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}

.sticker-ai-launcher:hover {
    transform: translate(-2px, -2px);
    box-shadow: 6px 6px 0px #111111;
    background: #FFF04D;
}

.sticker-ai-launcher:active {
    transform: translate(2px, 2px);
    box-shadow: 2px 2px 0px #111111;
}

.launcher-icon-wrap {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: #FFFFFF;
    border: 2px solid #111111;
    border-radius: 50%;
    font-size: 16px;
    line-height: 1;
}

.launcher-sparkle {
    position: absolute;
    top: -4px;
    right: -4px;
    font-size: 11px;
    color: #FF334B;
    animation: sparkle-spin 2s infinite ease-in-out;
}

@keyframes sparkle-spin {
    0%, 100% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.25) rotate(15deg); }
}

.launcher-label {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 1.15;
}

.launcher-title {
    font-size: 13px;
    font-weight: 900;
    letter-spacing: 0.05em;
    color: #111111;
}

.launcher-badge {
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.08em;
    color: #FF334B;
}

.launcher-ping {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
    background: #10B981;
    border: 1.5px solid #111111;
    border-radius: 50%;
    box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.4);
    animation: pulse-green 2s infinite;
}

@keyframes pulse-green {
    0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
    100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}

/* Chat Window */
.sticker-ai-window {
    position: fixed;
    bottom: 92px;
    right: 24px;
    width: 380px;
    max-width: calc(100vw - 32px);
    height: 560px;
    max-height: calc(100vh - 120px);
    background: #FAF8F5;
    border: 2.5px solid #111111;
    box-shadow: 6px 6px 0px #111111;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    animation: window-pop 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    z-index: 100000;
}

.sticker-ai-window.hidden {
    display: none !important;
}

@keyframes window-pop {
    0% { transform: scale(0.85) translateY(20px); opacity: 0; }
    100% { transform: scale(1) translateY(0); opacity: 1; }
}

@media (max-width: 640px) {
    .sticker-ai-window {
        bottom: 84px;
        right: 12px;
        left: 12px;
        width: auto;
        max-width: none;
        height: calc(100vh - 180px);
    }
}

/* Header */
.sticker-ai-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    background: #FFE600;
    border-bottom: 2.5px solid #111111;
}

.sticker-ai-header-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.header-avatar-box {
    width: 34px;
    height: 34px;
    background: #FFFFFF;
    border: 2px solid #111111;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    box-shadow: 2px 2px 0px #111111;
}

.header-title {
    font-size: 14px;
    font-weight: 900;
    color: #111111;
    margin: 0;
    line-height: 1.2;
}

.header-status {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 2px;
}

.status-dot {
    width: 7px;
    height: 7px;
    background: #10B981;
    border-radius: 50%;
}

.status-text {
    font-size: 10px;
    font-weight: 700;
    color: #333333;
    letter-spacing: 0.02em;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 6px;
}

.header-action-btn {
    width: 28px;
    height: 28px;
    background: #FFFFFF;
    border: 2px solid #111111;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    color: #111111;
    cursor: pointer;
    box-shadow: 1.5px 1.5px 0px #111111;
    transition: all 0.1s ease;
}

.header-action-btn:hover {
    transform: translate(-1px, -1px);
    box-shadow: 2.5px 2.5px 0px #111111;
    background: #FAF8F5;
}

.header-action-btn:active {
    transform: translate(1px, 1px);
    box-shadow: 0px 0px 0px #111111;
}

/* Chips Bar */
.sticker-ai-chips-bar {
    display: flex;
    gap: 8px;
    padding: 10px 14px;
    background: #F3EFEA;
    border-bottom: 2px solid #111111;
    overflow-x: auto;
    scrollbar-width: none;
}

.sticker-ai-chips-bar::-webkit-scrollbar {
    display: none;
}

.sticker-chip {
    padding: 5px 12px;
    background: #FFFFFF;
    color: #111111;
    border: 1.5px solid #111111;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
    cursor: pointer;
    box-shadow: 1.5px 1.5px 0px #111111;
    transition: all 0.1s ease;
}

.sticker-chip:hover {
    transform: translate(-1px, -1px);
    box-shadow: 2px 2px 0px #111111;
    background: #FFE600;
}

/* Messages Area */
.sticker-ai-messages {
    flex: 1;
    padding: 14px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
    background: #FAF8F5;
}

.ai-msg-row {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    max-width: 92%;
}

.ai-msg-row.user-row {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.ai-msg-avatar {
    width: 26px;
    height: 26px;
    background: #FFE600;
    border: 1.5px solid #111111;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    flex-shrink: 0;
    box-shadow: 1.5px 1.5px 0px #111111;
}

.user-row .ai-msg-avatar {
    background: #111111;
    color: #FFFFFF;
}

.ai-msg-bubble {
    padding: 10px 14px;
    border-radius: 14px;
    border: 2px solid #111111;
    box-shadow: 2.5px 2.5px 0px #111111;
    font-size: 12px;
    line-height: 1.45;
    word-break: break-word;
}

.assistant-row .ai-msg-bubble {
    background: #FFFFFF;
    color: #111111;
}

.user-row .ai-msg-bubble {
    background: #FFE600;
    color: #111111;
    font-weight: 700;
}

.ai-msg-bubble a {
    color: #FF334B;
    font-weight: 800;
    text-decoration: underline;
}

/* Embedded Product Cards */
.chat-products-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 8px;
    margin-top: 10px;
}

.chat-product-card {
    background: #FFFFFF;
    border: 2px solid #111111;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 2px 2px 0px #111111;
    display: flex;
    flex-direction: column;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.chat-product-card:hover {
    transform: translateY(-2px);
    box-shadow: 4px 4px 0px #111111;
}

.chat-product-thumb-wrap {
    position: relative;
    width: 100%;
    padding-top: 100%;
    background: #F3EFEA;
    border-bottom: 2px solid #111111;
}

.chat-product-thumb {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 6px;
}

.chat-product-info {
    padding: 8px;
    display: flex;
    flex-direction: column;
    flex: 1;
    justify-content: space-between;
}

.chat-product-cat {
    font-size: 8.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #FF334B;
    line-height: 1;
    margin-bottom: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat-product-name {
    font-size: 11px;
    font-weight: 800;
    color: #111111;
    line-height: 1.25;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 6px;
}

.chat-product-pricing {
    display: flex;
    align-items: baseline;
    gap: 5px;
    margin-bottom: 6px;
}

.chat-price-current {
    font-size: 13px;
    font-weight: 900;
    color: #111111;
}

.chat-price-orig {
    font-size: 10px;
    color: #888888;
    text-decoration: line-through;
}

.chat-product-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4px;
}

.chat-btn-view {
    padding: 5px 0;
    background: #F3EFEA;
    color: #111111;
    border: 1.5px solid #111111;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 800;
    text-align: center;
    text-decoration: none !important;
    line-height: 1;
}

.chat-btn-add {
    padding: 5px 0;
    background: #FFE600;
    color: #111111;
    border: 1.5px solid #111111;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    line-height: 1;
    transition: background 0.1s ease;
}

.chat-btn-add:hover {
    background: #FFD000;
}

.chat-btn-add.added {
    background: #10B981;
    color: #FFFFFF;
}

/* Typing Bubble */
.sticker-ai-typing {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 14px 10px;
}

.typing-bubble {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 8px 12px;
    background: #FFFFFF;
    border: 2px solid #111111;
    border-radius: 12px;
    box-shadow: 2px 2px 0px #111111;
}

.typing-dot {
    width: 6px;
    height: 6px;
    background: #111111;
    border-radius: 50%;
    animation: typing-bounce 1.4s infinite ease-in-out both;
}

.typing-dot:nth-child(1) { animation-delay: -0.32s; }
.typing-dot:nth-child(2) { animation-delay: -0.16s; }

@keyframes typing-bounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

/* Input Footer */
.sticker-ai-footer {
    padding: 10px 14px 12px;
    background: #FFFFFF;
    border-top: 2.5px solid #111111;
}

.sticker-ai-form {
    display: flex;
    align-items: center;
    gap: 6px;
}

.sticker-ai-input {
    flex: 1;
    padding: 10px 14px;
    background: #FAF8F5;
    border: 2px solid #111111;
    border-radius: 12px;
    font-size: 12px;
    color: #111111;
    outline: none;
    font-family: inherit;
    box-shadow: 1.5px 1.5px 0px #111111 inset;
}

.sticker-ai-input:focus {
    border-color: #111111;
    background: #FFFFFF;
}

.sticker-ai-send-btn {
    width: 38px;
    height: 38px;
    background: #111111;
    color: #FFE600;
    border: 2px solid #111111;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 900;
    cursor: pointer;
    box-shadow: 2px 2px 0px #FFE600;
    transition: all 0.1s ease;
    flex-shrink: 0;
}

.sticker-ai-send-btn:hover {
    transform: translate(-1px, -1px);
    box-shadow: 3px 3px 0px #FFE600;
}

.sticker-ai-send-btn:active {
    transform: translate(1px, 1px);
    box-shadow: 0px 0px 0px #FFE600;
}

.sticker-ai-disclaimer {
    text-align: center;
    font-size: 9px;
    font-weight: 700;
    color: #777777;
    margin-top: 6px;
    letter-spacing: 0.02em;
}
</style>

<script>
(function() {
    const launcher = document.getElementById('sticker-ai-launcher');
    const windowEl = document.getElementById('sticker-ai-window');
    const closeBtn = document.getElementById('sticker-ai-close-btn');
    const resetBtn = document.getElementById('sticker-ai-reset-btn');
    const form = document.getElementById('sticker-ai-form');
    const input = document.getElementById('sticker-ai-input');
    const messagesEl = document.getElementById('sticker-ai-messages');
    const typingEl = document.getElementById('sticker-ai-typing');
    const chipsBar = document.getElementById('sticker-ai-chips');

    let chatHistory = [];
    let isSending = false;

    // Toggle Chat Window
    function toggleChat(open) {
        const isHidden = windowEl.classList.contains('hidden');
        const shouldOpen = typeof open === 'boolean' ? open : isHidden;

        if (shouldOpen) {
            windowEl.classList.remove('hidden');
            launcher.classList.add('hidden');
            setTimeout(() => input.focus(), 150);
            scrollToBottom();
        } else {
            windowEl.classList.add('hidden');
            launcher.classList.remove('hidden');
        }
    }

    launcher.addEventListener('click', () => toggleChat(true));
    closeBtn.addEventListener('click', () => toggleChat(false));

    // Reset Chat
    resetBtn.addEventListener('click', () => {
        chatHistory = [];
        messagesEl.innerHTML = `
            <div class="ai-msg-row assistant-row">
                <div class="ai-msg-avatar">⚡</div>
                <div class="ai-msg-bubble">
                    <p class="mb-1"><strong>Chat reset! 🔄 Ready for round two!</strong></p>
                    <p class="text-xs leading-relaxed">Ask me about any of our 4,479 waterproof stickers, bumper designs, laptop decals, or anime favorites.</p>
                </div>
            </div>
        `;
        scrollToBottom();
    });

    // Chips click listener
    chipsBar.addEventListener('click', (e) => {
        const chip = e.target.closest('.sticker-chip');
        if (!chip) return;
        const prompt = chip.getAttribute('data-prompt');
        if (prompt && !isSending) {
            sendMessage(prompt);
        }
    });

    // Form submit listener
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text || isSending) return;
        input.value = '';
        sendMessage(text);
    });

    function scrollToBottom() {
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    // Escape HTML helper
    function escapeHtml(str) {
        return str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    // Simple Markdown Formatter
    function formatMarkdown(text) {
        let html = escapeHtml(text);
        // Bold: **text** or __text__
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        // Bullet points: lines starting with - or *
        html = html.replace(/(?:^|\n)[-\*]\s+(.*?)(?=\n|$)/g, '<li class="ml-3 my-0.5">$1</li>');
        html = html.replace(/(<li.*<\/li>)/s, '<ul class="list-disc my-1">$1</ul>');
        // Links: [label](url)
        html = html.replace(/\[(.*?)\]\((https?:\/\/[^\s\)]+)\)/g, '<a href="$2" target="_blank" rel="noopener">$1</a>');
        // Newlines to <br>
        html = html.replace(/\n{2,}/g, '<div class="my-2"></div>');
        html = html.replace(/\n/g, '<br>');
        return html;
    }

    // Append message to UI
    function appendMessage(role, text, products = []) {
        const row = document.createElement('div');
        row.className = `ai-msg-row ${role === 'user' ? 'user-row' : 'assistant-row'}`;

        const avatar = document.createElement('div');
        avatar.className = 'ai-msg-avatar';
        avatar.innerHTML = role === 'user' ? '👤' : '⚡';

        const bubble = document.createElement('div');
        bubble.className = 'ai-msg-bubble';
        bubble.innerHTML = formatMarkdown(text);

        // If products attached, render mini cards grid
        if (Array.isArray(products) && products.length > 0) {
            const grid = document.createElement('div');
            grid.className = 'chat-products-grid';

            products.slice(0, 6).forEach(p => {
                const card = document.createElement('div');
                card.className = 'chat-product-card';
                card.innerHTML = `
                    <div class="chat-product-thumb-wrap">
                        <img src="${p.image_url}" alt="${escapeHtml(p.name)}" class="chat-product-thumb" loading="lazy" onerror="this.src='/images/hero-banner.webp'">
                    </div>
                    <div class="chat-product-info">
                        <div>
                            <div class="chat-product-cat">${escapeHtml(p.category)}</div>
                            <div class="chat-product-name" title="${escapeHtml(p.name)}">${escapeHtml(p.name)}</div>
                        </div>
                        <div>
                            <div class="chat-product-pricing">
                                <span class="chat-price-current">${p.formatted_price}</span>
                                <span class="chat-price-orig">${p.formatted_original_price}</span>
                            </div>
                            <div class="chat-product-actions">
                                <a href="${p.url}" class="chat-btn-view" target="_blank">View</a>
                                <button type="button" class="chat-btn-add" data-id="${p.id}" onclick="window.chatAddToCart(this, ${p.id})">+ Cart</button>
                            </div>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            });

            bubble.appendChild(grid);
        }

        row.appendChild(avatar);
        row.appendChild(bubble);
        messagesEl.appendChild(row);
        scrollToBottom();
    }

    // Send Message
    async function sendMessage(text) {
        isSending = true;
        appendMessage('user', text);
        chatHistory.push({ role: 'user', content: text });

        // Show typing indicator
        typingEl.classList.remove('hidden');
        scrollToBottom();

        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            const res = await fetch('/api/sticker-ai/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    message: text,
                    history: chatHistory.slice(-8)
                })
            });

            const data = await res.json();
            typingEl.classList.add('hidden');

            if (data.success && data.reply) {
                appendMessage('assistant', data.reply, data.products || []);
                chatHistory.push({ role: 'assistant', content: data.reply });
            } else {
                appendMessage('assistant', "Oops! I hit a temporary hiccup exploring the sticker vault. Try asking again or check out our popular bumper decals!");
            }
        } catch (err) {
            console.error('StickerAI Chat Error:', err);
            typingEl.classList.add('hidden');
            appendMessage('assistant', "I'm having trouble reaching the server right now. Feel free to browse our 4,479 stickers above!");
        } finally {
            isSending = false;
            scrollToBottom();
        }
    }

    // Global Add to Cart function for chat cards
    window.chatAddToCart = async function(btn, productId) {
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '...';

        try {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            const formData = new FormData();
            formData.append('quantity', '1');

            const res = await fetch(`/cart/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: formData
            });

            btn.classList.add('added');
            btn.innerHTML = '✓ Added';

            // Update badge counts across navbar and mobile bottom bar
            document.querySelectorAll('.cart-badge-count, .header-cart-badge').forEach(badge => {
                const current = parseInt(badge.textContent.trim()) || 0;
                badge.textContent = current + 1;
                badge.style.display = 'inline-flex';
            });

            setTimeout(() => {
                btn.innerHTML = '+ Cart';
                btn.classList.remove('added');
                btn.disabled = false;
            }, 2500);
        } catch (e) {
            console.error('Cart add error:', e);
            btn.innerHTML = 'Error';
            btn.disabled = false;
        }
    };
})();
</script>
