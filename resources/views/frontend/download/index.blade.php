@extends('layouts.frontendLayout')
@section('content')
<section>
{{-- images --}}
<div>
    <div class="grid grid-cols-12 gap-5">
        <div class="col-span-12 md:col-span-8">
            <div class="">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://cdn.pixabay.com/photo/2023/03/18/10/43/plum-blossoms-7860381_960_720.jpg" alt="">
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

        <div class="col-span-12 md:col-span-4 bg-slate-50">
            <div class="mt-3">
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
            <div>
                <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    a
                </a>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- images end --}}
</section>
@endsection
