@seoTitle(__('Log in'))
<x-authentication-card>
    <x-slot:logo>
        {{-- <x-authentication-card-logo /> --}}
        <div class="mb-5">
            <h1 class=" text-2xl font-semibold text-gray-700 mb-3">Sign in</h1>
            <h2 class=" text-lg font-normal text-gray-700">to continue WishesImg</h2>
        </div>
    </x-slot>

    {{-- @if($status = session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $status }}
        </div>
    @endif --}}

    {{-- <x-splade-form class="space-y-4">
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
    </x-splade-form> --}}

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email or Username</label>
                <input type="text"  id="email" name="email" value="{{ old('email') }}" required autofocus class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
                @error('email')
                <span class=" text-red-500 font-normal text-sm" role="alert">
                   {{ $message }}
                </span>
                @enderror
        </div>
    <div>
        <div class="mt-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password" class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
            @error('password')
            <span class=" text-red-500 font-normal text-sm" role="alert">
                {{ $message }}
             </span>
            @enderror
    </div>
    <div class="flex justify-between mt-4">
        <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('password.request') }}">
                    {{ __('Forgot password??') }}
                </a>
            @endif
        </div>
    </div>
    <div class="mt-5">
        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in ">
            <input type="checkbox" name="toggle" id="toggle" onclick="showLoginPass()" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer "/>
            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer "></label>
        </div>
        <label for="toggle" class="text-sm text-gray-700">Show Password</label>
    </div>
      <div>
        <button type="submit" class="mt-8 w-full rounded-full py-3 bg-indigo-500 text-white font-bold shadow-md shadow-gray-500/50 ">
            {{ __('Log in') }}
        </button>
      </div>
    </form>
    <div class="text-center mt-8">
        <p class=" text-lg font-bold">Don't have an account?</p>
        <a href="{{ route('register') }}" class="mt-5 block w-full rounded-full py-3 bg-gray-700 text-white font-bold shadow-md shadow-gray-500/50">
            Register a new account
        </a>
    </div>
</x-authentication-card>


