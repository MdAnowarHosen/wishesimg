@extends('layouts.adminLayout')
@section('content')
<section>
<x-splade-form method="put" :default="$product"  :action="route('admin.products.update',$product->id)">
    <div class="grid gap-6 mb-6 ">
        <div class="flex justify-between">
           <div>
            <h1 class=" text-black font-bold">Edit Product</h1>
           </div>
            <div class="">
                <Link href="{{ route('admin.products.index') }}" class="p-3 bg-indigo-600 text-white rounded-lg">All Products</Link>
            </div>
        </div>
        <div>
            <x-splade-input name="name" label="Name" placeholder="Name" required />
        </div>
        <div>
            <x-splade-input name="slug" label="Slug" placeholder="Slug" required />
        </div>
        <x-splade-select name="categories[]" label="Select Category" :options="$categories" option-label="name"  option-value="id" required relation multiple choices/>
        <x-splade-select name="subcategories[]" remote-url="`get/subcategory/${form.categories}`" label="Sub Category" option-label="name" option-value="id" relation multiple choices />
       <div>
        @foreach ($product->subcategories as $subcat)
        <span class="inline py-1 px-2 text-white mr-1 rounded-lg bg-amber-500">{{ $subcat->name }} </span>
        @endforeach
       </div>
        <x-splade-file name="file" label="Upload Image" max-size="10MB" filepond server preview />
        <img class="h-40 w-auto" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="">
        <x-splade-input name="keywords" label="Keywords" placeholder="Keywords" />
        <x-splade-input name="meta_description" label="Meta Description" placeholder="Meta Description" />
        <x-splade-textarea name="description" label="Description" autosize />
        <x-splade-checkbox name="draft" value="1" label="Draft" />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</x-splade-form>
</section>
@endsection

