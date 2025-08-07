@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Staff Laundry</h2>
    <a href="{{ route('staff.create') }}" class="btn btn-primary">Tambah Staff</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>ID Laundry</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Level</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($staffs as $staff)
        <tr>
            <td>{{ $staff->id }}</td>
            <td>{{ $staff->nama }}</td>
            <td>{{ $staff->id_laundry }}</td>
            <td>{{ $staff->email }}</td>
            <td>{{ $staff->no_hp }}</td>
            <td>{{ $staff->level }}</td>
            <td>{{ $staff->alamat }}</td>
            <td>
                <a href="{{ route('staff.edit', $staff) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('staff.destroy', $staff) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data staff.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection