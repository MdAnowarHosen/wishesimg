@extends('layouts.adminLayout')
@section('content')
<section>
    <x-splade-table :for="$subCategories">
        @cell('action', $subCategory)
        <Link href="{{ route('admin.sub-category.edit',$subCategory->id) }}"><x-fas-edit class="w-5 h-5 inline mx-2" /></Link>
        <Link href="{{ route('admin.sub-category.destroy',$subCategory->id) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-bi-trash3-fill class="w-5 h-5 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>
@endsection
