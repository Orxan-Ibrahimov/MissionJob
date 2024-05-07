{{-- @includeIf('Components'.$user -> active_role.'-layout') --}}

@auth
<x-manager-layout>
    Halo!
</x-manager-layout>
@endauth
@section('profile')
<li class="nav-item dropdown">
    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
        <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="{{ URL::asset('layouts/manager/images/faces/face15.jpg') }}" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user() -> first_name . ' '. Auth::user() -> last_name}}</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
        <h6 class="p-3 mb-0">Profile</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-success"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <!-- <p class="preview-subject mb-1">Log out</p> -->
                <form method="post" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background-color: transparent; color:white; border:none;" class="preview-subject mb-1">Log out</button>
                </form>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <p class="p-3 mb-0 text-center">Advanced settings</p>
    </div>
</li>
@endsection