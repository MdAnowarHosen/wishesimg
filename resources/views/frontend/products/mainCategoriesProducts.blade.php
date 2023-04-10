<section>
{{-- images --}}
<div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-3 gap-4">
    @foreach ($products->chunk(3) as $chunk)
         <div class="grid gap-4">
            @foreach ($chunk as $product)
            <div>
                <Link href="{{ route('show.product',$product->slug) }}">
                    <img class="h-auto max-w-full rounded-lg transition ease-in-out delay-75  hover:-translate-y-1 hover:scale-105 duration-100 " src="{{ Storage::disk('wishes')->url('wishesFiles/product/thumbnail/'.$product->thumbnail) }}" alt="{{ $product->name }}">
                </Link>
            </div>
            @endforeach
        </div>
    @endforeach
</div>
{{-- images end --}}
<div class="mt-10">
    {{ $products->links() }}
</div>
</section>

