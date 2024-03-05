<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Task</title>

    @extends('includes.head')
    <style>
        .red-text {
            color: red;
        }

        .orange-text {
            color: orange;
        }

        .green-text {
            color: green;
        }
    </style>
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
                    <h3 class="card-title">Create Task</h3>
                    <div class="row justify-content-end">
                        <div class="col-md-auto">
                            <a href="{{ route('task.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>

                <form id="quickForm" action="{{route('task.store')}}" method="post">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="">Task Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Task-Type:</label>
                            <br>
                            <select name="type" class="form-select">
                                <option value="" disabled selected>Select-Type</option>
                                <option value="Phishing R&D Extension">Phishing R&D Extension</option>
                                <option value="Cookies R&D Extension">Cookies R&D Extension</option>
                                <option value="Ad-blocks R&D Extension">Ad-blocks R&D Extension</option>
                                <option value="Mobile Application R&D">Mobile Application R&D</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Testing">Testing</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Your Name</label>
                            <br>
                            <select name="employee_id" class="form-select">
                                <option value="" disabled selected>Select</option>
                                @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" id="startTimer" class="btn btn-success form-control">Start Timer</button>
                            <button type="button" id="endTimer" class="btn btn-danger form-control" style="display: none;">End Timer</button>
                        </div>
                        <div id="descriptionField" style="display: none;">
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Write Description Of Your Task"></textarea>
                            </div>
                        </div>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <div id="totalTimeField" style="display: none;">
                            <p id="totalTime" class="form-control"></p>
                            <input type="hidden" id="totalTimeInput" name="total_time">
                        </div>
                        <div class="form-group">
                            <label for="">Start Time:</label>
                            <input type="time" name="start_time" id="startTimeInput" value="<?php echo date('H:i') ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">End Time:</label>
                            <input type="time" name="end_time" id="endTimeInput" class="form-control" readonly>
                        </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let startTime = null;
            let endTime = null;

            document.getElementById("startTimer").addEventListener("click", function() {
                startTime = new Date();
                document.getElementById("startTimer").style.display = "none";
                document.getElementById("endTimer").style.display = "block";
            });

            document.getElementById("endTimer").addEventListener("click", function() {
                endTime = new Date();
                let timeDiff = endTime - startTime;
                let seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
                let minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                let hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                let totalTime = "";
                if (hours > 2) {
                    totalTime = hours + " hours " + minutes + " minutes " + seconds + " seconds";
                    document.getElementById("totalTime").className = "green-text";
                    document.getElementById("totalTime").innerText = "Total Time: " + totalTime + " - Excellence! We appreciate your contribution!";
                } else if (hours >= 1 && hours <= 2) {
                    totalTime = hours + " hours " + minutes + " minutes " + seconds + " seconds";
                    document.getElementById("totalTime").className = "orange-text";
                    document.getElementById("totalTime").innerText = "Total Time: " + totalTime + " - Cool! Keep it up!";
                } else {
                    totalTime = minutes + " minutes " + seconds + " seconds";
                    document.getElementById("totalTime").className = "red-text";
                    document.getElementById("totalTime").innerText = "Total Time: " + totalTime + " - Poor! You need to improve it.";
                }

                document.getElementById("endTimer").style.display = "none";
                document.getElementById("descriptionField").style.display = "block";
                document.getElementById("totalTimeField").style.display = "block";
                document.getElementById("totalTimeInput").value = totalTime;
            });

            function getCurrentTime() {
                let currentDate = new Date();
                let hours = currentDate.getHours();
                let minutes = currentDate.getMinutes();
                return hours + ":" + minutes;
            }
        });
    </script>
    @endsection
</body>

</html>