@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('product_store') }}">
        @csrf
        <fieldset>
            <legend>Adding the product</legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Description-->
            <div class="form-group mb-2">
                <label for="description" class="form-label mt-4">Description of product</label>
                <input name="description" type="text" class="form-control" id="description"
                    placeholder="Enter the product description" value="{{ old('description') }}" required>
            </div>
            <!--Stock-->
            <div class="form-group mb-2">
                <label for="stock" class="form-label mt-4">Stock of product</label>
                <input name="stock" type="number" class="form-control" id="stock"
                    placeholder="Enter the product stock" value="{{ old('stock') }}" min="0" required>
            </div>
            <!--Category select -->
            <div class="form-group">
                <label for="category" class="form-label mt-4">Select the category</label>
                <select class="form-select" name="category" id="category">
                    <option value="" disabled selected>Choose the category</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <h5>!!! NO CATEGORY RECORDED IN THE DATABASE !!!</h5>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-success">REGISTER</button>
        </fieldset>
    </form>
@endsection
