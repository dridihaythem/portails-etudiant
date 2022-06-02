@extends('layouts.app')
@section('title','La liste des Matiers')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-list"></i>
            La liste des Matiers
        </h3>
    </div>

    <div class="card-body">

        @include('partials.alert')

        <div id="example1_wrapper" class="example1_wrapper"></div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matiers</th>
                    <th>Coefficient</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Matiers as $s)
             <tr>
            <td>{{$s->id}}</td>
            <td>{{$s->libelle}}</td>
            <td>{{$s->coefficient}}</td>
            <td>
                    <a class='btn btn-sm btn-success mr-1' href=" {{ route('matiers.edit', $s->id) }} ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>
                    <form action="{{ route('matiers.destroy', $s->id) }}  " method="POST">
                    @csrf
                    @method('DELETE')
                    <input name='_method' value='DELETE' type='hidden'>
                    <button class='btn btn-sm btn-danger'>
                        <i class='fa-solid fa-trash'></i> Supprimer
                    </button>
                   </form>
                             
            </td>   
            </tr>
            @endforeach 
        </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endpush

