@extends('layouts.app')
@section('title','Ajouter une Matier')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter une une Matier
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('matiers.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Matier</label>
                <input type="text" name="libelle" value="{{ old('name') }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="">
                <label>coefficient</label>
                <input type="number" name="coefficient" value="{{ old('name') }}"
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Specialites :</label>
                <select name="specialites_id" class="form-control">
                    @foreach ($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->name}}</option>
                    @endforeach
                </select>
                @error('specialite_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
</div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection