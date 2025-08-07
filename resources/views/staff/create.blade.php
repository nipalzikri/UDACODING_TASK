@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h3 class="card-title mb-4">Tambah Staff Laundry</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('staff.store') }}">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label>ID Laundry</label>
                <input type="text" name="id_laundry" class="form-control" value="{{ old('id_laundry') }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
            </div>
            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select" required>
                    <option value="">--Pilih Level--</option>
                    <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Pengunjung" {{ old('level') == 'Pengunjung' ? 'selected' : '' }}>Pengunjung</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
        <a href="{{ route('staff.index') }}" class="btn btn-link mt-2">Kembali</a>
    </div>
</div>
@endsection