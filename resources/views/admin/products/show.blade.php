<section class="">
    <div class="container mx-auto px-4">
      <nav class="flex">
        <ol role="list" class="flex items-center">
          <li class="text-left">
            <div class="-m-1">
              <Link href="{{ route('admin.dashboard') }}" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Dashboard </Link>
            </div>
          </li>

          <li class="text-left">
            <div class="flex items-center">
              <span class="mx-2 text-gray-400">/</span>
              <div class="-m-1">
                <Link href="{{ route('admin.products.index') }}" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Products </Link>
              </div>
            </div>
          </li>

          <li class="text-left">
            <div class="flex items-center">
              <span class="mx-2 text-gray-400">/</span>
              <div class="-m-1">
                <span class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800" aria-current="page"> {{ $product->name }} </span>
              </div>
            </div>
          </li>
        </ol>
      </nav>

      <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
        <div class="lg:col-span-3 lg:row-end-1">
          <div class="lg:flex lg:items-start">
            <div class="lg:order-2 lg:ml-5">
              <div class="max-w-xl overflow-hidden rounded-lg">
                <img class="h-full w-full max-w-full object-cover" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->name }}" />
              </div>
            </div>

            {{-- <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
              <div class="flex flex-row items-start lg:flex-col">
                <button type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center">
                  <img class="h-full w-full object-cover" src="/images/JHxMnVrtPMdcNU1s_7g7f.png" alt="" />
                </button>
                <button type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                  <img class="h-full w-full object-cover" src="/images/JHxMnVrtPMdcNU1s_7g7f.png" alt="" />
                </button>
                <button type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                  <img class="h-full w-full object-cover" src="/images/JHxMnVrtPMdcNU1s_7g7f.png" alt="" />
                </button>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
          <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $product->name }}</h1>

          {{-- <div class="mt-5 flex items-center">
            <div class="flex items-center">
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
              </svg>
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
              </svg>
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
              </svg>
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
              </svg>
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
              </svg>
            </div>
            <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
          </div> --}}

          <h2 class="mt-8 text-gray-900 font-semibold text-lg">Categories</h2>
          <div class="mt-3 flex select-none flex-wrap items-center gap-1">
            @foreach ($product->categories as $category)
            <label class="">
                <input type="radio" name="type" value="Powder" class="peer sr-only" checked />
                <p class=" bg-gray-200 rounded-lg py-1 px-2 text-black border border-gray-300  font-bold">{{ $category->name }}</p>
              </label>
            @endforeach
          </div>

          <h2 class="mt-8 text-gray-900 font-semibold text-lg">Sub Categories</h2>
          <div class="mt-3 flex select-none flex-wrap items-center gap-1">
            @foreach ($product->subcategories as $subcategory)
            <label class="">
              <input type="radio" name="type" value="Powder" class="peer sr-only" checked />
              <p class=" bg-gray-200 rounded-lg py-1 px-2 text-black border border-gray-300  font-bold">{{ $subcategory->name }}</p>
            </label>
            @endforeach
          </div>

          {{-- <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
            <div class="flex items-end">
              <h1 class="text-3xl font-bold">$60.50</h1>
              <span class="text-base">/month</span>
            </div>

            <button type="button" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
              </svg>
              Add to cart
            </button>
          </div> --}}

          {{-- <ul class="mt-8 space-y-2">
            <li class="flex items-center text-left text-sm font-medium text-gray-600">
              <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
              </svg>
              Free shipping worldwide
            </li>

            <li class="flex items-center text-left text-sm font-medium text-gray-600">
              <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
              </svg>
              Cancel Anytime
            </li>
          </ul> --}}
        </div>

        <div class="lg:col-span-3">
          <div class="border-b border-gray-300">
            <nav class="flex gap-4">
              <span title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </span>

              {{-- <a href="#" title="" class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
                Reviews
                <span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100"> 1,209 </span>
              </a> --}}
            </nav>
          </div>

          <div class="mt-8 flow-root sm:mt-12">
            {{ $category->description }}
        </div>
        </div>
      </div>
    </div>
  </section>
