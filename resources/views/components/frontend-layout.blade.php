
    {{-- primary section start --}}
    <div>
        <x-splade-data store="sidebar" default="{ open: false }" />

        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                  <button @click="sidebar.open = ! sidebar.open"  type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                      <span class="sr-only">Open sidebar</span>
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                      </svg>
                   </button>
                  <Link href="{{ route('/') }}" class="flex ml-2 md:mr-24">
                    <img src="{{ asset('img/logo.png') }}" class="h-8 mr-3" alt="WishesImg Logo" />
                    {{-- <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">WishesImg</span> --}}
                    <span class=" text-xl font-bold sm:text-2xl text-gray-700 whitespace-nowrap dark:text-white hidden sm:block">WishesImg</span>
                  </Link>
                </div>
                <div class="flex items-start justify-center w-full ">
                          <form action="{{ route('search') }}" method="get" class="w-1/2 md:-ml-52 hidden md:block">
                            <div class="flex">
                                {{-- <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                                    </li>
                                    </ul>
                                </div> --}}
                                <div class="relative w-full">
                                    <input type="text" name="query" id="search-dropdown" value="{{ request()->get('query') }}" class="block pl-8 p-2.5 w-full z-20 text-sm font-semibold text-gray-900 bg-gray-50 rounded-full border-l-2 border border-gray-300 focus:ring-0 focus:border-l-0 focus:border-gray-300 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-gray-500" placeholder="Search" required />
                                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white  rounded-r-full px-8 border border-gray-300 focus:ring-0 focus:outline-none dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>

                <div class="flex items-center">
                    <x-splade-toggle>
                    <div class="flex items-center">
                      <div>
                        <button @click.prevent="toggle" type="button" class="flex text-sm bg-gray-300 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" >
                          <span class="sr-only">Open user menu</span>
                          <img class="md:w-11 w-14 md:h-9 h-8 rounded-full"
                          @auth
                          src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                          @else
                            src="{{ asset('img/user.png') }}" alt="User profile picture"
                          @endauth>
                        </button>
                      </div>

                      <div v-show="toggled" class=" absolute mt-64 right-0 z-30 px-8 mb-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600 ">
                        @auth
                        <div class="py-3" role="none">
                          <p class="text-sm text-gray-900 dark:text-white" role="none">
                            {{ Auth::user()->name }}
                          </p>
                          <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            {{ Auth::user()->email }}
                          </p>
                        </div>
                        @endauth
                        <ul class="py-1" role="none">
                        @auth
                          <li>
                                <Link href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</Link>
                          </li>
                          <li>
                            <Link href="{{ route('bookmark.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bookmarks</Link>
                        </li>
                          <li>
                                <Link class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Log out
                                </Link>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                                </form>
                            </li>
                        @else
                        <li>
                            <Link href="{{ route('login') }}"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</Link>
                        </li>
                        <li>
                            <Link href="{{ route('register') }}"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</Link>
                        </li>
                        @endauth
                        </ul>
                      </div>

                    </div>
                </x-splade-toggle>
                  </div>


              </div>
            </div>
          </nav>

        <div :class="{'translate-x-0': sidebar.open, 'hidden md:block': ! sidebar.open}"  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform  bg-white border-r border-gray-200 translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
             <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2 pb-11 md:pb-0">
                   <li>
                      <Link href="{{ route('/') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-house-door-fill text-amber-500 inline text-xl"></i>
                        <span class="ml-1 inline">Home</span>
                      </Link>
                   </li>

                   @foreach ($boot_categories as $category)
                   @if ($category->activatedSubCatsAsc != null && isset($category->activatedSubCatsAsc) && count($category->activatedSubCatsAsc)>0)
                   <li>
                    <x-splade-toggle>
                    <button @click.prevent="toggle" type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <i class="bi bi-folder-fill text-amber-500 text-xl"></i>
                          <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>{{ $category->name }}</span>
                          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <ul v-show="toggled" id="{{ $category->slug }}" class=" py-2 space-y-1">
                        {{-- main category link --}}
                        <li>
                            <Link href="{{ route('images.main.products',['mainCatSlug'=>$category->slug]) }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i class="bi bi-folder-fill text-amber-400 text-lg"></i>
                                &nbsp; {{ $category->name }}</Link>
                         </li>
                        {{-- main category link end--}}
                          @foreach ($category->activatedSubCatsAsc as $subCat)
                          <li>
                             <Link href="{{ route('images.subcat.products',['mainCatSlug'=>$category->slug, 'subCategorySlug'=>$subCat->slug]) }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i class="bi bi-folder-fill text-amber-400 text-lg"></i>
                                &nbsp; {{ $subCat->name }}</Link>
                          </li>
                         @endforeach
                    </ul>
                </x-splade-toggle>
                 </li>
                 @endif
                 @endforeach
                 <li>
                    <Link href="{{ route('contact') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-rolodex text-amber-500 text-xl"></i>
                       <span class="flex-1 ml-3 whitespace-nowrap">Contact</span>
                    </Link>
                 </li>
                 <li>
                    <Link href="{{ route('sitemap') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-diagram-3-fill text-amber-500 text-xl"></i>
                       <span class="flex-1 ml-3 whitespace-nowrap">Sitemap</span>
                    </Link>
                 </li>
                 <li>
                    <Link href="{{ url('privacy-policy') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-shield-fill text-amber-500 text-xl"></i>
                       <span class="flex-1 ml-3 whitespace-nowrap">Privacy Policy</span>
                    </Link>
                 </li>
                 <li>
                    <Link href="{{ url('terms-of-service') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-circle-fill text-amber-500 text-xl"></i>
                       <span class="flex-1 ml-3 whitespace-nowrap">Terms of service</span>
                    </Link>
                 </li>
                 <li>
                    <Link href="{{ route('about') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-info-circle-fill text-amber-500 text-xl"></i>
                       <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                    </Link>
                 </li>
                </ul>
             </div>
          </div>

          <div class="p-4 sm:ml-64">
             <div class="p-4 mt-14">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12 md:col-span-9">
                        <main>
                           {{ $slot }}
                        </main>
                    </div>
                    {{-- ad section --}}
                    <div class="col-span-12 md:col-span-3">
                        {{-- <div class="hidden md:block sticky top-20 mb-1">
                            <div class="rounded" style="width: 250px; height: 300px; background: #e2e5e7; color: #424242; line-height: 300px; text-align: center; ">
                                Ads
                            </div>
                        </div> --}}
                        <div class="hidden md:block top-20 mb-1">
                            <div class="rounded" style="width: 250px; height: 300px; background: #e2e5e7; color: #424242; line-height: 300px; text-align: center; ">
                                Ads
                            </div>
                        </div>

                        @foreach ($rightSideRandProduct->chunk(2) as $rightSideChunk)
                                @foreach ($rightSideChunk as $rtpro)
                                <div class="my-5">
                                    <Link href="{{ route('show.product',$rtpro->slug) }}">
                                        <img class="h-auto max-w-full rounded-lg" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$rtpro->thumbnail) }}" alt="{{ $rtpro->name }}">
                                    </Link>
                                </div>
                                @endforeach
                                <div class="my-5">
                                    <div class="rounded" style="width: 250px; height: 250px; background: #e2e5e7; color: #424242; line-height: 300px; text-align: center; ">
                                        Ads
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
             </div>
          </div>
          {{-- floating action button --}}
          {{-- @include('include.floatingActionButton') --}}
         {{-- floating action button end--}}
         {{-- bottom navigation --}}
        {{-- @include('include.bottomNav') --}}
        {{-- main section end --}}
           {{-- bottom sticky ads --}}
           <div class="container mx-auto  sticky bottom-20 md:bottom-0 ">
            {{-- for medium device or upper ads --}}
            <div class="hidden md:block">
                <div class="flex justify-center">
                    <div class="">
                        <div class="text-center rounded" style="width: 980px; height: 90px; background: #e2e5e7; color: #424242; line-height: 100px; text-align: center; ">
                            <p>Ads</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- for mobile device ads --}}
            <div class="block md:hidden">
                <div class="flex justify-center">
                    <div class="">
                        <div class="text-center rounded" style="width: 200px; height: 200spx; background: #e2e5e7; color: #424242; line-height: 100px; text-align: center; ">
                            <p>Mobile Ads</p>
                        </div>
                    </div>
                </div>
            </div>
           </div>
         {{-- bottom sticky ads end --}}
    </div>
    {{-- primary section end --}}
