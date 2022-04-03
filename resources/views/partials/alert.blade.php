@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    <i class="fa-solid fa-circle-check"></i>
    {{ Session::get('success') }}
</div>
@endif