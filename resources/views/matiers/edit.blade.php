@extends('layouts.app')
@section('title','Modifier une Matier')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier une Matier
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('matiers.update',$Matier->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>libelle</label>
                <input type="text" name="libelle" value="{{ $Matier->libelle }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="">
                <label>coefficient</label>
                    <input type="text" name="prefix" value="{{ $Matier->coefficient }}"
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