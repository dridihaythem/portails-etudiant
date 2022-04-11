@extends('layouts.app')
@section('title','Modifier un etudiant')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier un etudiant
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.update',$student) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Cin :</label>
                <input type="text" name="cin" value="{{ $student->cin }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="11400400">
                @error('cin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="first_name" value="{{ $student->first_name }}"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Dridi">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom :</label>
                <input type="text" name="last_name" value="{{ $student->last_name }}"
                    class="form-control @error('last_name') is-invalid @enderror" placeholder="Haythem">
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection