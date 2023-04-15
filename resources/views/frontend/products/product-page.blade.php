
<section>
{{-- images --}}
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12 md:col-span-8">
            <div class="">
                <div>
                     {{-- Mobile Download button --}}
                    <Link href="#download_modal" class="mt-5 mb-3 block md:hidden">
                            <div data-modal-target="download-modal" data-modal-toggle="download-modal" class=" w-full bg-green-600 rounded-full  text-gray-100 text-center py-1 font-semibold">
                            <x-eos-download width="50" height="30" class="block mx-auto" />
                            Free Download
                            </div>
                    </Link>
                    <img class=" block mx-auto rounded-lg" style="max-height: 600px;"
                    src="{{ Storage::disk('wishes')->url('wishesFiles/product/low/'.$product->low_quality) }}"
                    alt="{{ $product->name }}">
                    <div class=" mt-5">
                        <p class=" leading-7 text-gray-800">
                            <span class=" text-lg font-bold text-gray-800">Description: </span>
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="mt-10">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($randProducts->chunk(3) as $randChunk)
                                <div class="grid gap-4">
                                    @foreach ($randChunk as $randPro)
                                    <div>
                                        <Link href="{{ route('show.product',$randPro->slug) }}">
                                            <img class="h-auto max-w-full rounded-lg" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$randPro->thumbnail) }}" alt="{{ $randPro->name }}">
                                        </Link>
                                    </div>
                                    @endforeach
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-4">
            <div class="mt-3">
            {{-- Desktip image info and download option --}}
            <div class=" hidden md:block">
                <div class="flex items-center space-x-4">
                    <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="">
                    <div class=" font-semibold text-gray-800 dark:text-white">
                        <div><span class="">Anowar Hosen</span></div>
                    </div>
                </div>

                {{-- image name --}}
                <div class=" mt-4">
                    <h1 class=" font-semibold text-lg text-gray-800">{{ $product->name }}</h1>
                </div>
                {{-- image name end --}}
            <div class="mx-3 mt-5">
                <div class=" flex justify-between">
                    {{-- Favorite --}}
                    @if (Auth::check() && Auth::user()->favorites->contains($product->id) == true)
                    <x-splade-form
                        action="{{ route('favorite.remove') }}"
                        :default="['slug' => $product->slug]">
                        <input v-model="form.slug"  type="hidden"  />
                        <button type="submit">
                            <div class=" rounded-full px-8 py-2 text-gray-100 bg-red-700"  title="Remove from favorite" data-tooltip-target="remove_favorite">
                                <x-tabler-heart-off class="inline"/> <span class="inline font-medium text-lg">{{ $favCount }}</span>
                            </div>
                            <div id="remove_favorite" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Remove from favorite
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </x-splade-form>
                    @else
                    <x-splade-form
                        action="{{ route('favorite.add') }}"
                        :default="['slug' => $product->slug]">
                        <input v-model="form.slug"  type="hidden"  />
                        <button type="submit">
                            <div class=" rounded-full px-8 py-2 text-gray-100 bg-blue-700"  title="Add to favorite" data-tooltip-target="add_favorite">
                                <x-tabler-heart class="inline" /> <span class="inline font-medium text-lg">{{ $favCount }}</span>
                            </div>
                            <div id="add_favorite" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Add to favorite
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </x-splade-form>
                    @endif

                    {{-- Bookmarks --}}
                    @if (Auth::check() && Auth::user()->bookmarks->contains($product->id) == true)
                        <x-splade-form
                        action="{{ route('bookmark.remove') }}"
                        :default="['slug' => $product->slug]">
                        <input v-model="form.slug"  type="hidden"  />
                        <button type="submit">
                            <div class=" rounded-full px-8 py-2 text-gray-100 bg-red-700"  title="Remove from bookmark" data-tooltip-target="remove_bookmark">
                                <x-tabler-bookmark-off/>
                            </div>
                            <div id="remove_bookmark" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Remove from bookmark
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                    </x-splade-form>
                    @else
                    <x-splade-form
                        action="{{ route('bookmark.add') }}"
                        :default="['slug' => $product->slug]">
                        <input v-model="form.slug"  type="hidden"  />
                        <button type="submit">
                            <div class=" rounded-full px-8 py-2 text-gray-100 bg-blue-700" title="Add to bookmark" data-tooltip-target="add_bookmark">
                                <x-tabler-bookmark />
                            </div>
                            <div id="add_bookmark" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Add to bookmark
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </button>
                        </x-splade-form>
                    @endif


                    <Link href="#share" >
                        <div class=" rounded-full px-8 py-2  bg-gray-300" data-tooltip-target="share">
                           <x-tabler-share />
                        </div>
                        <div id="share" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Share
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </Link>
                </div>
              </div>

              {{-- Download button --}}
              <div class="mt-5">
                <Link href="#download_modal" class=" cursor-pointer">
                    <div class=" bg-green-600 rounded-lg  text-gray-100 text-center py-1 font-semibold w-full">
                     <x-eos-download width="50" height="40" class="block mx-auto" />
                     Free Download
                    </div>
              </Link>
            <div class="mt-3 mb-1">
                <div class="rounded" style="width: 250px; height: 250px; background: #e2e5e7; color: #424242; line-height: 250px; text-align: center; ">
                    Ads
                </div>
            </div>

        </div>
         {{-- Desktip image info and download option end--}}
          {{-- more images --}}
         <div class="mt-5">
            <h4 class="bg-gray-200 rounded-md py-1 px-3 font-bold text-gray-800 mb-2">Same Artist</h4>
            <div class="grid grid-cols-1">
                <div class="grid my-1">
                    <div>
                        <div class="rounded" style="width: 250px; height: 300px; background: #e2e5e7; color: #424242; line-height: 300px; text-align: center; ">
                            Ads
                        </div>
                    </div>
                </div>
                @foreach ($thoseCatsPro as $thospro)
                <div class="grid my-1">
                    <div>
                        <Link href="{{ route('show.product',$thospro->slug) }}">
                            <img class="h-auto max-w-full rounded-lg" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$thospro->thumbnail) }}" alt="{{ $thospro->name }}">
                        </Link>
                    </div>
                </div>
                @endforeach

            </div>
         </div>
        {{-- more images end --}}
        </div>
         {{-- Download Modal Start --}}
         <x-splade-modal name="download_modal" slideover max-width="lg" class="z-40" >
            <div class="px-6 py-6 lg:px-8 bg-slate-800 z-40 rounded-lg ">
                <h3 class="mb-4 text-xl text-gray-300 font-bold dark:text-white">Select Image Quality</h3>
                <form class="space-y-6" action="{{ route('download.post.req',$product->slug) }}" method="post">
                    @csrf
                <ul class="w-full text-sm font-medium text-gray-900 border border-gray-700 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="list-radio-license" type="radio" value="1" name="img_ql" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">Low Quality</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="list-radio-millitary" type="radio" checked value="2" name="img_ql" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">Medium Quality</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input id="list-radio-passport" type="radio" value="3" name="img_ql" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">High Quality</label>
                        </div>
                    </li>
                </ul>
                <button type="submit" class=" bg-slate-900 w-full py-3 rounded-full text-gray-300 font-bold">Download</button>
                </form>
                {{-- <x-splade-form action="{{ route('download.post.req',$product->slug) }}" >
                    <label for="img_ql" class=" text-xl text-gray-300 font-bold dark:text-white">Select Image Quality *</label>
                    <x-splade-group name="img_ql" class="mt-4 w-full text-sm font-medium text-gray-300 border border-gray-700 rounded-lg dark:bg-gray-500 dark:border-gray-600 dark:text-white py-2">
                        <x-splade-radio name="img_ql" value="1" label="Low Quality" class="w-full border-b  border-gray-600 py-2 pl-3"  required/>
                        <x-splade-radio name="img_ql" value="2" label="Medium Quality" class="w-full border-b border-gray-600 py-2 pl-3" required/>
                        <x-splade-radio name="img_ql" value="3" label="High Quality" class="w-full py-2 pl-3" required/>
                    </x-splade-group>
                    <button type="submit" @click="download(form)" class=" bg-slate-900 w-full py-3 rounded-full text-gray-300 font-bold mt-4">Download</button>
                </x-splade-form> --}}
            </div>
        </x-splade-modal>
         {{-- Download Modal End --}}
        {{-- share modal --}}
        <x-splade-modal name="share">
            <p class=" text-3xl font-black text-gray-700 mb-10">Share</p>
            <div class="flex">
                <div>
                    <a href="{{ 'https://www.facebook.com/sharer/sharer.php?u='.'https://www.wishesimg.com/'.$product->slug }}" target="_blank">
                       <div class="facebook p-5 rounded-lg mr-3">
                        <x-tabler-brand-facebook class="text-2xl text-white"/>
                       </div>
                    </a>
                </div>
                <div>
                    <a href="{{ 'https://twitter.com/intent/tweet?text='.$product->name.'&url='.'https://www.wishesimg.com/'.$product->slug }}" target="_blank">
                       <div class="twitter p-5 rounded-lg  mr-3">
                        <x-tabler-brand-twitter class="text-2xl text-white"/>
                       </div>
                    </a>
                </div>
                <div>
                    <a href="{{ 'https://web.whatsapp.com/send?text='.'https://www.wishesimg.com/'.$product->slug }}" target="_blank">
                    <div class="whatsapp p-5 rounded-lg mr-3">
                        <x-tabler-brand-whatsapp class="text-2xl text-white"/>
                    </div>
                    </a>
                </div>
            </div>
        </x-splade-modal>
        {{-- share modal ends --}}
    </div>
    </div>
</div>
{{-- images end --}}
</section>

@push('scripts')
<x-splade-script>
    function download(form){
        console.log('ok');
    }
</x-splade-script>
@endpush
