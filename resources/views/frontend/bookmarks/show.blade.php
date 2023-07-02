<x-frontend-layout>
    <section>
        <h1 class=" font-semibold text-lg mb-5 mt-2">My Bookmarks</h1>
        <x-splade-table :for="$bookmarks" as="$bookmark" search-debounce="1000">
            @cell('image', $bookmark)
                <img class=" w-auto h-14 md:h-20 lg:h-32 "
                    src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/' . $bookmark->thumbnail) }}"
                    alt="{{ $bookmark->name }}">
            @endcell
        </x-splade-table>
    </section>
</x-frontend-layout>
