@extends('layouts.app')
@section('content')
    <x-slot name="logo">
    </x-slot>
    <div class="row mx-auto mt-5 w-50">
        <div class="row text-white">
            'Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.'
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label mt-2">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your name" required autofocus>
            </div>
            <div class="col mt-3">
                <button type="submit" class="btn btn-warning">Email Password Reset Link </button>
            </div>

        </form>

    </div>
@endsection
