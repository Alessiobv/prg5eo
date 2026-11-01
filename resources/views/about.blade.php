<x-layout title="About">
    <h1 class="mb-4 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">About Us</h1>
    <p class="mb-10 max-w-2xl text-neutral-300">MusicAll Charts is a home for musical theatre fans. We collect the biggest shows, the performers behind them and the songs that fill the theatre, so you can discover new favorites and keep track of the ones you love.</p>

    <section class="mb-12 grid gap-8 lg:grid-cols-2">
        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40">
            <h2 class="mb-3 text-2xl font-semibold text-amber-300">Our story</h2>
            <p class="mb-4 text-neutral-300">What started as a shared spreadsheet between a few friends after a night at the theatre quickly grew into a full catalogue of musicals, artists, albums and songs.</p>
            <p class="text-neutral-300">Today, thousands of fans use MusicAll Charts to explore cast recordings, rate their favorite numbers and build their own personal charts.</p>
        </div>

        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40">
            <h2 class="mb-3 text-2xl font-semibold text-amber-300">Our mission</h2>
            <p class="mb-4 text-neutral-300">We want to make musical theatre easier to explore and more fun to share. Every show deserves an audience, from long-running classics to brand-new productions.</p>
            <p class="text-neutral-300">We keep the catalogue open, accurate and community-driven, because the best recommendations come from fellow fans.</p>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="mb-6 border-b border-amber-500/30 pb-3 text-2xl font-semibold text-amber-300">What we value</h2>
        <div class="grid gap-6 sm:grid-cols-3">
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
                <p class="mb-2 text-3xl">🎭</p>
                <h3 class="mb-2 text-lg font-semibold text-amber-300">Passion</h3>
                <p class="text-sm text-neutral-300">We love the stage, and it shows in every detail of the catalogue.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
                <p class="mb-2 text-3xl">🎶</p>
                <h3 class="mb-2 text-lg font-semibold text-amber-300">Discovery</h3>
                <p class="text-sm text-neutral-300">Finding a new favorite song should only take a few clicks.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
                <p class="mb-2 text-3xl">🤝</p>
                <h3 class="mb-2 text-lg font-semibold text-amber-300">Community</h3>
                <p class="text-sm text-neutral-300">Fans shape the charts, so every voice counts.</p>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="mb-6 border-b border-amber-500/30 pb-3 text-2xl font-semibold text-amber-300">Meet the team</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-red-900 text-2xl font-bold text-amber-400">EV</div>
                <h3 class="text-lg font-semibold text-amber-300">Eva de Vries</h3>
                <p class="mb-2 text-sm text-neutral-400">Founder &amp; Curator</p>
                <p class="text-sm text-neutral-300">Has seen Les Misérables eleven times and counting.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-red-900 text-2xl font-bold text-amber-400">LB</div>
                <h3 class="text-lg font-semibold text-amber-300">Lucas Bakker</h3>
                <p class="mb-2 text-sm text-neutral-400">Lead Developer</p>
                <p class="text-sm text-neutral-300">Keeps the charts running smoothly, even on opening night.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-red-900 text-2xl font-bold text-amber-400">SJ</div>
                <h3 class="text-lg font-semibold text-amber-300">Sanne Jansen</h3>
                <p class="mb-2 text-sm text-neutral-400">Community Manager</p>
                <p class="text-sm text-neutral-300">Knows every lyric to Defying Gravity. Yes, every one.</p>
            </div>
        </div>
    </section>

    <section class="rounded-lg border border-amber-500/20 bg-red-950/60 px-8 py-10 text-center">
        <h2 class="mb-3 text-2xl font-semibold text-amber-300">Want to get in touch?</h2>
        <p class="mb-6 text-neutral-300">We'd love to hear your suggestions, corrections and favorite shows.</p>
        <a href="{{ route('contact') }}" class="inline-block rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Contact us</a>
    </section>
</x-layout>
