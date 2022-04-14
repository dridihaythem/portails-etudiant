@extends('layouts.app')
@section('title','La liste des Specialités')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-list"></i>
            La liste des Specialités
        </h3>
    </div>

    <div class="card-body">

        @include('partials.alert')

        <div id="example1_wrapper" class="example1_wrapper"></div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prefix</th>
                    <th>Creé le</th>
                    <th>Modiifé le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($specialites as $s)
             <tr>
            <td>{{$s->id}}</td>
            <td>{{$s->name}}</td>
            <td>{{$s->prefix}}</td>
            <td>{{$s->created_at}}</td>
            <td>{{$s->updated_at}}</td>
            <td>
                    <a class='btn btn-sm btn-success mr-1' href=" {{ route('specialite.edit', $s->id) }} ">
                        <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                    </a>
                    <form action="{{ route('specialite.destroy', $s->id) }}  " method="POST">
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

