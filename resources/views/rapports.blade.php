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

        @include('partials.alert')

        <div id="example1_wrapper" class="example1_wrapper"></div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom Etudiant</th>
                    <th>Type Sage</th>
                    <th>Creé le</th>
                    <th>?</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteItem(id){
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Supprimez',
            cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.getElementById(id);
                    form.submit();
                }
        })

    }
</script>
<script>
    $(function () {
        $("#datatable").DataTable({
            "language": {
                "url": "{{ asset('assets/datatable/fr.json') }}"
            },
            processing: true,
            serverSide: true,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            ajax: '{{ route("rapports") }}',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            order: [[ 0, 'desc' ]],
            columns: [
                { data: 'student.name', name: 'student.name', searchable: true, orderable: true},
                { data: 'type', name: 'type', searchable: true, orderable: true},
                { data: 'created_at', name: 'created_at', searchable: true, orderable: true},
                { data: 'actions', name: 'actions', searchable: false, orderable: true},
            ],
         })

    });
</script>
@endpush