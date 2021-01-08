@extends('templates.partials.default')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Video Detial Here</h3>

                            <div class="card-body">
                                <h4></h4>
                                <a href="{{url('add_video')}}" class="btn btn-raised btn-success waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add New Video</a>
                            </div>

                        </div>
                        <!-- /.card-header -->




                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Position</th>
                                        <th>Quality</th>
                                        <th>Approved</th>
                                        <th>Playes</th>
                                        <th>Score</th>
                                        <th>Reports</th>
                                        <th>Season</th>
                                        <th>Episode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($video as $v)
                                    <tr>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->title}}</td>
                                        <td>{{$v->type}}</td>
                                        <td>{{$v->category}}</td>
                                        <td>{{$v->position}}</td>
                                        <td>{{$v->quality}}</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    @endforeach

                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection