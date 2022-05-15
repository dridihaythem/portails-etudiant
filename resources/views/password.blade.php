@extends('layouts.app')
@section('title','Statistiques')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-key"></i> Modifier le mot de passe
        </h3>
    </div>

    <div class="card-body">
        <section class="content">
            <div class="container-fluid">
                @include('partials.alert')


                <form method="post" action="{{ route('password.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mot De Passe Actuel :</label>
                        <input type="password" name="current_password""
                            class=" form-control @error('current_password') is-invalid @enderror"
                            placeholder="*********">
                        @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Le nouveau Mot de Passe :</label>
                        <input type="password" name="password""
                            class=" form-control @error('password') is-invalid @enderror" placeholder="*********">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirmer Le Mot De Passe :</label>
                        <input type="password" name="password_confirmation""
                            class=" form-control" placeholder="*********">
                    </div>

                    <button class="btn btn-success">Modifier</button>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection