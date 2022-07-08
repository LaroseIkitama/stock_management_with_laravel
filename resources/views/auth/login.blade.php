@extends('layouts.app')
@section('content')
    <x-slot name="logo">
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mx-auto row w-50 bg-dark border rounded-3 text-white p-3">
            <div class="col">
                <fieldset>
                    <legend class="mt-2">Login</legend>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label mt-2">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter your name" autofocus required>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your first name" autocomplete="current-password" required>
                    </div>
                    <!-- Remember Me -->

                    <div class="block mt-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            @if (Route::has('password.request'))
                                <u>
                                    <a class="text-info" href="{{ route('password.request') }}">Forgot your password?</a>
                                </u>
                            @endif
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

    </form>
@endsection
