<section class="padding-y bg-light">
    <div class="container">
        <div class="card card mx-auto" style="max-width: 500px;">
            <article class="card-body">

                @if(session()->has('password_success'))
                    <div class="alert alert-success">{{session()->get('password_success')}}</div>
                @endif
                @if(session()->has('password_error'))
                    <div class="alert alert-error">{{session()->get('password_error')}}</div>
                @endif

                <form method="POST"  wire:submit.prevent="changePassword">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">{{ __('Current password') }}</label>
                        <input id="current_password" class="form-control" type="password" wire:model="current_password"
                          autofocus />
                          @error('current_password')<p class="text-danger">{{ $message }} </p>@enderror
                    </div>
                    <!-- col end.// -->
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password"  wire:model="password"
                                autocomplete="new-password" />
                          @error('password')<p class="text-danger">{{ $message }} </p> @enderror

                        </div>
                        <!-- col end.// -->
                        <div class="col-6 mb-3">
                            <label for="password_confirmation"
                                class="form-label">{{ __('Confirm password') }}</label>
                            <input id="password_confirmation" class="form-control" type="password"  wire:model="password_confirmation"
                                name="password_confirmation"  autocomplete="new-password" />
                          @error('password_confirmation') <p class="text-danger">{{ $message }} </p> @enderror

                        </div>
                    </div>

                    <button class="btn w-100 btn-primary" type="submit">{{ __('Reset Password') }}</button>

                </form>
            </article>
        </div>
    </div>
</section>
{{-- </x-guest-layout> --}}
