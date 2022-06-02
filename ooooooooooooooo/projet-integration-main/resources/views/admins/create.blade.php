@extends('layouts.app')
@section('title','Ajouter un admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter un Admin
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Cin <span class="text-danger">*</span> :</label>
                <input type="number" name="cin" value="{{ old('cin') }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="11400400">
                @error('cin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nom <span class="text-danger">*</span> :</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Dridi">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom <span class="text-danger">*</span> :</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}"
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
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="29175235">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection