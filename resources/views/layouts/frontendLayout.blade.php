<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="gGvxel-XKsdNkFgH6gijPGsFv5zuY9hu9gAPxRmjVaE" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    @spladeHead
    @if (env('APP_ENV') != 'local')
        @include('include.track')
    @endif
    @vite('resources/js/app.js')
</head>
<body>
    {{-- main section start --}}
    <section>
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                      <span class="sr-only">Open sidebar</span>
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                      </svg>
                   </button>
                  <a href="{{ route('/') }}" class="flex ml-2 md:mr-24">
                    <img src="{{ asset('img/logo.png') }}" class="h-8 mr-3" alt="WishesImg Logo" />
                    {{-- <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">WishesImg</span> --}}
                    <span class=" text-xl font-bold sm:text-2xl text-gray-700 whitespace-nowrap dark:text-white hidden sm:block">WishesImg</span>
                  </a>
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
                    <div class="flex items-center">
                      <div>
                        <button type="button" class="flex text-sm bg-gray-300 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                          <span class="sr-only">Open user menu</span>
                          <img class="md:w-11 w-14 md:h-9 h-8 rounded-full"
                          @auth
                          src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                          @else
                            src="{{ asset('img/user.png') }}" alt="User profile picture"
                          @endauth>
                        </button>
                      </div>

                      <div class="z-30 px-8 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
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
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                          </li>
                          <li>
                            <a href="{{ route('bookmark.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bookmarks</a>
                        </li>
                          <li>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Log out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                                </form>
                            </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                        </li>
                        @endauth
                        </ul>
                      </div>

                    </div>
                  </div>


              </div>
            </div>
          </nav>
          <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
             <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2">
                   <li>
                      <a href="{{ route('/') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-entypo-home class="w-5 h-5 text-amber-600 inline" /> <span class="ml-3 inline">Home</span>
                      </a>
                   </li>
                   @foreach ($boot_categories as $category)
                   @if ($category->activatedSubCatsAsc != null && isset($category->activatedSubCatsAsc) && count($category->activatedSubCatsAsc)>0)
                   <li>
                    <button type="button" aria-controls="{{ $category->slug }}" data-collapse-toggle="{{ $category->slug }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <x-bi-folder-fill class="w-5 h-5 text-amber-500"/>
                          <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>{{ $category->name }}</span>
                          <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <ul id="{{ $category->slug }}" class="hidden py-2 space-y-1">
                          @foreach ($category->activatedSubCatsAsc as $subCat)
                          <li>
                             <a href="{{ route('images.subcat.products',['mainCatSlug'=>$category->slug, 'subCategorySlug'=>$subCat->slug]) }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"> <x-bi-folder-fill  class="w-5 h-5 mr-2 text-amber-400"/> {{ $subCat->name }}</a>
                          </li>
                         @endforeach
                    </ul>
                 </li>
                 @endif
                 @endforeach
                 <li>
                    <a href="{{ route('sitemap') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-tabler-sitemap class="w-5 h-5 text-gray-600"/>
                       <span class="flex-1 ml-3 whitespace-nowrap">Sitemap</span>
                    </a>
                 </li>
                 <li>
                    <a href="{{ url('privacy-policy') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-eos-privacy-tip-o class="w-7 h-5 text-gray-600"/>
                       <span class="flex-1 ml-3 whitespace-nowrap">Privacy Policy</span>
                    </a>
                 </li>
                 <li>
                    <a href="{{ route('about') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-bi-info-circle class="w-5 h-5"/>
                       <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                    </a>
                 </li>
                </ul>

             </div>
          </aside>

          <div class="p-4 sm:ml-64">
             <div class="p-4 mt-14">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12 md:col-span-9">
                        <div>
                            @splade
                        </div>
                    </div>
                    {{-- ad section --}}
                    <div class="col-span-12 md:col-span-3">
                        <div class="hidden md:block sticky top-20 mb-1">
                            <div class="rounded" style="width: 250px; height: 300px; background: #e2e5e7; color: #424242; line-height: 300px; text-align: center; ">
                                Ads
                            </div>
                        </div>

                        @foreach ($rightSideRandProduct->chunk(2) as $rightSideChunk)
                                @foreach ($rightSideChunk as $rtpro)
                                <div class="my-5">
                                    <a href="{{ route('show.product',$rtpro->slug) }}">
                                        <img class="h-auto max-w-full rounded-lg" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$rtpro->thumbnail) }}" alt="{{ $rtpro->name }}">
                                    </a>
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
          <div data-dial-init class="fixed bottom-20 sm:bottom-6 right-9 sm:right-10 group">
            <div id="speed-dial-menu-text-outside-button-square" class="flex flex-col items-center hidden mb-4 space-y-2">
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 hover:text-gray-900 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg aria-hidden="true" class="w-6 h-6 mx-auto mt-px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path></svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -left-14 top-1/2">Share</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg aria-hidden="true" class="w-6 h-6 mx-auto mt-px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path></svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -left-14 top-1/2">Print</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg aria-hidden="true" class="w-6 h-6 mx-auto mt-px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z" fill-rule="evenodd"></path></svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -left-14 top-1/2">Save</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg aria-hidden="true" class="w-6 h-6 mx-auto mt-px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path></svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -left-14 top-1/2">Copy</span>
                </button>
            </div>
            <button type="button" data-dial-toggle="speed-dial-menu-text-outside-button-square" aria-controls="speed-dial-menu-text-outside-button-square" aria-expanded="false" class="flex items-center justify-center text-gray-500 border border-gray-300 shadow bg-gray-200 rounded-full w-14 h-14 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-800">
                <svg aria-hidden="true" class="w-8 h-8 transition-transform group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span class="sr-only">Open actions menu</span>
            </button>
        </div>
         {{-- floating action button end--}}
         {{-- bottom navigation --}}
        @include('include.bottomNav')
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
    </section>
    @stack('scripts')
</body>
</html>
