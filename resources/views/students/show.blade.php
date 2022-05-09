@extends('layouts.app')
@section('title','Modifier un etudiant')
@push('css')
<style>
    th {
        width: 250px;
    }
</style>
@endpush
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class='fa-solid fa-eye'></i>
            Détails de l'étudiant
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered mb-3">
            <tbody>
                <tr>
                    <th>Numéro Inscritption : </th>
                    <td>{{ $student->id }}</td>
                </tr>
                <tr>
                    <th>CIN : </th>
                    <td>{{ $student->cin }}</td>
                </tr>
                <tr>
                    <th>Classe : </th>
                    <td><span class="badge badge-primary">{{ $student->classe->name }}</span></td>
                </tr>
                <tr>
                    <th>Nom : </th>
                    <td>{{ $student->first_name }}</td>
                </tr>
                <tr>
                    <th>Prénom : </th>
                    <td>{{ $student->last_name }}</td>
                </tr>
                <tr>
                    <th>Date de naissance : </th>
                    <td>{{ $student->birthday }}</td>
                </tr>
                <tr>
                    <th>Addresse : </th>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <th>Num téléphone : </th>
                    <td>{{ $student->phone }}</td>
                </tr>
                <tr>
                    <th>Photo : </th>
                    <td>
                        <img src="{{ $student->photo }}" class="rounded-pill" width="150px" height="150px">
                    </td>
                </tr>
                <tr>
                    <th>Date création : </th>
                    <td>{{ $student->created_at }}</td>
                </tr>
                <tr>
                    <th>Date de dernière mise à jour : </th>
                    <td>{{ $student->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <a class='btn btn-sm btn-secondary mr-1' href="{{route('students.index')}}">
            <i class="fa-solid fa-rotate-left"></i>
            Retour à la liste des etudiants
        </a>

        <a class='btn btn-sm btn-success mr-1' href="{{route('students.edit', $student->id)}}">
            <i class='fa-solid fa-pen-to-square'></i>
            Modifier
        </a>

        <form class='d-inline-block' method='post' action="{{route('students.destroy', $student->id)}}">
            <input name='_method' value='DELETE' type='hidden'>
            <button class='btn btn-sm btn-danger'>
                <i class='fa-solid fa-trash'></i> Supprimer
            </button>
        </form>

    </div>
</div>
@endsection