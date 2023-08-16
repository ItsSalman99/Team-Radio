@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Feedback</h2>
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
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td class="fw-500">#{{ $feedback->id }}</td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class=" text-truncate ">
                                        {{ isset($feedback->feedback_from) ? $feedback->feedback_from->getName() : '' }}
                                    </div>
                                </div>
                            </td>
                            <td style="max-width: 260px;" class="sorting_1">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class=" text-truncate ">
                                        {{ isset($feedback->feedback_to) ? $feedback->feedback_to->getName() : '' }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $feedback->feedback }}
                            </td>
                            <td>
                                <div class="active-status">
                                    <p>{{ date('F, j Y', strtotime($feedback->created_at)) }}</p>
                                </div>
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('extra-js')
    @endpush
@endsection
