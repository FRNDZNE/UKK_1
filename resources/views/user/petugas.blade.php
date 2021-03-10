@extends('layouts.app')
@section('title' , 'Petugas')
@section('active_petugas','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-capitalize">data petugas</h5>
                </div>
                <div class="card-body">
                    {{-- modal create --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah">
                          Tambah Petugas
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title">Tambah Petugas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('petugas.store')}}" method="POST" role="form" id="formcreate">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input name="nik" type="number" min="0" class="form-control" id="nik" placeholder="NIK">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input name="name" type="text" class="form-control" id="nama" placeholder="Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                                <small>Minimal 6 Karakter</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">Nomor Telepon</label>
                                                <input name="telp" type="number" min="0" class="form-control" id="telp" placeholder="Nomor Telepon">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <a href="#" onclick="document.getElementById('formcreate').submit()">
                                            <button type="button" class="btn btn-primary">Simpan</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end modal --}}
                    <hr>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$d->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit-{{$d->id}}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldelete-{{$d->id}}">
                                        Hapus
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaldetail-{{$d->id}}">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="modaledit-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title">Edit Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('petugas.update')}}" method="POST" role="form" id="update-{{$d->id}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$d->id}}">
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input name="nik" type="number" min="0" class="form-control" id="nik" placeholder="NIK" value="{{$d->nik}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input name="name" type="text" class="form-control" id="nama" placeholder="Nama" value="{{$d->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{$d->username}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                                    <small>Abaikan Jika Tidak Ingin Mengubah</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp">Nomor Telepon</label>
                                                    <input name="telp" type="number" min="0" class="form-control" id="telp" placeholder="Nomor Telepon" value="{{$d->telp}}">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <a href="#" onclick="document.getElementById('update-{{$d->id}}').submit()">
                                                <button type="button" class="btn btn-warning">Update</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- modal Delete --}}
                            <div class="modal fade" id="modaldelete-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title">Hapus Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Hapus Petugas</h5>
                                            <p>{{$d->name}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{route('petugas.destroy',$d->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Detail --}}
                            <div class="modal fade" id="modaldetail-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title">Detail Petugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input disabled name="nik" type="number" min="0" class="form-control" id="nik" placeholder="NIK" value="{{$d->nik}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input disabled name="name" type="text" class="form-control" id="nama" placeholder="Nama" value="{{$d->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">Nomor Telepon</label>
                                                <input disabled name="telp" type="number" min="0" class="form-control" id="telp" placeholder="Nomor Telepon" value="{{$d->telp}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
