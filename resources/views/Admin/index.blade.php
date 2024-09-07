<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Link Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">   

    {{-- Link logo icon --}}
    <link rel="icon" href="{{'/image/ICONlogo.svg'}}" type="image/x-icon">


    <!-- Link style.css -->
    @vite([
    'resources/css/Admin.css',
    'resources/js/Admin/Admin.js',
    'resources/js/Admin/Setting.js'
    ])

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left-side menu -->
            @include('Admin.layout.menu')
    
            <!-- Main table section in the middle -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @include('Admin.layout.dashboard')
                <!-- Add models -->
                @include('Admin.layout.model')
            </main>
            
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzLFz9eSxC7vvLHgAu7rw1M=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>

    <script>

        // Toggle password visibility for "edit" form
function togglePasswordVisibilitytoEdit() {
    const passwordInput = document.getElementById('editPasswordInput');
    const toggleIcon = document.getElementById('edittogglePassword');
    
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

// Toggle password visibility for "add" form
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('addPasswordInput');
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


        document.addEventListener('DOMContentLoaded', function() {
            loadLanguage('{{ session('locale', 'en') }}');
        });
        
    function loadLanguage(lang) {
        fetch(`/js/lang/${lang}.json`)
            .then(response => response.json())
            .then(data => {
                // Cập nhật các văn bản tương ứng
                document.getElementById('dashboardHeaderText').textContent = data.dashboard;
               document.getElementById('searchPlaceholderText').setAttribute('placeholder', data.search);
               document.getElementById('addUserBtnText').textContent = data.add_user;
               document.getElementById('nameLabelText').textContent = data.name;
               document.getElementById('emailLabelText').textContent = data.email;
               document.getElementById('roleLabelText').textContent = data.role;
               document.getElementById('dashboardText').textContent = data.dashboard;
               document.getElementById('phoneNumber').textContent = data.numberphone;
               document.getElementById('usnameLabelText').textContent = data.usname;
               document.getElementById('settingText').textContent = data.setting;
               

               document.getElementById('editModal').textContent = data.edit_user;
               document.getElementById('editusNameInput').textContent = data.usname;
               document.getElementById('editNameInput').textContent = data.name;
               document.getElementById('editEmailInput').textContent = data.email;
               document.getElementById('editRoleInput').textContent = data.role;
               document.getElementById('editPhoneInput').textContent = data.numberphone;
               document.getElementById('btnEditModel').textContent = data.save_changes;
               document.getElementById('editPasswordInput').setAttribute('placeholder', data.leave_blank);
               document.getElementById('editPasswordLabel').textContent = data.newPassword;

               document.getElementById('addModel').textContent = data.add_model;
               document.getElementById('txtAddusName').textContent = data.usname;
               document.getElementById('txtAddPassword').textContent = data.password;
               document.getElementById('addPasswordInput').setAttribute('placeholder', data.please_enter);
               document.getElementById('txtAddName').textContent = data.name;
               document.getElementById('txtAddEmail').textContent = data.email;
               document.getElementById('txtAddRole').textContent = data.role;
               document.getElementById('btnAddModel').textContent = data.save_changes;
               document.getElementById('txtAddPhone').textContent = data.numberphone;

                document.getElementById('createdDate').textContent = data.createddate;
                document.getElementById('actions').textContent = data.actions;
                var editButtons = document.querySelectorAll('.editButtons');
                editButtons.forEach(function(button) {
                    button.textContent = data.edit;
                });
    
                var deleteButtons = document.querySelectorAll('.deleteButton');
                deleteButtons.forEach(function(button) {
                    button.textContent = data.delete;
                });

                document.getElementById('roleTextAdmin').textContent = '@'+data.administrator;
            })
            .catch(error => console.error('Error loading language file:', error));
    }
    </script>
</body>
</html>
