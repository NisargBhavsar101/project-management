<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Employee</title>

    @extends('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @extends('layouts.app')
        @section('content')
        @include('includes.side')

        @if(session('success'))
        <div class="alert alert-success">
            <p style="font-style: italic; text-align:center">{{session('success')}}</p>
        </div>
        @endif

        <div class="col-md">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Employee</h3>
                    <a href="{{route('employee.index')}}" style="margin-left:1170px;margin-top:-32px;" class="btn btn-dark">Back</a>
                </div>

                <form id="quickForm" action="{{route('employee.store')}}" method="post">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="">FullName:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" class="form-control " name="email">
                        </div>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Designation:</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        @error('designation')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Mobile Number:</label>
                            <input type="number" name="contact_number" class="form-control">
                        </div>
                        @error('contact_number')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Birthdate:</label>
                            <input type="date" name="birthdate" class="form-control">
                        </div>
                        @error('birthdate')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Bachlor's Degree:</label>
                            <input type="text" name="degree" class="form-control">
                        </div>
                        @error('degree')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">College Name:</label>
                            <input type="text" name="college_name" class="form-control">
                        </div>
                        @error('college_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Area Of Expertise:</label>
                            <input type="text" name="expertise_in" class="form-control">
                        </div>
                        @error('expertise_in')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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