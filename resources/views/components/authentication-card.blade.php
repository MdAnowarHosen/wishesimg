<div class=" bg-gray-100">
    <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="rounded-lg px-10 md:px-6  md:w-full w-full mx-10 md:mx-0 sm:max-w-md mt-6 py-10 bg-white shadow-md overflow-hidden ">
                <div class="block mx-auto text-center">
                    {{ $logo }}
                </div>
                <div class="">
                {{ $slot }}
            </div>
        </div>
    </div>
        {{-- bottom sticky ads --}}
       <div class="container mx-auto  sticky bottom-16 md:bottom-0 mt-3">
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
        <div class="block md:hidden ">
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
