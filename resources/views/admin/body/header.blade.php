@php
        $id = Auth::user()->id ?? 'none';
        $profileData = App\Models\User::find($id);
        $setting = App\Models\SiteSetting::find(1);

            @endphp
<div class="header">
    <div class="header-left">
        <a href="{{ url('admin/dashboard') }}" class="logo">
            {{-- <img src="{{ asset($setting->logo) }}" width="35" height="35" alt=""> <span> --}}
                {{-- <h6 class="text-truncate mt-2">{{ $setting->company_name }}</h6> --}}
            </span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item">
            <a target="_blank" href="" class="dropdown-toggle nav-link"><i class="fa fa-home"></i>
            </a>
        </li>
        <li class="nav-item dropdown has-arrow">

            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="
                    {{ (!empty(Auth::user()->profile_photo_path))?
                    url('upload/admin_images/'.Auth::user()->profile_photo_path):url('backend/img/user.jpg') }}" width="" alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>{{ Auth::user()->name ?? 'Administrateur' }}</span>
            </a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">Mon profil</a>
                <a class="dropdown-item" href="{{route('admin.change.password')}}">Modifier votre mot de passe</a>
                <a class="dropdown-item" href="settings.html">Parametre</a>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Se déconnecter</a>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.profile') }}">Mon profil</a>
            <a class="dropdown-item" href="{{ route('admin.profile') }}">Se déconnecter</a>
        </div>
    </div>
</div>
