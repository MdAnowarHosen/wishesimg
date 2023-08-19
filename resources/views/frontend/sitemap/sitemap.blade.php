<x-frontend-layout>
    <section>
        <div class="bg-slate-100 py-5 rounded-full text-center mb-3">
            <h1 class=" text-lg font-semibold">Sitemap</h1>
        </div>
        <div class="text-center mt-10 ">
            <h2 class=" text-xl font-semibold text-gray-800 pb-2">Company</h2>
            <hr>
        </div>
        <div class="mt-5">
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-4 mb-5">
                    <h2 class=" text-xl font-semibold text-gray-800">About WishesImg</h2>
                    <div class="mt-5">
                        <ul class=" list-disc list-inside">
                            <li>
                                <Link href="{{ route('about') }}">About</Link>
                            </li>
                            <li>
                                <Link href="{{ route('contact') }}">Contact</Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 mb-5">
                    <h2 class=" text-xl font-semibold text-gray-800">Account</h2>
                    <div class="mt-5">
                        <ul class=" list-disc list-inside">
                            <li>
                                <Link href="{{ route('login') }}">Login</Link>
                            </li>
                            <li>
                                <Link href="{{ route('register') }}">Register</Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 mb-5">
                    <h2 class=" text-xl font-semibold text-gray-800">Legal</h2>
                    <div class="mt-5">
                        <ul class=" list-disc list-inside">
                            <li>
                                <Link href="{{ url('privacy-policy') }}">Privacy Policy</Link>
                            </li>
                            <li>
                                <Link href="{{ url('terms-of-service') }}">Terms of service</Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 mb-5">
                    <h2 class=" text-xl font-semibold text-gray-800">Support</h2>
                    <div class="mt-5">
                        <ul class=" list-disc list-inside">
                            <li>
                                <Link href="{{ route('faq') }}">FAQ</Link>
                            </li>
                            <li>
                                <Link href="{{ route('help') }}">Help</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- categories --}}
            <div class="text-center mt-10 ">
                <h2 class=" text-xl font-semibold text-gray-800 pb-2">Categories</h2>
                <hr>
            </div>
            <div class="mt-5">
                <div class="grid grid-cols-12 gap-3">
                    @foreach ($categories as $category)
                        <div class="col-span-12 md:col-span-4 mb-5">
                            <h2 class=" text-xl font-semibold text-gray-800">
                                <Link href="{{ route('images.main.products', $category->slug) }}">{{ $category->name }}
                                </Link>
                            </h2>
                            @if (
                                $category->activatedSubCatsAsc != null &&
                                    isset($category->activatedSubCatsAsc) &&
                                    count($category->activatedSubCatsAsc) > 0)
                                <div class="mt-5">
                                    <ul class=" list-disc list-inside leading-7">
                                        @foreach ($category->activatedSubCatsAsc as $subCat)
                                            <li>
                                                <Link
                                                    href="{{ route('images.subcat.products', ['mainCatSlug' => $category->slug, 'subCategorySlug' => $subCat->slug]) }}">
                                                {{ $subCat->name }}</Link>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="text-center mt-10 ">
                <h2 class=" text-xl font-semibold text-gray-800 pb-2">Products</h2>
                <hr>
            </div>
            <div>
                <div class="grid grid-cols-12 gap-3">
                    @foreach ($products->chunk(300) as $chunk)
                        <div class="col-span-12 md:col-span-4 mb-5">
                            <div class="mt-5">
                                <ul class=" list-disc list-inside leading-7">
                                    @foreach ($chunk as $product)
                                        <li>
                                            <Link href="{{ route('show.product', $product->slug) }}">
                                            {{ $product->name }}</Link>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
