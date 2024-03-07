<!DOCTYPE html>

<html lang="en">

<title>Employees List</title>

@extends('includes.head')

@push('css')

@endpush

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
        <h3 class="card-title">Employees List</h3>
        <div class="row justify-content-end">
          <div class="col-md-auto">
            <a href="{{ route('employee.create') }}" class="btn btn-dark">Create Employee</a>
          </div>
        </div>      </div>

      <!-- /.card-header -->
      
      <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered  table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>FullName</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Area Of Expertise</th>
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
              <td>{{$item->email}}</td>
              <td>{{$item->contact_number}}</td>
              <td>{{$item->expertise_in}}</td>
              <td>
               
                <a href="{{route('employee.edit',$item->id)}}" class="m-1 btn btn-info ">Edit </a>
                <form action="{{route('employee.show',$item->id)}}">
                  <button type="submit" class="m-1 btn btn-warning">Detail</button>
                </form>
                <form action="{{route('employee.destroy',$item->id)}}" method="post">
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
      <div class=" mt-3 d-flex justify-content-end">
        <ul class="pagination">
          <li class="paginate_button page-item previous" id="example2_previous">
            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
              Previous
            </a>
          </li>
          {{$data->links()}}
          <li class="paginate_button page-item previous" id="example2_previous">
            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">
              Next
            </a>
          </li>
        </ul>
      </div>
      <style>
        .w-5 {
          display: none;
        }
      </style>
    </div>
  </div>
  </div>
  @include('includes.footer')
  @endsection
</body>

</html>