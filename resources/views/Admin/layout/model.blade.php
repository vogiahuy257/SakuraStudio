
{{-- model edit --}}
<section id="container_Edit" tabindex="-1">
        <div class="modal-content rounded p-3 custom_edit">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h5 class="modal-title mx-auto" id="editModal">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form update của model edit --}}
                <form id="editUserForm" action="{{ route('admin.user.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editUserId">
                    <div class="mb-3">
                        <label for="editusNameInput" id="editusNameInput" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="username" id="edit_usNameInput">
                    </div>
                    <div class="mb-3">
                        <label for="editNameInput" id="editNameInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="edit_NameInput">
                    </div>
                    <div class="mb-3 custom_InputPassword">
                        <label for="editPasswordInput" id="editPasswordLabel" class="form-label">New Password</label>
                        <i class="bi bi-eye-slash custom_iconPassword" id="edittogglePassword" onclick="togglePasswordVisibilitytoEdit()"></i>
                        <input type="password" class="form-control " name="password" id="editPasswordInput" placeholder="Leave blank if not changing">
                    </div>
                    <div class="mb-3">
                        <label for="editEmailInput" id="editEmailInput"  class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_EmailInput">
                    </div>
                    <div class="mb-3">
                        <label for="editPhoneInput" id="editPhoneInput"  class="form-label">phoneNumber</label>
                        <input type="phone" class="form-control" name="phone" id="edit_PhoneInput">
                    </div>
                    <div class="mb-3">
                        <label for="editRoleSelect" id="editRoleInput"  class="form-label">Role</label>
                        <select class="form-select" name="role" id="edit_RoleSelect">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button id="btnEditModel" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
</section>



{{-- model addUser --}}
<section id="container_addUser">
    <div class="modal-content rounded p-3 custom_edit">
        <div class="modal-header d-flex justify-content-between align-items-center">
            <h5 class="modal-title mx-auto" id="addModel">Add New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>                    
        <div class="modal-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="editName" class="form-label" id="txtAddusName" >User Name</label>
                    <input type="text" class="form-control" name="username" value="John Doe">
                </div>
                <div class="mb-3 custom_InputPassword">
                    <label for="addPasswordInput" class="form-label" id="txtAddPassword">Password</label>
                    <i class="bi bi-eye-slash custom_iconPassword" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                    <input type="password" class="form-control" name="password" id="addPasswordInput" placeholder="Leave blank if not changing">
                </div>                
                <div class="mb-3">
                    <label for="editName" class="form-label" id="txtAddName" >Name</label>
                    <input type="text" class="form-control" name="name" value="John Doe">
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label" id="txtAddEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="editEmail" value="john.doe@example.com">
                </div>
                <div class="mb-3">
                    <label for="editEmail" class="form-label" id="txtAddPhone">Phone</label>
                    <input type="phone" class="form-control" name="phone" id="editPhone" value="012345678">
                </div>
                <div class="mb-3">
                    <label for="editRole" class="form-label" id="txtAddRole">Role</label>
                    <select class="form-select" name="role" id="editRole">
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button id="btnAddModel" type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</section>