<section>
    <x-splade-table :for="$categories">
        @cell('action', $category)
        {{-- <Link href="#"><x-bi-eye-fill class="w-5 h-5 inline mx-2" /></Link> --}}
        <Link href="{{ route('admin.category.edit',['category'=>$category->id]) }}"><x-fas-edit class="w-5 h-5 inline mx-2" /></Link>
        <Link href="{{ route('admin.category.delete',['category'=>$category->id]) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-bi-trash3-fill class="w-5 h-5 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>

