@extends('layouts.frontendLayout')
@section('content')
<section>
{{-- images --}}
<div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-4">
    <div class="grid gap-4">
        <div>
            <a href="{{ route('download') }}">
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('img/Birthday.jpg') }}" alt="">
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
</div>
{{-- images end --}}
</section>
@endsection
