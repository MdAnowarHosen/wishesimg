@seoTitle(__('Register'))

<x-authentication-card>
    <x-slot:logo>
        {{-- <x-authentication-card-logo/> --}}
        <div class="mb-5">
            <h1 class=" text-2xl font-semibold text-gray-700 mb-3">Sign up</h1>
            <h2 class=" text-lg font-normal text-gray-700">to continue WishesImg</h2>
        </div>
    </x-slot>

    {{-- <x-splade-form class="space-y-4">
        <x-splade-input id="name" name="name" :label="__('Name')" required autofocus />
        <x-splade-input id="email" name="email" type="email" :label="__('Email')" required />
        <x-splade-input id="username" name="username" type="text" :label="__('Username')" required />
        <x-splade-input id="password" name="password" type="password" :label="__('Password')" required autocomplete="new-password" />
        <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Confirm Password')" required autocomplete="new-password" />

        @if(\Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <x-splade-checkbox name="terms">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                ]) !!}
            </x-splade-checkbox>
        @endif

        <div class="flex items-center justify-end">
            <Link href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Already registered?') }}
            </Link>

            <x-splade-submit :label="__('Register')" class="ml-4" />
        </div>
    </x-splade-form> --}}


    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text"  id="name" name="name" value="{{ old('name') }}" required autofocus class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
                @error('name')
                <span class=" text-red-500 font-normal text-sm" role="alert">
                   {{ $message }}
                </span>
                @enderror
        </div>
        <div class="mt-4">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text"  id="email" name="email" value="{{ old('email') }}" required autofocus class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
                @error('email')
                <span class=" text-red-500 font-normal text-sm" role="alert">
                   {{ $message }}
                </span>
                @enderror
        </div>
        <div class="mt-4">
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text"  id="username" name="username" value="{{ old('username') }}" required class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
                @error('username')
                <span class=" text-red-500 font-normal text-sm" role="alert">
                   {{ $message }}
                </span>
                @enderror
        </div>
    <div>
        <div class="mt-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Password</label>
            <input type="password" id="password" name="password" required autocomplete="new-password" class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
            @error('password')
            <span class=" text-red-500 font-normal text-sm" role="alert">
                {{ $message }}
             </span>
            @enderror
    </div>
    <div>
        <div class="mt-4">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
            @error('password_confirmation')
            <span class=" text-red-500 font-normal text-sm" role="alert">
                {{ $message }}
             </span>
            @enderror
    </div>


    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class="mt-4">
        <div class="mt-5 mb-3">
            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in ">
                <input type="checkbox" name="toggle" id="show-pass" onclick="showRegPass()" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer "/>
                <label for="show-pass" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer "></label>
            </div>
            <label for="show-pass" class="text-sm text-gray-700">Show Password</label>
        </div>
        <label for="terms">
            <div class="flex items-center">
                <input type="checkbox" name="terms" id="terms" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required />
                <div class="ml-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',

                    ] ) !!}
                </div>
            </div>
        </label>
    </div>
    @endif
      <div>
        <button type="submit" class="mt-8 w-full rounded-full py-3 bg-indigo-500 text-white font-bold shadow-md shadow-gray-500/50 ">
            {{ __('Register') }}
        </button>
      </div>
    </form>
    <div class="text-center mt-8">
        <p class=" text-lg font-bold">Already have an account?</p>
        <a href="{{ route('login') }}" class="mt-5 block w-full rounded-full py-3 bg-gray-700 text-white font-bold shadow-md shadow-gray-500/50">
            Login your account
        </a>
    </div>

</x-authentication-card>
