@extends('layouts.app')
@section('title','Ajouter un département')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter une matiere
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('matieres.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Libelle :</label>
                <input type="text" name="libelle" value="{{ old('libelle') }}"
                    class="form-control @error('libelle') is-invalid @enderror" placeholder="Atelier programmation">
                @error('libelle')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Coefficient : </label>
                <input type="text" name="coefficient" value="{{ old('coefficient') }}"
                    class="form-control @error('coefficient') is-invalid @enderror" placeholder="1">
                @error('coefficient')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Specialité : </label>
                <select name="specialite_id" class="form-control">
                    @foreach ($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection