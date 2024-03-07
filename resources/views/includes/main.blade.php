<!-- Main content -->
@php
    $task = \App\Models\Task::where('employee_id', auth()->id())->count();
    $time = \App\Models\Task::where('employee_id', auth()->id())->average('total_time');
    $hours = floor($time / 60);
    $minutes = $time % 60;
@endphp
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$task}}</h3>
            <p>Tasks</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('task.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h2>
            {{ $hours }} : {{ $minutes }} Hours
            </h2>
            <p>Average Time</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

</section>
</div>