@extends('layouts.index')

@section('title', '| Data User')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Data User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('formuser') }}" class="btn btn-primary mb-3">Tambah User</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th style="width: 115px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach ($user as $item)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <th>{{ $item->name }}</th>
                                        <th>{{ $item->email }}</th>
                                        <th>{{ $item->role }}</th>
                                        <th>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary" ><i class="nav-icon fas fa-pen"></i></a>
                                            <a href="{{ route('user.hapus', $item->id) }}" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection