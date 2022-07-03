{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <section class="padding-y bg-light">
        <div class="container">
            <!-- =========== COMPONENT LOGIN 1=========== -->
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <h4 class="mb-4">{{ __('Sign in') }}</h4>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input class="form-control"id="email" type="email" name="email"
                                :value="old('email')" required autofocus>
                        </div>
                        <!-- col end.// -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input class="form-control" id="password" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>
                        <!-- col end.// -->
                        <div class="mb-3">
                            <label for="remember_me">
                                <input id="remember_me" name="remember" class="form-check-input" type="checkbox"
                                    value="" checked="">
                                <span class="form-check-label"> {{ __('Remember me') }} </span>
                            </label>
                            <a class="float-end" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                        <button class="btn w-100 btn-primary" type="submit"> {{ __('Sign in') }} </button>
                    </form>
                    <!-- form end.// -->
                    <p class="text-divider my-4">{{ __('New to shop?') }}</p>
                    <a href="{{ route('register') }}" class="btn w-100 btn-light">{{ __('Create new accaunt') }}</a>
                </div>
                <!-- card-body end.// -->
            </div>
            <!-- card end.// -->
        </div>
    </section>
</x-guest-layout>
