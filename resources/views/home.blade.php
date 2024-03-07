<!DOCTYPE html>
        <html lang="en">
                <title>Dashboard</title>
                     @extends('includes.head')
                <body class="hold-transition sidebar-mini layout-fixed">
                    <div class="wrapper">
                        @extends('layouts.app')
                        @section('content')
                        @include('includes.side')
                        @include('includes.main')
                        @include('includes.footer')
                        @endsection
                    </div>
                </body>
        </html>