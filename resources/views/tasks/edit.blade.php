<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Task</title>

    @extends('includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        @extends('layouts.app')
        @section('content')
        @include('includes.side')
        @if(session('Update'))
        <div class="alert alert-success">
            <p style="font-style: italic; text-align:center">{{session('Update')}}</p>
        </div>
        @endif

        <div class="col-md">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Task</h3>
                    <div class="row justify-content-end">
                        <div class="col-md-auto">
                            <a href="{{ route('task.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>
                <form id="quickForm" action="{{route('task.update',$edit->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="">Task Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$edit->name}}">
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Task-Type:</label>
                            <br>
                            <select name="type" class="form-select">
                            <option value="{{$edit->type}}">{{$edit->type}}</option>
                                <option value="Phishing R&D Extension">Phishing R&D Extension</option>
                                <option value="Cookies R&D Extension">Cookies R&D Extension</option>
                                <option value="Ad-blocks R&D Extension">Ad-blocks R&D Extension</option>
                                <option value="Mobile Application R&D">Mobile Application R&D</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Testing">Testing</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" value="">{{$edit->description}}</textarea>
                            </div>
                        @error('description')
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