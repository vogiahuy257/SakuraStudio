<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Logo -->
    <link rel="icon" href="{{ asset('/image/ICONlogo.svg') }}" type="image/x-icon">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    
    <!-- Custom CSS -->
    @vite([
    'resources/css/login.css',
    'resources/js/login/script.js'
    ])

</head>
<body>
    <img src="{{ asset('/image/logo.svg') }}" alt="Logo" width="200" height="200">
    <div class="login-form text-center mb-5">
        @include('Login.layout.lang')
        
        <h1 class="h4 mb-3 fw-normal" id="registerTitle">Đăng ký</h1>
        <form action="{{ route('register.submit') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usernameField" name="username" placeholder="Tên đăng nhập">
                <label for="usernameField" id="usernameLabel">Tên đăng nhập</label>
                <span id="usernameError" class="error-message"></span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nameField" name="name" placeholder="Tên người dùng">
                <label for="nameField" id="nameLabel">Tên người dùng</label>
                <span id="nameError" class="error-message"></span>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="emailField" name="email" placeholder="abc@gmail.com">
                <label for="emailField" id="emailLabel">Email</label>
                <span id="emailError" class="error-message"></span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="phoneField" name="phone" placeholder="Số điện thoại">
                <label for="phoneField" id="phoneLabel">Số điện thoại</label>
                <span id="phoneError" class="error-message"></span>
            </div>
            <div class="form-floating mb-3 password-wrapper">
                <input type="password" class="form-control" id="passwordField" name="password" placeholder="Mật khẩu">
                <label for="passwordField" id="passwordLabel">Mật khẩu</label>
                <i class="bi bi-eye-slash" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                <span id="passwordError" class="error-message"></span>
            </div>
            <div class="form-floating mb-3 password-wrapper">
                <input type="password" class="form-control" id="confirmPasswordField" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                <label for="confirmPasswordField" id="confirmPasswordLabel">Xác nhận mật khẩu</label>
                <i class="bi bi-eye-slash" id="toggleConfirmPassword" onclick="toggleConfirmPasswordVisibility()"></i>
                <span id="confirmPasswordError" class="error-message"></span>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" id="registerButton">Đăng ký</button>
        </form>
        
        <div class="mt-3">
            <a href="{{ route('login.show') }}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" id="loginLink">Bạn đã có tài khoản? Đăng nhập</a>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzLFz9eSxC7vvLHgAu7rw1M=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>

    <!-- Custom JS for toggling password visibility and form validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadLanguage('{{ session('locale', 'en') }}');
        });

        function loadLanguage(lang) {
            fetch(`/js/lang/${lang}.json`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('registerTitle').textContent = data.register;
                    document.getElementById('usernameLabel').textContent = data.username;
                    document.getElementById('nameLabel').textContent = data.usname;
                    document.getElementById('emailLabel').textContent = data.email;
                    document.getElementById('phoneLabel').textContent = data.numberphone;
                    document.getElementById('passwordLabel').textContent = data.password;
                    document.getElementById('confirmPasswordLabel').textContent = data.confirm_password;
                    document.getElementById('registerButton').textContent = data.register;
                    document.getElementById('loginLink').textContent = data.already_have_account;
                })
                .catch(error => console.error('Error loading language file:', error));
        }

        // Function to toggle password visibility
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('passwordField');
            var toggleIcon = document.getElementById('togglePassword');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }

        // Function to toggle confirm password visibility
        function toggleConfirmPasswordVisibility() {
            var passwordField = document.getElementById('confirmPasswordField');
            var toggleIcon = document.getElementById('toggleConfirmPassword');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }

        // Function to validate form before submission
        function validateForm() {
            let valid = true;

            // Reset errors
            document.querySelectorAll('.error-message').forEach(function(element) {
                element.textContent = '';
            });

            // Validate each input field
            if (document.getElementById('usernameField').value.trim() === '') {
                valid = false;
                document.getElementById('usernameError').textContent = getErrorMessage();
            }
            if (document.getElementById('nameField').value.trim() === '') {
                valid = false;
                document.getElementById('nameError').textContent = getErrorMessage();
            }
            if (document.getElementById('emailField').value.trim() === '') {
                valid = false;
                document.getElementById('emailError').textContent = getErrorMessage();
            }
            if (document.getElementById('phoneField').value.trim() === '') {
                valid = false;
                document.getElementById('phoneError').textContent = getErrorMessage();
            }
            if (document.getElementById('passwordField').value.trim() === '') {
                valid = false;
                document.getElementById('passwordError').textContent = getErrorMessage();
            }
            if (document.getElementById('confirmPasswordField').value.trim() === '') {
                valid = false;
                document.getElementById('confirmPasswordError').textContent = getErrorMessage();
            }

            return valid;
        }

        // Function to get error message based on language
        function getErrorMessage() {
            // Determine the current language from session or a global variable
            let language = '{{ session('locale', 'en') }}'; // Assuming Laravel Blade syntax for session value

            if (language === 'en') {
                return 'This field is required.';
            } else if (language === 'vi') {
                return 'Trường này là bắt buộc.';
            }
            return 'This field is required.';
        }
    </script>
</body>
</html>
