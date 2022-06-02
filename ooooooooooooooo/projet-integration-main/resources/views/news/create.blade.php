@extends('layouts.app')
@section('title','Ajouter une Actualité')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet" />
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endpush
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-circle-plus"></i>
            Ajouter une Actualité
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('news.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Tiltre <span class="text-danger">*</span> :</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Contenu <span class="text-danger">*</span> :</label>
                <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="from-group mb-1">
                <input name="notification" type="checkbox" @checked(old('notification'))>
                Passer en urgence
            </div>

            <button class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
@endsection