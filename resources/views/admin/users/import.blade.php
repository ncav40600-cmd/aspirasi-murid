@extends('layouts.admin-dashboard')

@section('title', 'Import User CSV | Admin')

@section('content')
<div class="card p-4">
    <h2>Import User (CSV)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="alert alert-info">
        Format CSV: username, nis, email, role, kelas, password. Baris pertama harus header.
    </div>

    <form method="POST" action="{{ route('admin.users.import') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>File CSV</label>
            <input type="file" name="csv_file" class="form-control" accept=".csv" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload & Import</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
