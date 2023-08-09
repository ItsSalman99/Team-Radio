@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Support Users</h2>
            <ul>
                <li><a href="#" class=" btn btn-primary extra-btn-padding-25" data-bs-toggle="modal"
                        data-bs-target="#supportedUsersModal">Create New User</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>U_ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Timezone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td class="fw-500">#{{ $item->id }}</td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    {{-- <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=880&amp;q=80"
                                        alt="" style="width: 40px; height: 40px;" class=" rounded-circle shadow-sm"
                                        draggable="false" loading="lazy"> --}}
                                    <div class=" text-truncate ">
                                        {{ $item->first_name }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $item->first_name }}
                            </td>
                            <td>
                                {{ $item->username }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->country }}
                            </td>
                            <td>
                                {{ $item->timezone }}
                            </td>
                            <td>
                                @if($item->status == 1)
                                    <div class="active-status">
                                        <p>Active</p>
                                    </div>
                                @else
                                    <div class="deactive-status">
                                        <p>Blocked</p>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="dropdownStyle-v1 m-0">
                                    <li class="dropdown position-static">
                                        <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                            data-bs-toggle="dropdown" role="button" id="navbarDropdown"
                                            aria-expanded="false"><i
                                                class="bi bi-three-dots-vertical font-19px link-dark"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a href="#." onclick="getData({{ $item->id }})" class="dropdown-item"
                                                data-bs-toggle="modal" data-bs-target="#editsupportedUsersModal">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#." onclick="resetPassword({{ $item->id }})" class="dropdown-item"
                                                data-bs-toggle="modal" data-bs-target="#resetPasswordModal">
                                                    Reset Password
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('users.block', ['id' => $item->id]) }}" class="dropdown-item">
                                                    @if($item->status == 1)
                                                        Block
                                                    @else
                                                        Un-Block
                                                    @endif
                                                </a>
                                            </li>
                                </ul>
                                </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal Body -->
    <div class="modal fade" id="supportedUsersModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addUser">
                    @csrf
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Username</label>
                                    <input type="text" name="username" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Email</label>
                                    <input type="email" name="email" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Country</label>
                                    <input type="text" name="country" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Time Zone</label>
                                    <input type="text" name="timezone" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Password</label>
                                    <input type="password" name="password" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required class=" form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editsupportedUsersModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUser" method="POST">
                    @csrf
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="username" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Country</label>
                                    <input type="text" name="country" id="country" required class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-0">
                                    <label for="">Timezone</label>
                                    <input type="text" name="timezone" id="timezone" required class=" form-control">
                                </div>
                            </div>
                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="resetPassword" method="POST">
                    @csrf
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Password</label>
                                    <input type="text" id="password" name="password" required class=" form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    @push('extra-js')
        <script>
            function resetPassword(id)
            {
                $('#resetPassword').attr('action', "/dashboard/support/users/resetpassword/"+ id)
            }
            function getData(id)
            {
                $('#editUser').attr('action', "/dashboard/support/users/update/"+ id)
                $.ajax({
                    url: '/dashboard/support/users/'+id,
                    method: 'GET',
                    success: function(response){
                        $('#first_name').val(response.data.first_name);
                        $('#last_name').val(response.data.last_name);
                        $('#username').val(response.data.username);
                        $('#email').val(response.data.email);
                        $('#country').val(response.data.country);
                        $('#timezone').val(response.data.timezone);
                    }
                });
            }
        
            $('#addUser').on('submit', function(e) {
                e.preventDefault();


                var formData = new FormData(this);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('users.supported.store') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.msg
                            })
                            window.location.href = '{{ route('users.supported') }}';
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.msg
                            })
                        }
                    }
                })


            })
        </script>
    @endpush
@endsection
