<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/cabecera.png') }}" width="260" alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full img-fluid" src="{{ asset('img/cabecera.png') }}" width="350px" alt=""/>
        </a>
    </div>

    <ul class="sidebar-menu" id ="mySidebar">
        @include('layouts.menu')
    </ul>
</aside>
