@extends('layouts.app')
@section('title','Ajouter un département')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter un département
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('department.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="Technologies de l'informatique">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection