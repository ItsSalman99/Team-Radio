@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Reports Management</h2>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>U_ID</th>
                        <th>Report From</th>
                        <th>Report To</th>
                        <th>Reason</th>
                        <th>Reported At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $item)
                        <tr>
                            <td class="fw-500">#{{ $item->id }}</td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class=" text-truncate ">
                                        {{ isset($item->reported_from) ? $item->reportedfrom->getName() : '' }}
                                    </div>
                                </div>
                            </td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class=" text-truncate ">
                                        {{ isset($item->reported_to) ? $item->reportedto->getName() : ''}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $item->reason->reason }}
                            </td>
                            <td>
                                <div class="active-status">
                                    <p>{{ date('F, j Y', strtotime($item->created_at)) }}</p>
                                </div>
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
