@extends('layouts.adminLayout')
@section('content')
<section>
    <x-splade-table :for="$products" as="$product" search-debounce="1000">

        @cell('id', $product)
        {{ $product->id }}
        @endcell

        @cell('image', $product)
        <img class=" w-auto h-14" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->name }}">
        @endcell

        @cell('action', $product)
        <Link href="#"><x-bi-eye-fill class="w-5 h-5 inline mx-2" /></Link>
        <Link href="{{ route('admin.products.edit',$product->id) }}"><x-fas-edit class="w-5 h-5 inline mx-2" /></Link>
        <Link href="{{ route('admin.sub-category.destroy',$product->id) }}"
        method="delete"
        confirm="Delete"
        confirm-text="Are you sure you want to delete?"
        confirm-button="Yes, Delete!"
        cancel-button="No, keep me save!"><x-bi-trash3-fill class="w-5 h-5 inline mx-2" /></Link>
        @endcell
    </x-splade-table>
</section>
@endsection
