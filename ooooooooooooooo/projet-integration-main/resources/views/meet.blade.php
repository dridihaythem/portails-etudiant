@extends('layouts.app')
@section('title','Cours en ligne')
@section('content')
@push('js')
<script src='https://meet.jit.si/external_api.js'></script>
<script>
    const domain = 'meet.jit.si/isetbz';
const options = {
    roomName: 'Projet Integration',
    width: '100%',
    height: 700,
    parentNode: document.querySelector('#meet'),
    userInfo : {
        email : 'haithemdridiweb@gmail.com',
        'displayName' : 'Haythem'
    }
};
const api = new JitsiMeetExternalAPI(domain, options);
</script>

@endpush
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-video"></i> Cours en ligne
        </h3>
    </div>

    <div class="card-body">
        <section class="content">
            <div id="meet"></div>
        </section>
    </div>
</div>
@endsection