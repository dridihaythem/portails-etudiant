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
                <label>Specialité :</label>
                <select select name="specialite_id" class="form-control">
                    @foreach ($specialites as $specialite)
                    <option value="{{$specialite->id}}">{{$specialite->name}} ({{$specialite->department->name}})
                    </option>
                    @endforeach
                </select>
                @error('specialite_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Niveau :</label>
                <input type="number" name="level" value="{{ old('level') }}"
                    class="form-control @error('level') is-invalid @enderror" placeholder="1ere / 2eme">
                @error('level')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Numero :</label>
                <input type="number" name="number" value="{{ old('number') }}"
                    class="form-control @error('number') is-invalid @enderror" placeholder="1/2/3">
                @error('number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection