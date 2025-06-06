@seoTitle(__('Terms of Service'))

<x-frontend-layout>
<section>
    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <x-splade-content class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose" :html="$terms" />
            </div>
        </div>
    </div>
</section>
</x-frontend-layout>
