<section>
    <x-splade-table :for="$categories">
        @cell('action', $category)
        <Link href="{{ route('admin.category.edit',['category'=>$category->id]) }}"><x-tabler-edit class="w-6 h-6 inline mx-2" /></Link>
        <Link href="{{ route('admin.category.delete',['category'=>$category->id]) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-tabler-trash class="w-6 h-6 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>

