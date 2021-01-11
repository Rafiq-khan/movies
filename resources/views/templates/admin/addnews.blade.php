@extends('templates.partials.default')
<link href="{{asset('public/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('public/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@section('content')
<section class="content home">
    <div class="container-fluid">
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card widget-stat">
                    <div class="card-body">
                        <h4></h4>

                    </div>
                    <div class="card">
                        <div class="card-body">

             @if(isset($addnews))
            <form method="POST" action="{{route('post.updatenews')}}" enctype="multipart/form-data"> 
                <input type="hidden" name="id" value="{{$addnews->id}}">
             @else                
            <form method="POST" action="{{route('post.addnews')}}" enctype="multipart/form-data">
            @endif
            @csrf
            
            <div class="col-md-12 margin">
                <div class="row">
                <div class="col-lg-12 col-12">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" value="{{isset($addnews)?$addnews->text:''}}" name="title" required class="form-control input">
                        </div>
                    </div>

                     <div class="col-lg-8 col-8">
                        <div class="form-group">
                            <label>Image Url</label>
                            <input type="text" name="image_url" class="form-control input">
                        </div>
                    </div>   



                    <div class="col-lg-4 col-4">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                    </div>    

                    @if(isset($addnews))

                    <div class="col-12 col-lg-12">

                        <img src="{{$addnews->image}}" style="width: 100%;">

                    </div>

                    @endif                

                    <div class="col-lg-12 col-12">
                        <div class="form-group">
                            <label>Source</label>

                            <textarea type="text" name="source" value="{{old('source')}}" class="form-control input" required="required">{{isset($addnews)?$addnews->source:''}}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">

                        <input type="submit" name="submit" value="Save" class="btn btn-success">

                    </div>

                    

                </div>


            </div>


        </form>
                            
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection()
@section('jsOutside')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
 <script>
        CKEDITOR.replace( 'source' );

</script>
@endsection()