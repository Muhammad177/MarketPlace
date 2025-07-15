@extends('admin.dashboard.main')

@section('container')

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $shop->image }}" class="img-fluid rounded-start" alt="{{ $shop->name }}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $shop->name }}</h5>
                <p class="card-text">
                    {{ $shop->deskripsi_barang ?? 'Deskripsi tidak tersedia.' }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
