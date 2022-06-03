@extends('layouts.app')
@section('title','Les matieres')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($matieres as $matiere)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $matiere->libelle}}</h5>
                    <hr>
                    <a href="{{ route('meet.matieres.show',$matiere->id) }}" class="btn btn-primary d-block">
                        <i class="fa-solid fa-video"></i>
                        Cour en ligne
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection