@extends('layouts.admin-dashboard')

@section('title', 'Management User | Admin')

@section('content')
<div class="card p-4">
    <h2 class="mb-3">Manajemen User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex gap-2">
            <input type="search" name="search" value="{{ $search ?? '' }}" placeholder="Cari username / nis / email" class="form-control" />
            <button class="btn btn-primary">Cari</button>
        </form>
        <div>
            <a href="{{ route('admin.users.import.form') }}" class="btn btn-warning">Import CSV</a>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Tambah User</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Role</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nis }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->kelas ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline;" onsubmit="return confirm('Yakin hapus user ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <form method="POST" action="{{ route('admin.users.reset_password', $user->id) }}" style="display:inline; margin-left:4px;" onsubmit="return confirm('Reset password user ini?');">
                        @csrf
                        <button class="btn btn-sm btn-info">Reset Password</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->withQueryString()->links() }}
</div>
@endsection
