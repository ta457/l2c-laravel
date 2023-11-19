<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="card hover:shadow-lg w-full rounded-xl md:shadow-md flex text-gray-900 bg-slate-100 dark:bg-gray-900 dark:text-white">
            @include('profile.partials.update-profile-avatar')
            <div class="py-3 px-6 flex flex-col justify-items-center h-full">
                <p class="mb-6 text-2xl font-semibold">
                    {{ Auth::user()->name }} 
                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                     / {{ Auth::user()->role_name }}
                    @endif
                </p>
                <p class="font-normal text-sm mb-1 flex items-center gap-4">
                    <svg class="inline w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    {{ Auth::user()->email }}
                </p>
                <p class="font-normal text-sm mb-1 flex items-center gap-4">
                    <svg class="inline w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path d="M12 0H2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM7.5 17.5h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2ZM12 13H2V4h10v9Z"/>
                    </svg>
                    {{ Auth::user()->phone }}
                </p>
                <p class="font-normal text-sm mb-1 flex items-center gap-4 text-primary-600 hover:text-primary-500 hover:underline">
                    <svg class="inline w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                    </svg>
                    <a href="{{ Auth::user()->github }}" target="_blank">{{ Auth::user()->github }}</a>
                </p>
            </div>
        </div>

        <div class="mt-6">
            <x-input-label for="avatar" :value="__('Change your avatar')" />
            {{-- <input 
                class="mt-1 block w-full border-gray-300 focus:ring-primary-500 focus:border-primary-500 rounded-md shadow-sm" 
                type="file" name="avatar" id="avatar"
            > --}}
            <input class="mt-1 block w-full font-normal text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                id="avatar" name="avatar" type="file">
        </div>

        <div class="mt-2">
            <x-input-label for="name" :value="__('Change your name')" />
            <x-text-input id="name" name="name" type="text" class="font-normal mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mt-2">
            <x-input-label for="phone" :value="__('Change your phone number')" />
            <x-text-input id="phone" name="phone" type="text" class="font-normal mt-1 block w-full" :value="old('name', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div class="mt-2">
            <x-input-label for="github" :value="__('Change your Github')" />
            <x-text-input id="github" name="github" type="text" class="font-normal mt-1 block w-full" :value="old('name', $user->github)" required autofocus autocomplete="github" />
            <x-input-error class="mt-2" :messages="$errors->get('github')" />
        </div>

        <div class="hidden">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" readonly class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-6 flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
