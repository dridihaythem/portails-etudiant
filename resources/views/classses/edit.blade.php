@extends('layouts.app')
@section('title','Modifier un classe')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier un classe
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('classe.update',$classe) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" value="{{ $classe->name }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="Technologies de l'informatique">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection