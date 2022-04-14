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
        <form action="{{ route('specialite.update',$specialites->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Department</label>
                <select  select name="department" class="form-control" id="pet-select">
                <option value="1">Technologies de l'informatique</option>
                <option value="2">Génie électrique</option>
                <option value="3">Génie de procédés</option>
                <option value="4">Sciences économiques et de gestion</option>
                </select>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" value="{{ $specialites->name }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="">
                <label>Prefix</label>
                    <input type="text" name="prefix" value="{{ $specialites->prefix }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="">
                    
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection