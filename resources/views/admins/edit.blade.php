@extends('layouts.app')
@section('title','Modifier un admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier un admin
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('admins.update',$admin) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Cin</label>
                <input type="number" disabled name="cin" value="{{ $admin->cin }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="11400400">
                @error('cin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nom <span class="text-danger">*</span> :</label>
                <input type="text" name="first_name" value="{{ $admin->first_name }}"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Dridi">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom <span class="text-danger">*</span> :</label>
                <input type="text" name="last_name" value="{{ $admin->last_name }}"
                    class="form-control @error('last_name') is-invalid @enderror" placeholder="Haythem">
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Image :</label>
                <input type="file" name="photo" class=" form-control @error('photo') is-invalid @enderror">
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Numéro de téléphone :</label>
                <input type="text" name="phone" value="{{ $admin->phone }}"
                    class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection