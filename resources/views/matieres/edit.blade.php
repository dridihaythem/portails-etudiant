@extends('layouts.app')
@section('title','modifier un département')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier une matiere
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('matieres.update',$matiere->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Libelle :</label>
                <input type="text" name="libelle" value="{{ $matiere->libelle }}"
                    class="form-control @error('libelle') is-invalid @enderror" placeholder="Atelier programmation">
                @error('libelle')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Coefficient : </label>
                <input type="text" name="coefficient" value="{{ $matiere->coefficient }}"
                    class="form-control @error('coefficient') is-invalid @enderror" placeholder="1">
                @error('coefficient')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Specialité : </label>
                <select name="specialite_id" class="form-control">
                    @foreach ($specialites as $specialite)
                    <option @selected($matiere->specialite_id == $specialite->id) value="{{ $specialite->id }}">{{
                        $specialite->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection