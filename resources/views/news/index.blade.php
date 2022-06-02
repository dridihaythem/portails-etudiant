@extends('layouts.app')
@section('title','La liste des actualités')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-list"></i>
            La liste des actualités
        </h3>
    </div>

    <div class="card-body">

        @include('partials.alert')

        <div id="example1_wrapper" class="example1_wrapper"></div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>title</th>
                    <th>Publié le</th>
                    <th>Modifié le</th>
                    <th>?</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td>
                        <a class='btn btn-sm btn-success mr-1' href="{{ route('news.edit',$new)}}">
                            <i class='fa-solid fa-pen-to-square'></i>
                            Modifier
                        </a>

                        <form id="{{$new->id}}" class='d-inline-block'
                            onsubmit='event.preventDefault();deleteItem({{$new->id}})' method='post'
                            action="{{ route('news.destroy',$new) }}">
                            @method('DELETE')
                            @csrf
                            <button class='btn btn-sm btn-danger'>
                                <i class='fa-solid fa-trash'></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $news->links() }}
    </div>
</div>
@endsection

@push('js')
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
@endpush