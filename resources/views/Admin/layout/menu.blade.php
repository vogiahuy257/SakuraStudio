<!-- menu.blade.php -->
<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex align-items-center p-3 mb-3 bg-white shadow-sm admin-info">
        <img src="{{asset('/image/logoDemotoAdmin.png')}}" alt="Admin Avatar" class="img-fluid rounded-circle me-2" width="50" height="50">
        <div>
            <h6 class="mb-0">{{ session('name') }}</h6>
            <span class="text-muted" id="roleTextAdmin">@Administrator</span>
        </div>
        <a href="{{route('login.show')}}" class="custom_btn_register btn btn-outline-dark btn-sm d-flex align-items-center">
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>

    <div class="position-sticky sidebar-sticky custom_menu">
        <ul class="nav flex-column">
            <li class="nav-item mt-3 fs-6">
                <a class="nav-link {{ Route::is('admin.show') ? 'active' : '' }}" aria-current="page" href="{{route('admin.show')}}">
                    <i class="bi bi-house-door"></i>
                    <span id="dashboardText">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3 fs-6">
                <a class="nav-link {{ Route::is('Admin') ? 'active' : '' }}"  aria-current="page" href="#">
                    <i class="bi bi-people"></i>
                    <span id="userText">User</span>
                </a>
            </li> --}}
            <li class="nav-item mt-3 fs-6">
                <a class="nav-link {{ Route::is('admin.setting.show') ? 'active' : '' }}" aria-current="page" href="{{route('admin.setting.show')}}">
                    <i class="bi bi-gear"></i>
                    <span id="settingText">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
