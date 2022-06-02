@extends('layouts.app')
@section('title','Statistiques')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa-solid fa-chart-area"></i> Statistiques
        </h3>
    </div>

    <div class="card-body">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $departments_count }}</h3>
                                <p>Départements</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <a href="{{ route('department.index') }}" class="small-box-footer">Affichier <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $specialites_count }}</h3>
                                <p>Spécialité</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-copy"></i>
                            </div>
                            <a href="{{ route('specialite.index')}} " class="small-box-footer">Afficher <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$classes_count}}</h3>
                                <p>Classes</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <a href="{{ route('classe.index') }}" class="small-box-footer">Afficher <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $students_count }}</h3>
                                <p>Etudiants</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <a href="#" class="small-box-footer">Afficher <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
</div>
@endsection