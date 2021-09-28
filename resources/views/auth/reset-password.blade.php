@extends('layouts.baseUser')

@section('content')
    {{-- <x-guest-layout> --}}
    {{-- <x-auth-card> --}}
    <div class="row d-flex justify-content-center flex-wrap mt-5">
        {{-- <x-slot name="logo"> --}}
        {{-- <div class="row">
            <div class="col-12">
                <a href="/">
                    <img src="/assets/img/logos/sppeps.png" class="pr-3" alt="" width="150">
                </a>
            </div>
        </div> --}}
        <div class="col-md-4 col-xs-3 card card-frame">
            <div class="card-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="/reset-password">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Emel')" />

                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Kata Laluan')" />

                        <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Pengesahan Kata Laluan')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                            name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Set Semula Kata Laluan') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>






    </div>
    {{-- </x-auth-card> --}}
    {{-- </x-guest-layout> --}}

@stop
