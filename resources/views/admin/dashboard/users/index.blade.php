@extends('admin.dashboard.main')

@section('container')
<div class="container mt-4">
    <h1 class="mb-4">Daftar User</h1>

    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Dibuat</th>
                 <th scope="col" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $index => $u)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at->format('d M Y') }}</td>
                     <td>
          <a href="" class="btn btn-outline-info btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-eye"></i> View
          </a>
        </td>
        <td>
          <a href="" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
        </td>
        <td>
          <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="">
            <i class="bi bi-trash"></i> Delete
          </button>
        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
