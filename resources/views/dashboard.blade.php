@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-semibold mb-1">Selamat Datang di Admin Laundry</h4>
                <div class="text-muted" style="font-size: 1rem;">
                    Halo, {{ Auth::user()->nama ?? 'Admin' }}.
                </div>
            </div>
            <form action="{{ route('logout') }}" method="GET" class="mb-0">
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <a href="{{ route('staff.index') }}" class="btn btn-outline-primary w-100 py-2" style="font-size: 1.1rem;">
                            Kelola Staff Laundry
                        </a>
                        {{-- Tambahkan menu lain di sini jika perlu --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection