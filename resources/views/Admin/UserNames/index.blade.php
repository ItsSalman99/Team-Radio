@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Supported Users</h2>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>U_ID</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td class="fw-500">#{{ $item->id }}</td>
                            <td>
                                {{ $item->username }}
                            </td>
                            <td>
                                <div class="active-status">
                                    <p>Active</p>
                                </div>
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
                                                <a href="#." class="dropdown-item">Block</a>
                                            </li>
                                            <li>
                                                <a href="#." class="dropdown-item text-danger">Delete</a>
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
                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Password</label>
                                    <input type="password" name="password" required class=" form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script>
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
