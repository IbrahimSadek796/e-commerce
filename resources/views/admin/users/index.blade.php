@extends('parts.app')

@section('title',  ' index User')

@section('content')
    <div class="page-content">
        <div>
            <a class="float-end btn btn-primary" href="{{ route('admin.users.create') }}">Add User</a>
            <h1 class="mt-3">Users</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show', $user['id']) }}">
                                Show
                            </a> |
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.users.edit', $user['id']) }}">
                                Edit
                            </a> |
                            <form class="d-inline" action="{{ route('admin.users.destroy', $user['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {!! $users->links('pagination::bootstrap-5') !!}
    </div>
@endsection
