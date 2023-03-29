@extends('layouts.adminLayout')
@section('content')
<section>
<x-splade-form method="patch" :default="$category"  :action="route('admin.categories.update',['category'=>$category->id])">
    <div class="grid gap-6 mb-6 ">
        <div class="flex justify-between">
            <div>
             <h1 class=" text-black font-bold">Edit Category</h1>
            </div>
             <div class="">
                 <Link href="{{ route('admin.categories') }}" class="p-3 bg-indigo-600 text-white rounded-lg">All Categories</Link>
             </div>
         </div>
        <div>
            <x-splade-input name="name" label="Name" placeholder="Name"  />
        </div>
        <div>
            <x-splade-input name="slug" label="Slug" placeholder="Slug"  />
        </div>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</x-splade-form>
</section>
@endsection
