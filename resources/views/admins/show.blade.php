@extends('layouts.app')
@section('title','Affichier un admin')
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
            Détails de l'admin
        </h3>
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered mb-3">
            <tbody>
                <tr>
                    <th>CIN : </th>
                    <td>{{ $admin->cin }}</td>
                </tr>
                <tr>
                    <th>Nom : </th>
                    <td>{{ $admin->first_name }}</td>
                </tr>
                <tr>
                    <th>Prénom : </th>
                    <td>{{ $admin->last_name }}</td>
                </tr>
                <tr>
                    <th>Num téléphone : </th>
                    <td>{{ $admin->phone }}</td>
                </tr>
                <tr>
                    <th>Photo : </th>
                    <td>
                        <img src="{{ $admin->photo }}" class="rounded-pill" width="150px" height="150px">
                    </td>
                </tr>
                <tr>
                    <th>Date création : </th>
                    <td>{{ $admin->created_at }}</td>
                </tr>
                <tr>
                    <th>Date de dernière mise à jour : </th>
                    <td>{{ $admin->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <a class='btn btn-sm btn-secondary mr-1' href="{{route('admins.index')}}">
            <i class="fa-solid fa-rotate-left"></i>
            Retour à la liste des admins
        </a>

        <a class='btn btn-sm btn-success mr-1' href="{{route('admins.edit', $admin->id)}}">
            <i class='fa-solid fa-pen-to-square'></i>
            Modifier
        </a>

        <form class='d-inline-block' method='post' action="{{route('admins.destroy', $admin->id)}}">
            <input name='_method' value='DELETE' type='hidden'>
            <button class='btn btn-sm btn-danger'>
                <i class='fa-solid fa-trash'></i> Supprimer
            </button>
        </form>

    </div>
</div>
@endsection