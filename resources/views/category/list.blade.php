@extends('layouts.app')
@section('navigation_bar')
    @include('layouts.navigation')
@endsection
@section('content')
    <fieldset>
        <legend>List of categories</legend>
        <table class="table table-hover">
            <caption>List of categories</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="table-dark">
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('category_delete', ['category' => $category->id]) }}" method="POST">
                                <a href="{{ route('category_edit', ['category' => $category->id]) }}">
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
                            <li> !!! NO CATEGORY RECORDED IN THE DATABASE !!!</li>
                        </ul>
                    </div>
                @endforelse
            </tbody>
        </table>
    </fieldset>
@endsection
