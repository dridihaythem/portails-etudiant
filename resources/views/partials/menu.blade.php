<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::guard('admins')->check())
                <img src="{{ asset(Auth::guard('admins')->user()->photo) }}" class="img-circle elevation-2"
                    style="width:50px;height:50px" />
                @elseif(Auth::guard('students')->check())
                <img src="{{ asset(Auth::guard('students')->user()->photo) }}" class="img-circle elevation-2"
                    style="width:50px;height:50px" />
                @elseif(Auth::guard('enseignants')->check())
                <img src="{{ asset(Auth::guard('enseignants')->user()->photo) }}" class="img-circle elevation-2"
                    style="width:50px;height:50px" />
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if(Auth::guard('admins')->check())
                    {{ Auth::guard('admins')->user()->first_name }} {{ Auth::guard('admins')->user()->last_name }}
                    <span class="d-block mt-1 badge badge-pill badge-primary">
                        <i class="fa-solid fa-user"></i>
                        Admin
                    </span>
                    @elseif(Auth::guard('students')->check())
                    {{ Auth::guard('students')->user()->first_name }} {{ Auth::guard('students')->user()->last_name }}
                    <span class="d-block mt-1 badge badge-pill badge-primary">
                        <i class="fa-solid fa-user"></i>
                        Etudiant
                    </span>
                    @elseif(Auth::guard('enseignants')->check())
                    {{ Auth::guard('enseignants')->user()->first_name }} {{
                    Auth::guard('enseignants')->user()->last_name }}
                    <span class="d-block mt-1 badge badge-pill badge-primary">
                        <i class="fa-solid fa-user"></i>
                        enseignants
                    </span>
                    @endif

                </a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @if(Auth::guard('admins')->check())
                <li class="nav-item">
                    <a href="{{ route('statistic')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-chart-area"></i>
                        <p>
                            Statistiques
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-building-columns"></i>
                        <p>
                            Les Départements
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des départements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('department.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter un département</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Les Specialités
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('specialite.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des Specialités</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('specialite.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter une specialité</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Les classes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('classe.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des Classes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('classe.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter un classe</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Les Etudiants
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des etudiants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter un etudiant</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Les Administrateurs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des administrateurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admins.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter un administrateurs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Les Matieres
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('matieres.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des matieres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('matieres.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter une matiere</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Les Enseignants
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('enseignants.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des enseignants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('enseignants.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter une enseignant</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>
                            Les Actualités
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des actualités</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('news.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Ajouter une actualité</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-gears"></i>
                        <p>
                            Les Parametres
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('settings.date-depots-rapports') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-calendar"></i>
                                <p> Date depots des rapports</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @endif

                @if(Auth::guard('students')->check())
                <li class="nav-item">
                    <a href="{{ route('meet.matieres.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-video"></i>
                        <p>
                            Les matieres
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-folder"></i>
                        <i class="fa-solid fa-folder-arrow-up"></i>
                        <p>
                            Les Rapports des stages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('depot.rapports.create') }}" class="nav-link">
                                <i class="fa fa-circle-plus nav-icon"></i>
                                <p>Dépôts D'un rapport</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('depot.rapports.index') }}" class="nav-link">
                                <i class="fas fa-solid fa-list nav-icon"></i>
                                <p>La liste des rapports</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('certificate-of-attendance.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file"></i>
                        <p>
                            Attestation de présence
                        </p>
                    </a>
                </li>
                @endif

                @if(Auth::guard('enseignants')->check())
                <li class="nav-item">
                    <a href="{{ route('rapports')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-folder"></i>
                        <p>
                            La liste des rapports
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('password.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-key"></i>
                        <p>
                            Modifier le mot de passe
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout')}}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="
                        nav-link">
                        <i class="nav-icon fa-solid fa-arrow-right-from-bracket"></i>
                        <p>
                            Se déconnecter
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

    </div>

</aside>