@extends('layouts.frontendLayout')
@section('content')
<section>
{{-- images --}}
<div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-4">
    @foreach ($products->chunk(3) as $chunk)
         <div class="grid gap-4">
            @foreach ($chunk as $product)
            <div>
                <Link href="{{ route('show.product',$product->slug) }}">
                    <img class="h-auto max-w-full rounded-lg" src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                </Link>
            </div>
            @endforeach
        </div>
    @endforeach
</div>
{{-- images end --}}
</section>
@endsection
