@extends('layouts.app')
@section('title','La liste des rapports')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-list"></i>
            La liste des rapports
        </h3>
    </div>

    <div class="card-body">

        <div class="alert alert-warning" role="alert">
            <i class="fa-solid fa-bell"></i>
            Les dépôts des rapports auront lieu entre le <strong> {{ $date_debut_depot_rapports }}</strong> et le
            <strong>{{ $date_fin_depot_rapports }}</strong>
        </div>

        @if($can_upload)
        <a href="{{ route('depot.rapports.create') }}" class="btn btn-primary bt-sm mb-2"><i
                class="fa-solid fa-plus"></i> Deposser votre rapport</a>
        @endif
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Ajouté le</th>
                    <th>?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{ $report->type }}</td>
                    <td>{{ $report->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('depot.rapports.show',$report->id)}}">
                            <i class="fa-solid fa-eye"></i>
                            Affichier
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection