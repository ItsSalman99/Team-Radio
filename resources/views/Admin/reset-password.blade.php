@extends('Admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2>Reset Password</h2>
        </div>
        <br>
        <br>

        <div class="">


                <div class="card primary-border-hover">
                    <div class="card-body">
                        <form action="{{ route('changePassword') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 my-4">
                                    <span class="text-danger" id="msg"></span>
                                    <input class="form-control old_password" name="old_password" placeholder="Old Password">
                                </div>
                                <div class="col-12 my-4">
                                    <input class="form-control new_password" disabled name="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <button class="btn btn-success" id="submitBtn" disabled>Reset Password</button>
                        </form>
                    </div>
                </div>
        </div>
        
    </div>

    @push('extra-js')
        <script>
            $('.old_password').on('keyup', function(){
                var pasw = $(this).val();
                console.log(pasw)
                $('#msg').html();
                $.ajax({
                    url: '{{ route('checkPassword') }}',
                    method: 'GET',
                    data: {
                        'password': pasw
                    },
                    success: function(response)
                    {
                        if(response.status == true)
                        {
                            $('#msg').html('Password Matched!');
                            $('.new_password').prop('disabled', false)
                            $('#submitBtn').prop('disabled', false)
                        }
                        else{
                            $('#msg').html('Password does not match!');
                            $('.new_password').prop('disabled', true)
                            $('#submitBtn').prop('disabled', true)
                        }
                    }
                })
                
            })
        </script>

    @endpush
@endsection