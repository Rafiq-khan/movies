@extends('templates.partials.default')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Video Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Video</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header ">
                            <h3 class="card-title">Create Video</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" action="{{route('addnewvideo')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thumbnail</label>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="type" required class="form-control" id="exampleInputEmail1">
                                        <option>Embed</option>
                                        <option selected>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option>Adaptive Stream ( hls ,dash )</option>
                                        <option>Basic Url</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Url</label>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" name="url" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6" class="form-group">
                                        <label for="exampleInputEmail1">Quality</label>
                                        <select name="quality" required class="form-control" id="exampleInputEmail1">
                                            <option selected>None</option>
                                            <option>Regular</option>
                                            <option>SD</option>
                                            <option>HD</option>
                                            <option>720p</option>
                                            <option>1080p</option>
                                            <option>4k</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6" class="form-group">
                                        <label for="exampleInputEmail1">Languages</label>
                                        <select name="language" required class="form-control" id="exampleInputEmail1">
                                            <option selected>English</option>
                                            <option>Urud</option>
                                            <option>Japan</option>
                                            <option>Malaysia</option>
                                            <option>Itly</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <select name="title" required class="form-control" id="exampleInputEmail1">
                                        <option selected>Any</option>
                                        <option>Fresh</option>
                                        <option>New</option>
                                        <option>Old</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select name="category" required class="form-control" id="exampleInputEmail1">
                                        <option selected>Trailer</option>
                                        <option>Clip</option>
                                        <option>Featurette</option>
                                        <option>Teaser</option>
                                        <option>Full Movie Or Episode</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="text" class="form-control" name="position" min="0" placeholder="Enter Position">
                                    <p>At what position should this video be displayed on title and episode pages. Lower position will appear first. Lowest position video for title/episode will be used as primary video for streaming or as trailer.</p>
                                </div>










                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button href="{{route('video')}}" class="btn btn-Secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->






                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection()