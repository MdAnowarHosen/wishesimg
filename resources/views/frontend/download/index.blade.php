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
                        <a href="#">
                            <div class=" bg-green-600 rounded-full  text-gray-100 text-center py-1 font-semibold">
                            <x-bi-download width="50" height="20" class="block mx-auto" /> Free Download
                            </div>
                        </a>
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
                <a href="#">
                    <div class=" bg-green-600 rounded-lg  text-gray-100 text-center py-1 font-semibold">
                     <x-bi-download width="50" height="20" class="block mx-auto" /> Free Download
                    </div>
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
    </div>
    </div>
</div>
{{-- images end --}}
</section>
@endsection
