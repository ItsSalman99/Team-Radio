@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Report Options</h2>
            <ul>
                <li><a href="#" class=" btn btn-primary extra-btn-padding-25" data-bs-toggle="modal"
                        data-bs-target="#addOption">Add New Option</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>U_ID</th>
                        <th>Option/Reason For Report</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($options as $item)
                        <tr>
                            <td class="fw-500">#{{ $item->id }}</td>
                            <td>
                                {{ $item->reason }}
                            </td>
                            <td>
                                @if($item->status == 1)
                                    <div class="active-status">
                                        <p>Active</p>
                                    </div>
                                @else
                                    <div class="deactive-status">
                                        <p>DeActive</p>
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
                                                <a href="{{ route('reports.options-block', ['id' => $item->id]) }}" class="dropdown-item">
                                                @if($item->status == 1)
                                                    In-Active
                                                @else
                                                    Active
                                                @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#." 
                                                onclick="editOption({{$item->id}})" data-bs-toggle="modal"
                                        data-bs-target="#editOption"
                                                class="dropdown-item">
                                                    Edit
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
    <div class="modal fade" id="editOption" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Edit Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editOptionForm" method="post">
                    @csrf
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Reason Option</label>
                                    <input type="text" id="editReason" name="reason" required class=" form-control">
                                </div>
                            </div>
                           

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Body -->
    <div class="modal fade" id="addOption" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-25px fw-600" id="modalTitleId">Add Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addOptionForm">
                    @csrf
                    <div class="modal-body p-3 p-md-5">
                        <div class="row g-4">

                            <div class="col-lg-12">
                                <div class="form-group m-0">
                                    <label for="">Reason Option</label>
                                    <input type="text" name="reason" class=" form-control">
                                </div>
                            </div>
                           

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary extra-btn-padding-25"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary extra-btn-padding-25 fw-500">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('extra-js')
        @include('sweetalert::alert')
        <script>
        
            function editOption(id)
            {
                $('#editOptionForm').attr('action', '/dashboard/reports/options/update/' + id);
                
                $.ajax({
                    url: '/dashboard/reports/options/'+id,
                    method: 'GET',
                    success: function(response)
                    {
                        $('#editReason').val(response.data.reason)   
                    }
                })
            }
        
            $('#addOptionForm').on('submit', function(e) {
                e.preventDefault();


                var formData = new FormData(this);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('reports.options-store') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.msg
                            })
                            window.location.href = '{{ route('reports.options') }}';
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
