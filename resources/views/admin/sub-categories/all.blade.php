<section>
    <x-splade-table :for="$subCategories">
        @cell('action', $subCategory)
        <Link href="{{ route('admin.sub-category.edit',$subCategory->id) }}"><x-tabler-edit class="w-6 h-6 inline mx-2" /></Link>
        <Link href="{{ route('admin.sub-category.destroy',$subCategory->id) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-tabler-trash class="w-6 h-6 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>

