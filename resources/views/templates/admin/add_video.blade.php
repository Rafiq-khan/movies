@extends('templates.partials.default')


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header ">
                            @if(isset($add_video))
                            <h3 class="card-title">Update Video</h3>
                            @else
                            <h3 class="card-title">Create Video</h3>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                         @if(isset($add_video))
                        <form role="form" enctype="multipart/form-data" action="{{route('updatevideo')}}" method="post">
                            <input type="hidden" name="id" value="{{$add_video->id}}">
                         @else
                        <form role="form" enctype="multipart/form-data" action="{{route('addnewvideo')}}" method="post">
                         @endif

                            @csrf
                            <div class="card-body">
                                <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{isset($add_video)?$add_video->name:''}}">
                                </div>


                                <div class="form-group col-md-8">
                                    <label for="exampleInputEmail1">Thumbnail Url</label>
                                    <input type="text" name="thumbnail_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Thumbnail Url">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="exampleInputFile">Thumbnail</label>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="type" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                        <option value="basic_url" <?php if($add_video->type=='basic_url') echo "selected"; ?>>Basic Url</option>


                                        @else
                                        <option value="embed" >Embed</option>
                                        <option value="direct_video"  selected>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" >Adaptive Stream ( hls ,dash )</option>
                                        <option value="basic_url" >Basic Url</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="exampleInputEmail1">Video Url</label>
                                    <input type="text" name="video_url" class="form-control" id="exampleInputEmail1" placeholder="Enter Thumbnail Url">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="exampleInputFile">Video</label>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" name="video_file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1">Quality</label>

                                     @if(isset($add_video))


                                        <select name="quality" required class="form-control" id="exampleInputEmail1">
                                            <option <?php if($add_video->quality=='None') echo "selected"; ?>>None</option>
                                            <option <?php if($add_video->quality=='Regular') echo "selected"; ?>>Regular</option>
                                            <option <?php if($add_video->quality=='SD') echo "selected"; ?>>SD</option>
                                            <option <?php if($add_video->quality=='HD') echo "selected"; ?>>HD</option>
                                            <option <?php if($add_video->quality=='720p') echo "selected"; ?>>720p</option>
                                            <option <?php if($add_video->quality=='1080p') echo "selected"; ?>>1080p</option>
                                            <option <?php if($add_video->quality=='4k') echo "selected"; ?>>4k</option>
                                        </select>


                                        @else
                                        <select name="quality" required class="form-control" id="exampleInputEmail1">
                                            <option selected>None</option>
                                            <option>Regular</option>
                                            <option>SD</option>
                                            <option>HD</option>
                                            <option>720p</option>
                                            <option>1080p</option>
                                            <option>4k</option>
                                        </select>
                                        @endif

                                       
                                    </div>

                                    <div class="col-md-6 form-group">
                                        


                                        <label for="exampleInputEmail1">Languages</label>
                                        <select name="language" required class="form-control" id="exampleInputEmail1">

                                             @if(isset($add_video))

                                            <option <?php if($add_video->language=='English') echo "selected"; ?>>English</option>
                                            <option <?php if($add_video->language=='Urdu') echo "selected"; ?>>Urdu</option>
                                            <option <?php if($add_video->language=='Japan') echo "selected"; ?>>Japan</option>
                                            <option <?php if($add_video->language=='Malaysia') echo "selected"; ?>>Malaysia</option>
                                            <option <?php if($add_video->language=='Italy') echo "selected"; ?>>Italy</option>                                             

                                              @else
                                        

                                            <option selected>English</option>
                                            <option>Urdu</option>
                                            <option>Japan</option>
                                            <option>Malaysia</option>
                                            <option>Italy</option>
                                        @endif

                                        </select>
                                    


                                    </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Title</label>
                                    <select name="title" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))

                                            <option <?php if($add_video->title=='Any') echo "selected"; ?>>Any</option>
                                            <option <?php if($add_video->title=='Fresh') echo "selected"; ?>>Fresh</option>
                                            <option <?php if($add_video->title=='New') echo "selected"; ?>>New</option>
                                            <option <?php if($add_video->title=='Old') echo "selected"; ?>>Old</option>                                             

                                              @else
                                        

                                          <option selected>Any</option>
                                        <option>Fresh</option>
                                        <option>New</option>
                                        <option>Old</option>
                                        @endif

                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select name="category" required class="form-control" id="exampleInputEmail1">


                                        @if(isset($add_video))
                                             <option <?php if($add_video->title=='Trailer') echo "selected"; ?>>Trailer</option>
                                             <option <?php if($add_video->title=='Clip') echo "selected"; ?>>Clip</option>
                                             <option <?php if($add_video->title=='Featurette') echo "selected"; ?>>Featurette</option>
                                             <option <?php if($add_video->title=='Teaser') echo "selected"; ?>>Teaser</option>
                                             <option <?php if($add_video->title=='Full Movie Or Episode') echo "selected"; ?>>Full Movie Or Episode</option>                                             

                                              @else
                                        

                                           <option selected>Trailer</option>
                                        <option>Clip</option>
                                        <option>Featurette</option>
                                        <option>Teaser</option>
                                        <option>Full Movie Or Episode</option>
                                        @endif

                                       
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Position</label>
                                    <input type="text" value="{{isset($add_video)?$add_video->position:''}}" class="form-control" name="position" min="0" placeholder="Enter Position">
                                    <p>At what position should this video be displayed on title and episode pages. Lower position will appear first. Lowest position video for title/episode will be used as primary video for streaming or as trailer.</p>
                                </div>










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