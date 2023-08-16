@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Push Notifications</h2>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="m-2">
                            <h5>Send Push Notification</h5>
                        </div>
                        <div class="row p-4">
                            <div class="col-12 my-2">
                                <input class="form-control" placeholder="Title">
                            </div>
                            <div class="col-12 my-2">
                                <input class="form-control" placeholder="Body">
                            </div>
                            <div class="col-12 my-2">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('extra-js')
    @endpush
@endsection
