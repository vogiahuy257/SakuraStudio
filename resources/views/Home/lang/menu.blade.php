                    document.getElementById('settingText').textContent = data.setting;
                    document.getElementById('homeText').textContent = data.home;
                    @if(session('login') == 'true')
                    document.getElementById('contactText').textContent = data.contact;
                    document.getElementById('createDesignText').textContent = data.create_design;
                    document.getElementById('menuRoleText').textContent = '@'+data.user;
                    @else
                    document.getElementById('logInText').textContent = data.log_in;
                    document.getElementById('signUpText').textContent = data.sign_up;
                    @endif
                    document.getElementById('designsText').textContent = data.designs;
                    {{-- document.getElementById('downloadAppText').textContent = data.download_app; --}}
                    document.getElementById('offcanvasNavbarLabel').textContent = data.menu;
                    {{-- document.getElementById('searchInputText').placeholder = data.search_placeholder; --}}