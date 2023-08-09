@extends('partials.header')

@section('content')
    <div class="signup bg-white rounded-4 overflow-hidden width-100 width-lg-40 mx-auto"
        style="box-shadow: 0px 0px 8px 0px #00000040;">
        <div class="right-box d-flex align-items-center ">
            <div>
                <div class=" mb-8">
                    <img src="{{ asset('assets/images/logo.png') }}" alt=""
                        class="width-50 width-md-40 mx-auto mb-3">
                    <div class="text-center">
                        <p class="m-0">Login your Account!</p>
                    </div>
                </div>
                <form id="login" class="mt-6">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <div class="position-relative">
                                    <input type="email" name="email" class="form-control "
                                        placeholder="Enter your email address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <div class="position-relative">

                                    <input type="password" name="password" class="form-control "
                                        placeholder="Enter Password">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="text-center my-4">
                                <li>
                                    <button type="submit"
                                        class="btn btn-primary text-uppercase py-2 extra-btn-padding-50 rounded-pill">
                                        Login
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    @push('extra-js')
        <script>
            $('#login').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('login.store') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.status == true) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Signed in successfully'
                            })
                            window.location.href = '{{ route('dashboard') }}';

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
