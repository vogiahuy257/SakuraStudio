<section id="menu">
    <nav class="navbar">
        <div class="container-fluid custom_menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Logo -->
            <div class="logo">
                <img src="{{asset('image/logo.svg')}}" alt="Logo" width="100" height="100">
            </div>

            <!-- Search (commented out) -->
            {{-- <div class="container1 mt-4">
                <form class="position-relative d-flex align-items-center" role="search">
                    <input class="form-control me-2 custom_seard" id="searchInputText" type="search" placeholder="Search ..." aria-label="Search">
                    <ion-icon class="ion-search" name="search-outline"></ion-icon> <!-- Search icon -->
                </form>
            </div> --}}

            <!-- Notification (commented out) -->
            {{-- <div class="notification">
                <div class="icon"><ion-icon name="notifications-outline"></ion-icon></div>
                <div class="info">Notifications!</div>
            </div> --}}

            @if(session('login') == 'true')
                <!-- Create Design -->
                <div class="custom-btn">
                    <a href="{{route('canvaspro.show')}}"><button id="createDesignText">Create Design</button></a> <!-- Updated route name -->
                </div>
                
                <style>
                    #menu .custom_btn_logout {
                        padding: 5px;
                        padding-left: 10px;
                        padding-right: 10px;
                        margin-left: 15px;
                        border-radius: 10px;
                        background-color: #fff6e2;
                    }
                    #menu .custom_btn_logout:hover {
                        color: #ffffff;
                        background-color: #cf8422;
                    }
                    #menu .custom-btn button:hover {
                        background-color: #b4792d;
                    }
                </style>
                
                <!-- Settings -->
                <div class="setting">
                    <div class="icon2"><a href="{{route('user.setting.show')}}"><ion-icon name="settings-outline"></ion-icon></a></div> <!-- Updated route name -->
                    <div class="note" id="settingText">Settings</div>
                </div>
                
                <!-- User Info -->
                <div class="d-flex align-items-center p-3 bg-white admin-info shadow" style="border-radius: 15px;">
                    <img src="{{ asset('/image/logoDemotoAdmin.png') }}" alt="Admin Avatar" class="img-fluid rounded-circle me-2" width="50" height="50">
                    <div>
                        <h6 class="mb-0">{{ session('name') }}</h6>
                        <span id="menuRoleText" class="text-muted">@User</span>
                    </div>
                    <a href="{{ route('login.show') }}" class="custom_btn_logout shadow round d-flex align-items-center"> <!-- Updated route name -->
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                </div>
            @else
                <style>
                    #menu a::after {
                        content: '';
                        position: absolute;
                        width: 0;
                        height: 2px;
                        display: block;
                        background: black;
                        transition: width 0.3s;
                        left: 0;
                        bottom: -5px;
                    }

                    #menu a:hover::after {
                        width: 100%;
                        transition: width 0.3s;
                    }
                    
                    #menu a:hover {
                        color: brown;
                    }
                </style>
                
                <!-- Settings -->
                <div class="setting">
                    <div class="icon2"><a href="{{ route('user.setting.show') }}"><ion-icon name="settings-outline"></ion-icon></a></div> <!-- Updated route name -->
                    <div class="note" id="settingText">Settings</div>
                </div>
                
                <!-- Login -->
                <div class="login">
                    <a href="{{ route('login.show') }}" id="logInText">Log In</a> <!-- Updated route name -->
                </div>
                
                <!-- Register -->
                <div class="register">
                    <a href="{{ route('register.show') }}" id="signUpText">Sign Up</a> <!-- Updated route name -->
                </div>
            @endif
        </div>

        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" class="textMenuNavbar">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-dark {{ Route::is('user.home') ? 'active' : '' }}" href="{{route('user.home')}}" id="homeText">Home</a></li> <!-- Updated route name -->

                    @if (session('login') == 'true')
                        <li class="nav-item"><a class="nav-link text-dark {{ Route::is('user.contact.show') ? 'active' : '' }}" href="{{route('user.contact.show')}}" id="contactText">Contact</a></li> <!-- Updated route name -->
                    @endif
                    
                    <li class="nav-item"><a class="nav-link text-dark {{ Route::is('user.design.show') ? 'active' : '' }}" href="{{route('user.design.show')}}" id="designsText">Designs</a></li> <!-- Updated route name -->
                </ul>
            </div>
        </div>    
    </nav>
</section>
