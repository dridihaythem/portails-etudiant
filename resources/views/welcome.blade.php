@extends('layouts.guest')
@section('title',"Portail Etudiant")
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
            <div class="bg-white p-2">
                <h3>Les actualités : </h3>
                <hr>
                @foreach ($news as $new)
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{$new->title}}</h5>
                        <hr>
                        <small>
                            <i class="fa-solid fa-clock"></i> {{ $new->created_at }}
                        </small>
                        <hr>
                        <p class="card-text">{!! Str::limit($new->content,200) !!}</p>
                        <a href="{{ route('guest.news',['id'=>$new->id]) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i> Affichier
                        </a>
                    </div>
                </div>
                @endforeach
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
@endsection