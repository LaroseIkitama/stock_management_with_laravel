@extends('layouts.app')
@section('content')
    <h1>List User</h1>
    <table class="table table-hover">
        <caption>List of Users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">FIRST NAME</th>
                <th scope="col">MAIL</th>
                <th scope="col">ROLES</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="table-dark">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            @switch($role->name)
                                @case('ADMIN')
                                    <p class="badge rounded-pill bg-success"> {{ $role->name }}</p>
                                @break

                                @case('SUPPLIER')
                                    <p class="badge rounded-pill bg-info"> {{ $role->name }}</p>
                                @break

                                @case('SELLER')
                                    <p class="badge rounded-pill bg-light"> {{ $role->name }}</p>
                                @break
                            @endswitch
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('user_delete', ['user' => $user->id]) }}" method="POST">
                            <a href="{{ route('user_edit', ['user' => $user->id]) }}">
                                <button type="button" class="btn btn-outline-warning">Modify</button>
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
                            <li> !!! NO USER RECORDED IN THE DATABASE !!!</li>
                        </ul>
                    </div>
                @endforelse

            </tbody>
        </table>
    @endsection
