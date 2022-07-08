@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')

    <form method="POST" action="{{ route('output_update', $output->id) }}">
        @method('PUT')
        @csrf
        <fieldset>
            <legend>Edit the entries</legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--Quantity-->
            <div class="form-group mb-2">
                <label for="quantity" class="form-label mt-4">Quantity of output</label>
                <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Enter the quantity"
                    value="{{ $output->quantity }}" required>
            </div>
            <!--Price-->
            <div class="form-group mb-2">
                <label for="price" class="form-label mt-4">Price</label>
                <input name="price" type="number" class="form-control" id="price" placeholder="Enter the price"
                    value="{{ $output->price }}" min="0" required>
            </div>
            <!--Product select -->
            <div class="form-group mb-3">
                <label for="product_id" class="form-label mt-4">Select the product</label>
                <select class="form-select" name="product_id" id="product_id">
                    <option value="{{ $output->product_id }}" selected>Choose the product</option>
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->description }}</option>
                    @empty
                        <h5>!!! NO ENTRY RECORDED IN THE DATABASE !!!</h5>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-success">REGISTER</button>
        </fieldset>
    </form>
@endsection
