@extends('templates.partials.default')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Videos</h3>

                            <div class="card-body">
                                <h4></h4>
                                <a href="{{url('add_video')}}" class="btn btn-raised btn-success waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add New Video</a>
                            </div>

                        </div>
                        <!-- /.card-header -->




                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="all" value="all"></th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Approved</th>
                                        <th>Plays</th>
                                         <th>Quality</th>
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
                                        <td><input type="checkbox" name="video_checkboxes[]" value="{{$v->id}}"></td>
                                        <td><img src="{{$v->thumbnail}}" style="width: 50px;height: 50px; margin-right: 10px;"> {{$v->name}}</td>
                                        <td>{{$v->title}}</td>
                                        <td>{{$v->type}}</td>
                                        <td>{{$v->category}}</td>
                                        <td>@if($v->approved==1)
                                                <i style="color: green" class="icon-checkmark4"></i>
                                            @else
                                                <i style="color: red" class="icon-cross3"></i>
                                            @endif
                                        </td>
                                        <td>{{'0'}}</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>

                                            <a href="{{route('video.edit',['id'=>$v->id])}}"><i class="icon-pencil5 mr-2"></i></a>

                                            <a href="{{route('video.delete',['id'=>$v->id])}}" ><i class="icon-folder-remove mr-2"></i></a>

                                        </td>
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