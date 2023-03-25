@extends('layouts.frontendLayout')
@section('content')
<section>
{{-- images --}}
<div>
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12 md:col-span-8">
            <div class="">
                <div>
                     {{-- Mobile Download button --}}
                    <div class="mt-5 mb-3 block md:hidden">
                            <button type="button" data-modal-target="download-modal" data-modal-toggle="download-modal" class=" w-full bg-green-600 rounded-full  text-gray-100 text-center py-1 font-semibold">
                            <x-bi-download width="50" height="20" class="block mx-auto" /> Free Download
                            </button>
                    </div>
                    <img class=" block mx-auto rounded-lg" style="max-height: 600px;"
                     src="https://cdn.pixabay.com/photo/2023/03/18/10/43/plum-blossoms-7860381_960_720.jpg"
                     {{-- src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" --}}
                     alt="">
                    <div class=" mt-5">
                        <p class=" leading-7 text-gray-800">
                            <span class=" text-lg font-bold text-gray-800">Description: </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis corporis praesentium in, vitae itaque eveniet unde aliquid dolore deserunt voluptas quod ratione quisquam eum dolorem rerum voluptatibus animi quibusdam cupiditate?
                        </p>
                    </div>
                    <div class="mt-10">
                        <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-4">
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="grid gap-4">
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('download') }}">
                                        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- images end --}}
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
                    <h1 class=" font-semibold text-lg text-gray-800">Happy Birthday wish Image </h1>
                </div>
                {{-- image name end --}}
            <div class="mx-3 mt-5">
                <div class=" flex justify-between">
                    <a href="#" >
                        <div class=" rounded-full px-8 py-2 text-gray-100 bg-blue-700">
                            <x-bi-heart-fill />
                        </div>
                    </a>

                    <a href="#" >
                        <div class=" rounded-full px-8 py-2 text-gray-100 bg-blue-700">
                            <x-bi-bookmark-plus-fill />
                        </div>
                    </a>

                    <a href="#" >
                        <div class=" rounded-full px-8 py-2  bg-gray-300">
                            <x-bi-share-fill />
                        </div>
                    </a>
                </div>
              </div>

              {{-- Download button --}}
              <div class="mt-5">
                <div class=" cursor-pointer" data-modal-target="download-modal" data-modal-toggle="download-modal">
                    <button type="button" class=" bg-green-600 rounded-lg  text-gray-100 text-center py-1 font-semibold w-full">
                     <x-bi-download width="50" height="20" class="block mx-auto" /> Free Download
                    </button>
                </a>
              </div>
              {{-- ad --}}
              <div class="mt-3">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                </a>
              </div>
        </div>
         {{-- Desktip image info and download option end--}}
          {{-- more images --}}
         <div class="mt-5">
            <h4 class="bg-gray-200 rounded-md py-1 px-3 font-bold text-gray-800 mb-2">Same Artist</h4>
            <div class="grid grid-cols-2 lg:grid-cols-2 md:grid-cols-2 gap-4">
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('download') }}">
                            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
         </div>
        {{-- more images end --}}
        </div>
         {{-- Download Modal Start --}}
         <div id="download-modal" data-modal-placement="center-center" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-slate-800 rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-slate-600 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="download-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl text-gray-300 font-bold dark:text-white">Select Image Quality</h3>
                        <form class="space-y-6" action="#">
                        <ul class="w-full text-sm font-medium text-gray-900 border border-gray-700 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="list-radio-license" type="radio" value="low" name="imageQuality" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">Low Quality</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="list-radio-millitary" type="radio" value="medium" name="imageQuality" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">Medium Quality</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-700 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="list-radio-passport" type="radio" value="high" name="imageQuality" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-200 dark:text-gray-300">High Quality <span class=" text-xs text-gray-400 font-semibold">( Login required )</span></label>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class=" bg-slate-900 w-full py-3 rounded-full text-gray-300 font-bold">Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         {{-- Download Modal End --}}
    </div>
    </div>
</div>
{{-- images end --}}
</section>
@endsection
