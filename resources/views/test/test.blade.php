{{--
    <x-splade-data store="navigation" :default="['cat1'=>false]"/>

        <button  @click.prevent="navigation.cat1 =! navigation.cat1">
            Open Navigation
        </button>

        <nav v-show="navigation.cat1">
           aaaaaaaaaaa
        </nav>


        <x-splade-data :default="['cat1'=>false]">

            <button  @click.prevent="data.cat1 =! data.cat1">
                Open Navigation 2
            </button>

            <nav v-show="data.cat1">
               aaaaaaaaaaa 2
            </nav>
        </x-splade-data> --}}


        <x-splade-data :default="$boot_categories">



                <ul class="space-y-2">
                   <li>
                      <Link href="{{ route('/') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-entypo-home class="w-5 h-5 text-gray-600" />
                         <span class="ml-3">Home</span>
                      </Link>
                   </li>

                   @foreach ($boot_categories as $category)
                   @if ($category->ActivatedSubCategories != null && isset($category->ActivatedSubCategories) && count($category->ActivatedSubCategories)>0)
                   <li>

                    <button @click="data.$category =! data.$category"  type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                          <x-bi-folder class="w-5 h-5"/>
                          <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $category->name }}</span>
                          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <ul   class="py-2 space-y-2">
                        @foreach ($category->ActivatedSubCategories as $subCat)
                        <li v-show="data.$category">
                            <Link href="{{ route('images.subcat.products',['mainCatSlug'=>$category->slug, 'subCategorySlug'=>$subCat->slug]) }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"><x-bi-folder2-open class="w-5 h-5 mr-2"/> {{ $subCat->name }}</Link>
                         </li>
                        @endforeach
                  </ul>

                </li>
                @endif
                   @endforeach





                   <li>
                      <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                         <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                      </a>
                   </li>
                   {{-- <li>
                      <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                         <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                         <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                      </a>
                   </li> --}}

                 <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-eos-privacy-tip-o class="w-5 h-5 text-gray-600"/>
                       <span class="flex-1 ml-3 whitespace-nowrap">Privacy Policy</span>
                    </a>
                 </li>
                 <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-bi-info-circle class="w-5 h-5"/>
                       <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                    </a>
                 </li>
                </ul>
            </x-splade-data>
