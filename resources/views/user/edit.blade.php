@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('user_update', $user->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <fieldset>
                    <legend class="mt-3">Adding user</legend>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="form-label mt-2">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            placeholder="Enter your name" autofocus required>
                    </div>
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name" class="form-label mt-2">FirstName</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $user->first_name }}" placeholder="Enter your first name" required>
                    </div>
                    <!-- Email Adress -->
                    <div class="form-group">
                        <label for="email" class="form-label mt-2">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="row mt-3">

                        <div class="col">
                            {{-- <a href="{{ route('login') }}">
                                <button type="button" class="btn btn-outline-light">
                                    {{ __('Already registered?') }}</button>
                            </a> --}}
                        </div>
                        <div class="col-3">

                            <button type="submit" class="btn btn-outline-success">REGISTER</button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

    </form>
@endsection
