@seoTitle(__('Log in'))
<x-authentication-card>
    <x-slot:logo>
        {{-- <x-authentication-card-logo /> --}}
        <div class="mb-5">
            <h1 class=" text-2xl font-semibold text-gray-700 mb-3">Sign in</h1>
            <h2 class=" text-lg font-normal text-gray-700">to continue WishesImg</h2>
        </div>
    </x-slot>

    @if($status = session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $status }}
        </div>
    @endif

    <x-splade-form class="space-y-4">
        <x-splade-input id="email" name="email" type="text" :label="__('Email or Username')" required autofocus />
        <x-splade-input id="password" name="password" type="password" :label="__('Password')" required autocomplete="current-password" />
        <x-splade-checkbox name="remember">{{ __('Remember me') }}</x-splade-checkbox>
        <div class="flex items-center justify-end mt-4">
            @if(Route::has('password.request'))
                <Link href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Forgot your password?') }}
                </Link>
            @endif
            <x-splade-submit :label="__('Log in')" class="ml-4" />
        </div>
    </x-splade-form>
</x-authentication-card>


