@extends('layouts.app')
@section('title','Ajouter un etudiant')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter un etudiant
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Cin :</label>
                <input type="text" name="cin" value="{{ old('cin') }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="11400400">
                @error('cin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Dridi">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom :</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}"
                    class="form-control @error('last_name') is-invalid @enderror" placeholder="Haythem">
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection