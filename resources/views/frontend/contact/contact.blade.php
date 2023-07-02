<x-frontendLayout>
    <section class="mx-0 md:mx-10 mt-5">
        <x-splade-form method="post" :action="route('contact.store')">
            <div class="grid gap-6 mb-6 ">
                <div class="flex justify-between">
                    <div>
                        <h1 class=" text-black font-bold">Contact us</h1>
                    </div>
                    {{-- @auth
               <div class="">
                    <Link href="#" class="p-3 bg-indigo-600 text-white rounded-lg">Show Messages</Link>
                </div>
               @endauth --}}
                </div>
                <x-splade-input name="name" label="Name *" placeholder="Name" required />
                <x-splade-input name="email" label="Email *" placeholder="Email" required />
                <x-splade-input name="subject" label="Subject *" placeholder="Subject" required />
                <x-splade-textarea name="message" label="Message Body *" placeholder="Message Body" autosize required />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
        </x-splade-form>
    </section>
</x-frontendLayout>
