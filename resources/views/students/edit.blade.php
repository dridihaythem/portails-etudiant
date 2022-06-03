@extends('layouts.app')
@section('title','Modifier un etudiant')
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
            <i class="fa-solid fa-pen-to-square"></i>
            Modifier un etudiant
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.update',$student) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group">
                <label>Classe <span class="text-danger">*</span> :</label>
                <select class="form-control select2" name="classe_id">
                    @foreach ($classes as $classe)
                    <option @selected($student->classe_id == $classe->id) value="{{$classe->id}}">
                        {{ $classe->name }}
                    </option>
                    @endforeach
                </select>
                @error('classe_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Cin</label>
                <input type="number" disabled name="cin" value="{{ $student->cin }}"
                    class="form-control @error('cin') is-invalid @enderror" placeholder="11400400">
                @error('cin')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nom <span class="text-danger">*</span> :</label>
                <input type="text" name="first_name" value="{{ $student->first_name }}"
                    class="form-control @error('first_name') is-invalid @enderror" placeholder="Dridi">
                @error('first_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Prenom <span class="text-danger">*</span> :</label>
                <input type="text" name="last_name" value="{{ $student->last_name }}"
                    class="form-control @error('last_name') is-invalid @enderror" placeholder="Haythem">
                @error('last_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Image :</label>
                <input type="file" name="photo" class=" form-control @error('photo') is-invalid @enderror">
                @error('photo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Date Naissance <span class="text-danger">*</span> :</label>
                <input type="date" name="birthday" value="{{ $student->birthday->format('Y-m-d') }}"
                    class="form-control @error('birthday') is-invalid @enderror">
                @error('birthday')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Adresse <span class="text-danger">*</span> :</label>
                <input type="text" name="address" value="{{ $student->address }}"
                    class="form-control @error('address') is-invalid @enderror"
                    placeholder="Manzel AbedRahmen , Bizerte">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Numéro de téléphone :</label>
                <input type="text" name="phone" value="{{ $student->phone }}"
                    class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Modifier</button>
        </form>
    </div>
</div>
@endsection