@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <form method="POST" action="{{ route('register') }}">
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
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter your name" autofocus required>
                    </div>
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name" class="form-label mt-2">FirstName</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" placeholder="Enter your first name" required>
                    </div>
                    <!-- Email Adress -->
                    <div class="form-group">
                        <label for="email" class="form-label mt-2">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            autocomplete="new-password" required>
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label mt-2">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="row mt-3">

                        <div class="col">
                        </div>
                        <div class="col-3">

                            <button type="submit" class="btn btn-outline-success">{{ __('Register') }}</button>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col ml-4">
                <fieldset class="form-group">
                    <legend class="mt-3 mb-4">Assign the roles</legend>
                    <!-- Roles -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="role_admin" name="roles[]">
                        <label class="form-check-label" for="role_admin">
                            ADMIN
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="role_supplier" name="roles[]">
                        <label class="form-check-label" for="role_supplier">
                            SUPPLIER
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="role_seller" name="roles[]">
                        <label class="form-check-label" for="role_seller">
                            SELLER
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>

    </form>
@endsection
