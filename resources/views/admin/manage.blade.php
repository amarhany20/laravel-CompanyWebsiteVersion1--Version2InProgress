@extends('admin.layout.adminapp')
@section('title', 'Projects Menu')
@section('content')
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <table class="table table-dark table-hover table-striped">
            <thead>
                <th class="align-middle text-center">ID</th>
                <th class="align-middle text-center">name</th>
                <th class="align-middle text-center">email</th>
                <th class="align-middle text-center">Activation</th>
                <th class="align-middle text-center">Activate</th>
                <th class="align-middle text-center">Delete</th>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    @if ($admin->id == Auth::User()->id || $admin->id == 1)
                        @continue
                    @endif
                    <tr>
                        <th class="align-middle text-center">{{ $admin->id }}</th>
                        <td class="align-middle text-center">{{ $admin->name }}</td>
                        <td class="align-middle text-center">{{ $admin->email }}</td>
                        <td class="align-middle text-center">
                            @if ($admin->isActivated == 1)
                                True
                            @else
                                false
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if ($admin->isActivated == 0)
                                <form method="POST" action="{{ url('/admin/manage/activate/' . $admin->id) }}">
                                    @method('patch')
                                    @csrf
                                    <input style="width: 100px;" class="btn btn-primary" type="submit" value="Activate">
                                </form>
                            @else
                                <form method="POST" action="{{ url('/admin/manage/activate/' . $admin->id) }}">
                                    @method('patch')
                                    @csrf
                                    <input style="width: 100px;" class="btn btn-primary" type="submit" value="Deactivate">
                                </form>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <form action="{{ url('/admin/manage/delete/' . $admin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete"
                                    onclick="return confirm('Are you sure you want to delete {{ $admin->name }}? It will be unrecoverable')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
