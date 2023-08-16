@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center  gap-3 flex-wrap">
            <div class="">
                <h2>App Users</h2>
            </div>
            <div>
                <form action="{{ route('users.filter') }}" method="GET" class="d-flex gap-4 my-4">
                    <div class="form-group">
                        <input type="date" class="form-control" name="age" placeholder="Age" value="{{ request()->age }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="country" placeholder="Country" value="{{ request()->country }}">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="driver" placeholder="Driver">
                            <option value="">Select Driver</option>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}"
                                @if($driver->id == request()->driver) {{ 'selected' }} @endif>{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="team" placeholder="Team">
                            <option value="">Select Team</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}"
                                @if($team->id == request()->team) {{ 'selected' }} @endif>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="race" placeholder="Race">
                            <option value="">Select Race</option>
                            @foreach($races as $race)
                                <option value="{{ $race->id }}"
                                @if($race->id == request()->race) {{ 'selected' }} @endif>{{ $race->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="car_no" placeholder="Car Number" value="{{ request()->car_no }}">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Go</button>
                    </div>
                    <div class="">
                        <a href="{{ route('users') }}" class="btn btn-primary">Reset</a>
                    </div>
                </form>
            </div>
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
                        <th>Dath Of Birth</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Flags</th>
                        <th>Blocked Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <td class="fw-500">#{{ $item->id }}</td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    <img src="{{$item->profile_picture}}"
                                        alt="" style="width: 40px; height: 40px;" class=" rounded-circle shadow-sm"
                                        draggable="false" loading="lazy">
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
                                {{ $item->dob }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->country }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    @if(count($item->reports) > 0)
                                        @foreach(range(0, count($item->reports) - 1) as $key => $index)
                                            @if($key == 3)
                                                @break
                                            @endif
                                            <div>
                                                <img src="https://cdn-icons-png.flaticon.com/512/395/395841.png" >
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td>
                                {{ $item->block_reason }}
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
                                                <a class="dropdown-item"
                                                onclick="blockUser({{$item->id}})"
                                                 @if($item->status == 1) data-bs-toggle="modal" data-bs-target="#reasonModal" @endif
                                                 @if($item->status == 0) href="/dashboard/users/block/{{$item->id}}" @endif>
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
    
    <div class="modal fade" id="reasonModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addReason" method="POST">
                    @csrf
                    
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Reason:</label>
                                    <input type="text" name="reason" required class=" form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Block</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script>
        
        function blockUser(id)
        {
            $('#addReason').attr('action', '/dashboard/users/block-reason/' + id)
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
