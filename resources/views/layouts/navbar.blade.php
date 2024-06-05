<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">@yield('page-title', '')</a>
    </li>
    </ul>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SOCIETE FILANY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
        <div class="info">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </div>
    </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Tableau de Bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                ADMINISTRATION
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('utilisateurs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('typeContrats.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type contrats</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('societes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des sociétés</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    GESTION RH
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('employes.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion Employés</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('paies.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion de la paie</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contrat.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion des contrats</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('heures_supplementaires.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion Heures  Sup.</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bons_pharmacie.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion des bons</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('heures-travail.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Suivi heures de travail</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion du recrutement</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('alertes.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion des Alertes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('conges.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion des Congés</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('conge-calendar') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Calendier Congés</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('evaluations.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Evaluation des employer</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('formations.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion Formation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sanctions.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion des Sanctions</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    GESTION G - HALIMA
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('recrutement.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Gestion Recrutement</p>
                    </a>
                </li>
                </ul>
            </li>
        </ul>
      </nav>
    </div>
</aside>
