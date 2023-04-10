<section>
    <x-splade-table :for="$products" as="$product" search-debounce="1000">
        @cell('id', $product)
        {{ $product->id }}
        @endcell

        @cell('image', $product)
        <img class=" w-auto h-14 md:h-20 lg:h-32 " src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->name }}">
        @endcell

        @cell('action', $product)
        <Link href="{{ route('admin.products.show',$product->id) }}"><x-tabler-eye class="w-6 h-6 inline mx-2" /></Link>
        <Link href="{{ route('admin.products.edit',$product->id) }}"><x-tabler-edit class="w-6 h-6 inline mx-2" /></Link>
        <Link href="{{ route('admin.products.destroy',$product->id) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-tabler-trash class="w-6 h-6 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>

