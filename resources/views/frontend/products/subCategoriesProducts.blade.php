<section>
    <div class="bg-slate-100 py-5 rounded-full text-center mb-3">
        <h1 class=" text-lg font-semibold">{{ $subCategory }}</h1>
    </div>
{{-- images --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($subCatPro->chunk(3) as $chunk)
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
    {{ $subCatPro->links() }}
</div>
</section>

