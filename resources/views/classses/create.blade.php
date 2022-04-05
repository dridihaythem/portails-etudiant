@extends('layouts.app')
@section('title','Ajouter un classe')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter un classe
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('classe.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Department</label>
                <select  select name="Department" class="form-control" id="pet-select">
                <option value="aa">Technologies de l'informatique</option>
                <option value="cat">Génie électrique</option>
                <option value="hamster">Génie de procédés</option>
                <option value="parrot">Sciences économiques et de gestion</option>
                </select>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Nom de la classe</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="10/11/12/13">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection