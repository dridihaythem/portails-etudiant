@extends('layouts.app')
@section('title','Ajouter une specialité')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter une specialité
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('specialite.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Department :</label>
                <select name="department_id" class="form-control">
                    @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->name}}</option>
                    @endforeach
                </select>
                @error('department_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Nom de la specialité :</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Développement des systèmes d’information">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prefix de la specialité :</label>
                <input type="text" name="prefix" value="{{ old('prefix') }}"
                    class="form-control @error('title') is-invalid @enderror" placeholder="DSI">
                @error('prefix')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection