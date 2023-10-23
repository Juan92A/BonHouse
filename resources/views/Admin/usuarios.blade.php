@extends('layouts.app')

@section('content')
<style>
    .vintage-text {
        background-color: #f5e8c0;
        font-family: 'Courier New', monospace;
        padding: 10px;
        border-radius: 5px;
        font-size: 24px;
        text-align: center;
    }

    .vintage-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Courier New', monospace;
    }

    .vintage-table th,
    .vintage-table td {
        border: 1px solid #964f19;
        padding: 8px;
        text-align: left;
    }

    .vintage-table thead {
        background-color: #f5e8c0;
    }

    .vintage-table th {
        background-color: #964f19;
        color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(even) {
        background-color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(odd) {
        background-color: #fff;
    }
</style>

<div class="container">
    <h1 class="mt-5 vintage-text" style="font-size: 50px">Usuarios</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless align-middle vintage-table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('user.updateRole', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @auth
                                @if (auth()->user()->name != $user->name)
                                    <select name="rol" class="form-select" onchange="this.form.submit()">
                                        <option value="{{ $user->rol }}">
                                            {{ $user->rol == 1 ? 'Administrador' : 'Usuario' }}
                                        </option>
                                        @if ($user->rol === 1)
                                        <option value="2" {{ $user->rol == 2 ? 'selected' : '' }}>Usuario</option>
                                        @else
                                        <option value="1" {{ $user->rol == 1 ? 'selected' : '' }}>Administrador</option>
                                        @endif
                                    </select>
                                @else
                                <small class="text-muted fs-5">Usuario actual</small>
                                @endif
                                @endauth
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
