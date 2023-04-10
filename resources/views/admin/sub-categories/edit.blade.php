<section>
<x-splade-form method="patch" :default="$subCategory"  :action="route('admin.sub-category.update',$subCategory->id)">
    <div class="grid gap-6 mb-6 ">
        <div class="flex justify-between">
            <div>
             <h1 class=" text-black font-bold">Edit Sub Category</h1>
            </div>
             <div class="">
                 <Link href="{{ route('admin.sub-categories.index') }}" class="p-3 bg-indigo-600 text-white rounded-lg">All Sub Categories</Link>
             </div>
         </div>
        <x-splade-input name="name" label="Name" placeholder="Name *" required />
        <x-splade-input name="slug" label="Slug" placeholder="Slug *" required />
        <x-splade-select name="category_id" label="Select Parent Category *" :options="$categories" option-label="name" choices option-value="id" required/>
        <x-splade-textarea name="description" label="Description" autosize />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</x-splade-form>
</section>

