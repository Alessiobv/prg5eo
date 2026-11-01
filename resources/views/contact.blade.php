<x-layout title="Contact Us">
    <h1 class="mb-4 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Contact Us</h1>
    <p class="mb-10 max-w-2xl text-neutral-300">Have a question, a suggestion for a musical we're missing, or feedback on the charts? Send us a message and we'll get back to you within two working days.</p>

    <div class="grid gap-8 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-1">
            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40">
                <h2 class="mb-3 text-lg font-semibold text-amber-300">Visit us</h2>
                <p class="text-neutral-300">MusicAll Charts HQ</p>
                <p class="text-neutral-300">Stagestraat 12</p>
                <p class="text-neutral-300">3011 AB Rotterdam</p>
                <p class="text-neutral-300">The Netherlands</p>
            </div>

            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40">
                <h2 class="mb-3 text-lg font-semibold text-amber-300">Get in touch</h2>
                <p class="text-neutral-300">Email: <span class="text-amber-400">hello@musicallcharts.test</span></p>
                <p class="text-neutral-300">Phone: <span class="text-amber-400">+31 10 123 4567</span></p>
            </div>

            <div class="rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40">
                <h2 class="mb-3 text-lg font-semibold text-amber-300">Opening hours</h2>
                <ul class="divide-y divide-neutral-800 text-sm">
                    <li class="flex justify-between py-2"><span class="text-neutral-400">Monday - Friday</span><span class="text-neutral-200">09:00 - 17:30</span></li>
                    <li class="flex justify-between py-2"><span class="text-neutral-400">Saturday</span><span class="text-neutral-200">10:00 - 14:00</span></li>
                    <li class="flex justify-between py-2"><span class="text-neutral-400">Sunday</span><span class="text-neutral-200">Closed</span></li>
                </ul>
            </div>
        </div>

        <form action="#" method="POST" class="flex flex-col gap-2 rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40 lg:col-span-2">
            <label for="contact_name" class="block text-sm font-medium text-amber-300">Name</label>
            <input type="text" id="contact_name" name="name" value="Jane Doe" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">

            <label for="contact_email" class="mt-4 block text-sm font-medium text-amber-300">Email</label>
            <input type="email" id="contact_email" name="email" value="jane.doe@example.com" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">

            <label for="contact_subject" class="mt-4 block text-sm font-medium text-amber-300">Subject</label>
            <select id="contact_subject" name="subject" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
                <option>General question</option>
                <option>Suggest a musical</option>
                <option>Report a mistake</option>
                <option>Partnership</option>
            </select>

            <label for="contact_message" class="mt-4 block text-sm font-medium text-amber-300">Message</label>
            <textarea id="contact_message" name="message" rows="6" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">Hi there! I love the site. Could you add Hamilton and The Lion King to the musicals list?</textarea>

            <button type="submit" class="mt-6 cursor-pointer self-start rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Send message</button>
        </form>
    </div>
</x-layout>
