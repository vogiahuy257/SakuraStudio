


// Lấy danh sách tất cả các nút "Edit" trong bảng
var editButtons = document.querySelectorAll('.editButtons');
var addButtons = document.querySelector('.addButton');
addButtons.addEventListener('click', function() {
    document.getElementById('container_addUser').style.display = 'flex';
});

// Lặp qua từng nút "Edit" và thêm sự kiện click
editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var row = this.closest('tr');
        var id = row.cells[0].innerText;
        var usname = row.cells[1].innerText
        var name = row.cells[2].innerText;
        var email = row.cells[3].innerText;
        var phone = row.cells[4].innerText;
        var role = row.cells[5].innerText;

        document.getElementById('editUserId').value = id;
        document.getElementById('edit_usNameInput').value = usname;
        document.getElementById('edit_NameInput').value = name;
        document.getElementById('edit_EmailInput').value = email;
        document.getElementById('edit_PhoneInput').value = phone;
        if(role == 'admin'){
            document.getElementById('edit_RoleSelect').value = 'admin';
        }
        else{
            document.getElementById('edit_RoleSelect').value = 'user';
        }

        document.getElementById('container_Edit').style.display = 'flex';
    });
});

var closeEdit = document.querySelector('#container_Edit .btn-close');
var closeAddUser = document.querySelector('#container_addUser .btn-close');

closeEdit.addEventListener('click', function() {
    document.getElementById('container_Edit').style.display = 'none';
});
closeAddUser.addEventListener('click', function() {
    document.getElementById('container_addUser').style.display = 'none';
});


//code sự kiện cho icon mật khẩu
function togglePasswordVisibility() {
    var passwordField = document.getElementById('addPasswordInput');
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

function togglePasswordVisibilitytoEdit() {
    var passwordField = document.getElementById('editPasswordInput');
    var toggleIcon = document.getElementById('tedittogglePassword');

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




// // Hàm lưu thông tin đã chỉnh sửa
// function saveChanges() {
//     var userId = document.getElementById('editUserId').value;
//     var userName = document.getElementById('editNameInput').value;
//     var userEmail = document.getElementById('editEmailInput').value;
//     var userPhone = document.getElementById('editPhoneInput').value;
//     var userRole = document.getElementById('editRoleSelect').value;

//     var data = {
//         id: userId,
//         name: userName,
//         email: userEmail,
//         phone: userPhone,
//         role: userRole,
//         _token: '{{ csrf_token() }}' // Laravel CSRF token
//     };

//     fetch('/update-user', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify(data),
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.success) {
//             location.reload(); // Reload the page to see the changes
//         } else {
//             alert('Failed to update user');
//         }
//     })
//     .catch((error) => {
//         console.error('Error:', error);
//     });
// }

// // Gắn sự kiện click vào nút "Save changes"
// document.getElementById('btnEditModel').addEventListener('click', saveChanges);






//-------------------------------------------------------------------------------------------------------------------------------------

// phần dịch trang theo ngôn ngữ
// loadLanguage('en');

// function loadLanguage(lang) {
//     fetch(`/js/lang/${lang}.json`)
//         .then(response => response.json())
//         .then(data => {
//             // Cập nhật các văn bản tương ứng
//             document.getElementById('dashboardHeaderText').textContent = data.dashboard;
//             document.getElementById('searchPlaceholderText').setAttribute('placeholder', data.search);
//             document.getElementById('addUserBtnText').textContent = data.add_user;
//             document.getElementById('nameLabelText').textContent = data.name;
//             document.getElementById('emailLabelText').textContent = data.email;
//             document.getElementById('roleLabelText').textContent = data.role;
//             document.getElementById('dashboardText').textContent = data.dashboard;
//             document.getElementById('userText').textContent = data.user;
//             document.getElementById('phoneNumber').textContent = data.numberphone;
//             document.getElementById('settingText').textContent = data.setting;

//             document.getElementById('editModal').textContent = data.edit_user;
//             document.getElementById('editName').textContent = data.name;
//             document.getElementById('editEmail').textContent = data.email;
//             document.getElementById('editRole').textContent = data.role;
//             document.getElementById('editPhoneInput').textContent = data.numberphone;
//             document.getElementById('btnEditModel').textContent = data.save_changes;

//             document.getElementById('addModel').textContent = data.add_model;
//             document.getElementById('txtAddName').textContent = data.name;
//             document.getElementById('txtAddEmail').textContent = data.email;
//             document.getElementById('txtAddRole').textContent = data.role;
//             document.getElementById('btnAddModel').textContent = data.save_changes;

//             document.getElementById('createdDate').textContent = data.createddate;
//             document.getElementById('actions').textContent = data.actions;
//             var editButtons = document.querySelectorAll('.editButtons');
//             editButtons.forEach(function(button) {
//                 button.textContent = data.edit;
//             });

//             var deleteButtons = document.querySelectorAll('.deleteButton');
//             deleteButtons.forEach(function(button) {
//                 button.textContent = data.delete;
//             });
//         })
//         .catch(error => console.error('Error loading language file:', error));
// }
