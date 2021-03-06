@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <fieldset>
        <legend>List of products</legend>
        <table class="table table-hover">
            <caption>List of products</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">CATEGORIE</th>
                    <th scope="col">CREATED BY</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="table-dark">
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        @forelse ($categories as $category)
                            @if ($product->category_id === $category->id)
                                <td>{{ $category->name }}</td>
                            @endif
                        @empty
                        @endforelse
                        @forelse ($users as $user)
                            @if ($product->user_id === $user->id)
                                <td>{{ $user->name }}</td>
                            @endif
                        @empty
                        @endforelse

                        <td>
                            <form action="{{ route('product_delete', ['product' => $product->id]) }}" method="POST">
                                <a href="{{ route('product_edit', ['product' => $product->id]) }}">
                                    <button type="button" class="btn btn-outline-warning">Edit</button>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-warning">
                        <ul>
                            <li> !!! NO PRODUCT RECORDED IN THE DATABASE !!!</li>
                        </ul>
                    </div>
                @endforelse
            </tbody>
        </table>
    </fieldset>
@endsection
