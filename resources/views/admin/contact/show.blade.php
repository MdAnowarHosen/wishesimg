<section>
    <x-splade-table :for="$contacts" as="$contact" search-debounce="1000">

        @cell('id', $contact)
        {{ $contact->id }}
        @endcell


        @cell('action', $contact)
        <Link href="#"><x-tabler-eye class="w-6 h-6 inline mx-2" /></Link>
        <Link href="#"><x-tabler-edit class="w-6 h-6 inline mx-2" /></Link>
        <Link href="#"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-tabler-trash class="w-6 h-6 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>
