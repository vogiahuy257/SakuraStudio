<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" id="dashboardHeaderText">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="box_search">
            <form class="search-form" action="{{ route('admin.show') }}" method="GET">
                <div class="input-group input-group-sm">
                    <input id="searchPlaceholderText" name="search" type="text" class="form-control form-control-sm" placeholder="Search...">
                    <button class="btn btn-dark btn-sm" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="btn-group me-2">
            <button id="addUserBtnText" type="button" class="btn btn-sm btn-outline-secondary  addButton">Add User</button>
        </div>
    </div>
</div>


<section id="success">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{ session('success') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           {{ session('error') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const closeButtons = document.querySelectorAll('#success .btn-close');
    
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const alertBox = this.closest('.alert');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        });
    });
});

</script>



<div class="mt-2 rounded shadow p-2">
    <table class="table table-sm ">
        <thead class="custom-thead">
            <tr>
                <th>#id</th>
                <th id="usnameLabelText">User name</th> 
                <th id="nameLabelText">Name</th> 
                <th id="emailLabelText">Email</th>
                <th id="phoneNumber">Phone number</th>
                <th id="roleLabelText">Role</th>
                <th id="createdDate">Created Date</th>
                <th id="actions">Actions</th>
            </tr>
        </thead>
        <tbody class="custom-tbody">
            {{-- nếu không có người dùng nào thì thông báo --}}
            @if($users->isEmpty())
            <tr>
                <td colspan="8">No users found.</td>
            </tr>
            @else
            {{-- thông tin database --}}
            @foreach($users as $user)
            <tr class="align-middle">
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                    <button class="btn btn-sm btn-primary editButtons">Edit</button>
                    <form action="{{ route('admin.user.destroy',['id' => $user->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger deleteButton">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>  


