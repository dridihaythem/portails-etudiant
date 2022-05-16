@extends('layouts.app')
@section('title','Date depots des rapports')

@push('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
            $("#date_debut_depot_rapports , #date_fin_depot_rapports").datepicker({
                todayBtn: "linked",
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                orientation: "bottom left",
                // dateFormat: 'mm-dd-yy'
            }); 
    });
</script>
@endpush


@section('content') <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-calendar"></i> Date depots des rapports
        </h3>
    </div>

    <div class="card-body">
        <form method="post">
            @csrf
            @include('partials.alert')
            <div class="form-group mb-3">
                <label class="font-normal">Date Début : </label>
                <div class="input-group">
                    <input id="date_debut_depot_rapports" data-date-format="dd-mm-yyyy"
                        value="{{ $date_debut_depot_rapports }}" name="date_debut_depot_rapports" autocomplete="off"
                        type="text" class="form-control  @error('date_debut_depot_rapports') is-invalid @enderror">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-calendar"></i>
                        </span>
                    </div>
                </div>
                @error('date_debut_depot_rapports')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="font-normal">Date Fin :</label>
                <div class="input-group">
                    <input id="date_fin_depot_rapports" data-date-format="dd-mm-yyyy"
                        value="{{ $date_fin_depot_rapports }}" name="date_fin_depot_rapports" autocomplete="off"
                        type="text" class="form-control  @error('date_fin_depot_rapports') is-invalid @enderror">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa-solid fa-calendar"></i>
                        </span>
                    </div>
                </div>
                @error('date_fin_depot_rapports')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{--

            <div class="form-group">
                <label>Le Rapport (Fichier PDF) <span class="text-danger">*</span> :</label>
                <input type="file" accept="application/pdf" name="file"
                    class=" form-control @error('file') is-invalid @enderror">
                @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <button class="btn btn-success">Enregister</button>
        </form>
    </div>
</div>
@endsection