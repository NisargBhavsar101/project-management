<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add</title>

   @extends('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @extends('layouts.app')
        @section('content')
        @include('includes.side')
        <div class="col-md">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ADD</h3>
                    <a href="" style="margin-left:1170px;margin-top:-32px;" class="btn btn-dark">Back</a>
                </div>

                <form id="quickForm" action="" method="post">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">EnterUser:</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        @error('user')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input type="email" class="form-control " name="email">
                        </div>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Role:</label>
                            <br>
                            <select name="role" class="form-select">
                               
                                <option value="">fg</option>
                             
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Password:</label>
                            <input type="password" class="form-control " name="password">
                        </div>
                        @error('password')

                        <p class="text-danger"><strong>{{ $message }}</strong></p>

                        @enderror

                        <div class="form-group">
                            <label class="form-label">ConfirmPassword:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        @error('password_confirm')

                        <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror

                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                            </div>
                        </div>
                    </div>
                    @error('terms')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>

    </div>
    @include('includes.footer')
    <script>
        $(document).ready(function() {
            $("#quickForm").validate({
                rules: {
                    user: "required",
                    email: "required",
                    password: "required|confirmed|min:8",
                    terms: "required",
                }
            });
            $('#quickForm').submit(validate);
        });
    </script>
    @endsection
</body>

</html>