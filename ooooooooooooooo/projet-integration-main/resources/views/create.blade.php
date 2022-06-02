@extends('layouts.app')
@section('title','Ajouter un etudiant')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
    rel="stylesheet" />
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>
@endpush
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter un enseignant
        </h3>
    </div>

    <div class="card-body">
        <form action="/enseignants_verified" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nom <span class="text-danger">*</span> :</label>
                <input type="text" name="nom" value="{{ old('nom') }}"
                    class="form-control @error('nom') is-invalid @enderror" placeholder="nom..">
                @error('nom')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom <span class="text-danger">*</span> :</label>
                <input type="text" name="prenom" value="{{ old('prenom') }}"
                    class="form-control @error('prenom') is-invalid @enderror" placeholder="prenom">
                @error('prenom')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>email <span class="text-danger">*</span> :</label>
                <input type="text" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>cin <span class="text-danger">*</span> :</label>
                <input type="string" name="cin" value="{{ old('cin') }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="12345678">
                @error('cin')
                <div class="text-danger"><p>le cin doit etre contient 8 nombres</p></div>
                @enderror
            </div>

            <div class="form-group">
                <label>password <span class="text-danger">*</span> :</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror" placeholder="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>photo :</label>
                <input type="file" name="photo" value="{{ old('photo') }}"
                    class="form-control @error('photo') is-invalid @enderror" placeholder="photo">
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Department :</label>
                <select name="dep">
                    @foreach($departments as $temp)
                    <option value="{{$temp -> id}}">{{$temp -> name}}</option>
                    @endforeach
                </select>
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label> chef departement<span class="text-danger">*</span> :</label>
                <select class="form-control select2" name="chef">
                    <option value="true">
                        Oui
                    </option>
                    <option value="false">
                       Non
                    </option>
                </select>
                @error('chef')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection