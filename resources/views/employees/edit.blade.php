<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Employee</title>

    @extends('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @extends('layouts.app')
        @section('content')
        @include('includes.side')

        @if(session('Update'))
        <div class="alert alert-primary">
            <p style="font-style: italic; text-align:center">{{session('Update')}}</p>
        </div>
        @endif

        <div class="col-md">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Employee</h3>
                    <a href="{{route('employee.index')}}" style="margin-left:1170px;margin-top:-32px;" class="btn btn-dark">Back</a>
                </div>

                <form id="quickForm" action="{{route('employee.update',$edit->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="">FullName:</label>
                            <input type="text" name="name" class="form-control" value="{{$edit->name}}">
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" class="form-control " name="email" value="{{$edit->email}}">
                        </div>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Designation:</label>
                            <input type="text" name="designation" class="form-control" value="{{$edit->designation}}">
                        </div>
                        @error('designation')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Mobile Number:</label>
                            <input type="number" name="contact_number" class="form-control" value="{{$edit->contact_number}}">
                        </div>
                        @error('contact_number')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Birthdate:</label>
                            <input type="date" name="birthdate" class="form-control" value="{{$edit->birthdate}}">
                        </div>
                        @error('birthdate')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Bachlor's Degree:</label>
                            <input type="text" name="degree" class="form-control" value="{{$edit->degree}}">
                        </div>
                        @error('degree')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">College Name:</label>
                            <input type="text" name="college_name" class="form-control" value="{{$edit->college_name}}">
                        </div>
                        @error('college_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="">Area Of Expertise:</label>
                            <input type="text" name="expertise_in" class="form-control" value="{{$edit->expertise_in}}">
                        </div>
                        @error('expertise_in')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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