{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
<x-guest-layout>
    <section class="padding-y bg-light">
        <div class="container">
            <div class="card card mx-auto" style="max-width: 500px;">
                <article class="card-body">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <x-jet-input id="email" class="form-control" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus />
                        </div>
                        <!-- col end.// -->
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>
                            <!-- col end.// -->
                            <div class="col-6 mb-3">
                                <label for="password_confirmation"
                                    class="form-label">{{ __('Confirm password') }}</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>
                        </div>

                        <button class="btn w-100 btn-primary" type="submit">{{ __('Reset Password') }}</button>

                    </form>
                </article>
            </div>
        </div>
    </section>
</x-guest-layout>
