@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <fieldset>
        <legend>List of entries</legend>
        <table class="table table-hover">
            <caption>List of entries</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($entries as $entry)
                    <tr class="table-dark">
                        <th scope="row">{{ $entry->id }}</th>
                        <td>{{ $entry->quantity }}</td>
                        <td>{{ $entry->price }}</td>
                        @forelse ($products as $product)
                            @if ($product->id === $entry->product_id)
                                <td>{{ $product->description }}</td>
                            @endif
                        @empty
                        @endforelse
                        <td>{{ $entry->created_at }}</td>
                        <td>
                            <form action="{{ route('entry_delete', ['entry' => $entry->id]) }}" method="POST">
                                <a href="{{ route('entry_edit', ['entry' => $entry->id]) }}">
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
                            <li> !!! NO ENTRY RECORDED IN THE DATABASE !!!</li>
                        </ul>
                    </div>
                @endforelse
            </tbody>
        </table>
    </fieldset>
@endsection
