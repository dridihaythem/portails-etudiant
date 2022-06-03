@extends('layouts.guest')
@section('title',$news->title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> S'authentifier
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>CIN :</label>
                            <input class="form-control" name="cin" placeholder="11XXXXXX" required>
                        </div>
                        <div class="form-group">
                            <label>Mot De Passe :</label>
                            <input class="form-control" type="password" name="password" placeholder="********" required>
                        </div>
                        <button class="btn btn-secondary btn-block">Connecter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-3 shadow">
                <div class="card-header">
                    {{$news->title}}
                </div>
                <div class="card-body">
                    <small>
                        <i class="fa-solid fa-clock"></i> {{ $news->created_at }}
                    </small>
                    <hr>
                    <p class="card-text">{!! $news->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection