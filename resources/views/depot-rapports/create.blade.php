@extends('layouts.app')
@section('title','Depot du rapport de stage')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Depot du rapport de stage
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('depot.rapports.store') }}" method="post" enctype="multipart/form-data">
            @csrf



            <div class="form-group">
                <label>Type <span class="text-danger">*</span> :</label>
                <select name="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="initiation">Initiation</option>
                    <option value="perfectionnement">Perfectionnement</option>
                </select>
                @error('type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Le Rapport (Fichier PDF) <span class="text-danger">*</span> :</label>
                <input type="file" accept="application/pdf" name="file"
                    class=" form-control @error('file') is-invalid @enderror">
                @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection