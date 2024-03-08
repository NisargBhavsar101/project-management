<!DOCTYPE html>

<html lang="en">

<title>Task List</title>

@extends('includes.head')

@push('css')

@endpush

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

    @if(session('deleted'))
    <div class="alert alert-danger">
      <p style="font-style: italic; text-align:center">{{session('deleted')}}</p>
    </div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tasks List</h3>
        <div class="row justify-content-end">
          <div class="col-md-auto">
            <a href="{{ route('task.create') }}" class="btn btn-dark">Create Task</a>
          </div>
        </div>
      </div>

      <!-- /.card-header -->

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered  table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>TaskName</th>
                <th>Type</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Spend Time</th>    
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @php
              $i=1;
              @endphp
              @foreach($data as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->description}}</td>
                @foreach($employees as $employee)
                  @if($employee->id == $item->employee_id)
                    <td>{{$employee->name}}</td>
                  @endif
                @endforeach
                <td>{{$item->total_time}}</td>
                <td>{{$item->created_at->diffForHumans()}}</td>
                <td>

                  <a href="{{route('task.edit',$item->id)}}" class="m-1 btn btn-info ">Edit </a>
                  <form action="{{route('task.show',$item->id)}}">
                    <button type="submit" class="m-1 btn btn-warning">Detail</button>
                  </form>
                  <form action="{{route('task.destroy',$item->id)}}" method="post">
                    @method('Delete')
                    @csrf
                    <button type="submit" class="btn btn-danger m-1">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </div>
        </table>
      </div>
    </div>
  </div>
  </div>
  @include('includes.footer')
  @endsection
</body>

</html>