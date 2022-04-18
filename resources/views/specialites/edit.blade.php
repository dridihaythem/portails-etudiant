@extends('layouts.app')
@section('title','Modifier une specialité')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier une specialité
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('specialite.update',$specialite->id) }}" method="post">
            @method('put')
            @csrf

            <div class="form-group">
                <label>Department :</label>
                <select name="department_id" class="form-control">
                    @foreach ($departements as $departement)
                    <option @checked($specialite->department_id == $departement->id) value="{{ $departement->id }}">
                        {{ $departement->name}}
                    </option>
                    @endforeach
                </select>
                @error('department_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Nom de la specialité :</label>
                <input type="text" name="name" value="{{ $specialite->name }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Développement des systèmes d’information">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prefix de la specialité :</label>
                <input type="text" name="prefix" value="{{ $specialite->prefix }}"
                    class="form-control @error('title') is-invalid @enderror" placeholder="DSI">
                @error('prefix')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection