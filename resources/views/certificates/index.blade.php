@extends('layouts.app')
@section('title','La liste des attestation de présence')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-list"></i>
            La liste des attestation de présence
        </h3>
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('certificate-of-attendance.store')}}">
            @csrf
            <button class="btn btn-primary bt-sm mb-2"><i class="fa-solid fa-plus"></i> Demander une nouvelle
                attestation</button>
        </form>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Creé le</th>
                    <th>?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certificates as $certificate)
                <tr>
                    <td>{{ $certificate->id }}</td>
                    <td>{{ $certificate->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm"
                            href="{{ route('certificate-of-attendance.show',$certificate->key)}}">
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