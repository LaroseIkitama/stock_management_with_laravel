@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <fieldset>
        <legend>List of outputs</legend>
        <table class="table table-hover">
            <caption>List of outputs</caption>
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
                @forelse ($outputs as $output)
                    <tr class="table-dark">
                        <th scope="row">{{ $output->id }}</th>
                        <td>{{ $output->quantity }}</td>
                        <td>{{ $output->price }}</td>
                        @forelse ($products as $product)
                            @if ($product->id === $output->product_id)
                                <td>{{ $product->description }}</td>
                            @endif
                        @empty
                        @endforelse
                        <td>{{ $output->created_at }}</td>
                        <td>
                            <form action="{{ route('output_delete', ['output' => $output->id]) }}" method="POST">
                                <a href="{{ route('output_edit', ['output' => $output->id]) }}">
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
                            <li> !!! NO OUTPUT RECORDED IN THE DATABASE !!!</li>
                        </ul>
                    </div>
                @endforelse
            </tbody>
        </table>
    </fieldset>
@endsection
