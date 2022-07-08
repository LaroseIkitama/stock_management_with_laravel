@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <form method="POST" action="{{ route('category_update', $category->id) }}">
        @method('PUT')
        @csrf
        <fieldset>
            <legend>Edit the category</legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Name-->
            <div class="form-group mb-2">
                <label for="name" class="form-label mt-4">Name of category</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter the category name"
                    value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">UPDATE</button>
        </fieldset>
    </form>
@endsection
