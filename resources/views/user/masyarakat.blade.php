@extends('layouts.app')
@section('title' , 'Petugas')
@section('active_masyarakat','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-capitalize">profil</h5>
                </div>
                <form action="{{route('profil.update')}}" id="formupdate" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" min="0" name="nik" id="nik" class="form-control" value="{{$data->nik}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="{{$data->username}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                    <small>Abaikan Jika Tidak Ingin Mengganti Password</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">No Telepon</label>
                                    <input type="number" name="telp" id="telp" value="{{$data->telp}}" min="0" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <button class="btn btn-warning btn-sm" onclick="document.getElementById('formupdate').submit();">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
