<x-layout title="Home">
    <section class="mb-12 rounded-lg border border-amber-500/20 bg-gradient-to-br from-red-950 via-neutral-900 to-neutral-950 px-8 py-16 text-center shadow-lg shadow-black/40">
        <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">Welcome to the show</p>
        <h1 class="mb-4 text-4xl font-bold tracking-wide text-amber-400 sm:text-5xl">MusicAll Charts</h1>
        <p class="mx-auto mb-8 max-w-2xl text-lg text-neutral-300">Discover the biggest musicals, the stars who bring them to life, and the songs everyone is humming. Like your favorites and build your own chart.</p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('musicals.index') }}" class="rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Browse musicals</a>
            <a href="{{ route('songs.index') }}" class="rounded-md border border-amber-500 px-6 py-2 text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Explore songs</a>
        </div>
    </section>

    <section class="mb-12 grid grid-cols-2 gap-4 sm:grid-cols-4">
        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
            <p class="text-3xl font-bold text-amber-400">48</p>
            <p class="mt-1 text-sm text-neutral-400">Musicals</p>
        </div>
        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
            <p class="text-3xl font-bold text-amber-400">126</p>
            <p class="mt-1 text-sm text-neutral-400">Artists</p>
        </div>
        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
            <p class="text-3xl font-bold text-amber-400">212</p>
            <p class="mt-1 text-sm text-neutral-400">Albums</p>
        </div>
        <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 text-center">
            <p class="text-3xl font-bold text-amber-400">1,350</p>
            <p class="mt-1 text-sm text-neutral-400">Songs</p>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="mb-6 border-b border-amber-500/30 pb-3 text-2xl font-semibold text-amber-300">Featured musicals</h2>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h3 class="mb-2 text-xl font-semibold text-amber-300">The Phantom of the Opera</h3>
                <p class="text-neutral-300">A mysterious masked figure haunts the Paris Opera House and becomes obsessed with a young soprano.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h3 class="mb-2 text-xl font-semibold text-amber-300">Les Misérables</h3>
                <p class="text-neutral-300">An epic tale of redemption, love and revolution in nineteenth-century France.</p>
            </div>
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h3 class="mb-2 text-xl font-semibold text-amber-300">Wicked</h3>
                <p class="text-neutral-300">The untold story of the witches of Oz and the unlikely friendship that changed everything.</p>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="mb-6 border-b border-amber-500/30 pb-3 text-2xl font-semibold text-amber-300">Top 5 this week</h2>
        <ol class="divide-y divide-neutral-800 overflow-hidden rounded-lg border border-amber-500/20 bg-neutral-900">
            <li class="flex items-center gap-4 px-6 py-4">
                <span class="w-8 text-2xl font-bold text-amber-500">1</span>
                <div class="grow">
                    <p class="font-semibold text-amber-300">Defying Gravity</p>
                    <p class="text-sm text-neutral-400">Wicked</p>
                </div>
                <span class="text-sm text-neutral-400">4:03</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4">
                <span class="w-8 text-2xl font-bold text-amber-500">2</span>
                <div class="grow">
                    <p class="font-semibold text-amber-300">Music of the Night</p>
                    <p class="text-sm text-neutral-400">The Phantom of the Opera</p>
                </div>
                <span class="text-sm text-neutral-400">5:12</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4">
                <span class="w-8 text-2xl font-bold text-amber-500">3</span>
                <div class="grow">
                    <p class="font-semibold text-amber-300">I Dreamed a Dream</p>
                    <p class="text-sm text-neutral-400">Les Misérables</p>
                </div>
                <span class="text-sm text-neutral-400">3:28</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4">
                <span class="w-8 text-2xl font-bold text-amber-500">4</span>
                <div class="grow">
                    <p class="font-semibold text-amber-300">Memory</p>
                    <p class="text-sm text-neutral-400">Cats</p>
                </div>
                <span class="text-sm text-neutral-400">3:50</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4">
                <span class="w-8 text-2xl font-bold text-amber-500">5</span>
                <div class="grow">
                    <p class="font-semibold text-amber-300">Let It Go</p>
                    <p class="text-sm text-neutral-400">Frozen: The Musical</p>
                </div>
                <span class="text-sm text-neutral-400">3:44</span>
            </li>
        </ol>
    </section>

    <section class="rounded-lg border border-amber-500/20 bg-red-950/60 px-8 py-10 text-center">
        <h2 class="mb-3 text-2xl font-semibold text-amber-300">Ready to build your own chart?</h2>
        <p class="mb-6 text-neutral-300">Create an account, like your favorite songs and unlock your personal favorites list.</p>
        <a href="{{ route('register') }}" class="inline-block rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Join now</a>
    </section>
</x-layout>
