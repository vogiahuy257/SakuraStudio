<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Logo -->
    <link rel="icon" href="{{ asset('/image/ICONlogo.svg') }}" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    @vite([
    'resources/css/login.css',
    'resources/js/login/script.js'
    ])

</head>

<body>
    <img src="{{ asset('/image/logo.svg') }}" alt="Logo" width="200" height="200">
    <div class="login-form text-center mb-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @include('Login.layout.lang')

        <h1 class="h4 mb-3 fw-normal" id="loginTitle">Đăng Nhập</h1>
        <form action="{{ route('login.submit') }}" method="POST" onsubmit="return validateForm()">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
                <label for="username" id="usernameLabel">Tên đăng nhập</label>
                <div id="usernameError" class="text-danger"></div>
            </div>
            <div class="form-floating mb-3 password-wrapper">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                <label for="password" id="passwordLabel">Mật khẩu</label>
                <i class="bi bi-eye-slash" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                <div id="passwordError" class="text-danger"></div>
            </div>
            @if ($errors->has('login'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('login') }}
                </div>
            @endif
            <button class="btn btn-lg btn-primary btn-block" type="submit" id="loginButton">Đăng nhập</button>
        </form>

        <div class="mt-3">
            <a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" id="forgotPasswordLink">quên mật khẩu ?</a>
        </div>
        <hr>
        <div class="boxCreateAcc">
            <!-- Cập nhật đường dẫn của nút tạo tài khoản -->
            <button class="btn btn-lg btn-secondary btn-block" type="button" onclick="location.href='{{ route('register.show') }}'" id="createAccountButton">Tạo tài khoản</button>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzLFz9eSxC7vvLHgAu7rw1M=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadLanguage('{{ session('locale', 'en') }}');
            attachBlurListeners();
        });

        function loadLanguage(lang) {
            fetch(`/js/lang/${lang}.json`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loginTitle').textContent = data.login;
                    document.getElementById('usernameLabel').textContent = data.username;
                    document.getElementById('passwordLabel').textContent = data.password;
                    document.getElementById('loginButton').textContent = data.login;
                    document.getElementById('forgotPasswordLink').textContent = data.forgot_password;
                    document.getElementById('createAccountButton').textContent = data.create_account;
                })
                .catch(error => console.error('Error loading language file:', error));
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }

        function attachBlurListeners() {
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');

            usernameInput.addEventListener('blur', function() {
                if (usernameInput.value.trim() === '') {
                    getErrorMessage('usernameError', 'usernameError');
                } else {
                    document.getElementById('usernameError').textContent = '';
                }
            });

            passwordInput.addEventListener('blur', function() {
                if (passwordInput.value.trim() === '') {
                    getErrorMessage('passwordError', 'passwordError');
                } else {
                    document.getElementById('passwordError').textContent = '';
                }
            });
        }

        function validateForm() {
            let valid = true;

            // Reset errors
            document.querySelectorAll('.text-danger').forEach(function(element) {
                element.textContent = '';
            });

            // Validate username
            if (document.getElementById('username').value.trim() === '') {
                valid = false;
                getErrorMessage('usernameError', 'usernameError');
            }

            // Validate password
            if (document.getElementById('password').value.trim() === '') {
                valid = false;
                getErrorMessage('passwordError', 'passwordError');
            }

            return valid;
        }

        function getErrorMessage(elementId, key) {
            // Determine the current language from session or a global variable
            let language = '{{ session('locale', 'en') }}'; // Assuming Laravel Blade syntax for session value

            fetch(`/js/lang/${language}.json`)
                .then(response => response.json())
                .then(data => {
                    if (key === 'usernameError') {
                        document.getElementById(elementId).textContent = data.usernameError;
                    } else if (key === 'passwordError') {
                        document.getElementById(elementId).textContent = data.passwordError;
                    }
                })
                .catch(error => console.error('Error loading language file:', error));
        }
    </script>
</body>

</html>
