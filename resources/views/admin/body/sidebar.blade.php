@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    //dd($route)
@endphp
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <!-- Employees -->
            <ul>
                <li class="menu-title">General</li>
                <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Tableau de
                            bord</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Systemes </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('all.admin')}}">Ajouter des utilisateurs</a></li>
                        <li><a href="{{route('all.permission')}}">Toutes les permissions</a></li>
                        <li><a href="{{ route('all.roles') }}">Tous les roles</a></li>
                        <li><a href="{{ route('add.roles.permission') }}">Role dans la permissions</a></li>
                        <li><a href="{{ route('all.roles.permission') }}">Tous les roles dans la permissions</a></li>
                    </ul>
                </li>

                <li class="{{ $route == 'concours.candidats' ? 'active' : '' }}">
                    <a href="{{ url('concours/candidats') }}"><i class="fa fa-user"></i> <span>Liste des candidats</span></a>
                </li>


            <li class="menu">
                <a href="{{route('all.concours')}}"><i class="fa fa-money"></i> <span>  Gestion des Concours  </span></a>
            </li>
            <li class="menu">
                <a href="{{route('all.typeConcours')}}"><i class="fa fa-money"></i> <span>  Gestion des Types Concours  </span></a>
            </li>
            <li class="menu">
                <a href="{{route('all.qotas')}}"><i class="fa fa-money"></i> <span>  Gestion des Quotas  </span></a>
            </li>

            <li class="menu">
                <a href="{{route('sessions.all')}}"><i class="fa fa-money"></i> <span>  Gestion des Sessions  </span></a>
            </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span>  Gestion des notes </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="{{ route('epreuve.index') }}"
                                class="@if (request()->routeIs('epreuve*')) active @endif">Les
                                Epreuves</a>
                        </li>
                        <li>
                            <a href="{{ route('epreuve_concours.index') }}"
                                class="@if (request()->routeIs('epreuve_concours*')) active @endif">
                                Ajoueter des coefficient pour les epreuves</a>
                        </li>
                        <li>
                            <a href="{{ route('notes.index') }}"
                                class="@if (request()->routeIs('notes*')) active @endif">
                              Les notes des candidats</a>
                        </li>
                        <li>
                            <a href="{{ route('average.show') }}"
                                class="@if (request()->routeIs('notes*')) active @endif">
                              Les Moyennes des candidats</a>
                        </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
