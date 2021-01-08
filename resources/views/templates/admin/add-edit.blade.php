@extends('partials.default')
@section('content')  
<!-- Colorpicker Css -->
<link href="{{asset('public/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />    
<link href="{{asset('public/assets/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">
<link href="{{asset('public/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-7">
                    <h2>Dashboard</h2>                    
                    <ul class="breadcrumb">                        
                        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    </ul>
                </div>            
            </div>
        </div>
        <div class="row clearfix">
            
        <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card widget-stat">
                    <div class="body">
                    <h4>Survey Add</h4>                       
                        <form method="POST" action="{{route('admin.surveys.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                         <div class="row">     
                         <div class="col-lg-6 col-sm-6 col-md-6 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='name')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                            </div> 



                             <div class="col-lg-6 col-sm-6 col-md-6 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='url')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                            <label for="name">Url</label>
                                            <input type="text" class="form-control" id="url" name="url" placeholder="abc.html" value="" required>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                            </div> 
            

                            <div class="col-lg-12 col-sm-12 col-md-12 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='description')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                            <label for="description">Short Description</label>
                                            <textarea name="description" id="description" class="form-control"></textarea>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                              </div> 


                            <div class="col-lg-12 col-sm-12 col-md-12 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='long_description')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                            <label for="description">Long Description</label>
                                            <textarea name="long_description" id="long_description" class="form-control"></textarea>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                            </div> 


                            <div class="col-lg-6 col-sm-6 col-md-6 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='button_text')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                             <label for="description">Button Text</label>
                        <input type="text" class="form-control" id="button_text"
                           name="button_text" placeholder="Subscribe" value="" required>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                            </div>                                                          

                <div class="col-lg-6 col-sm-6 col-md-6 input-group">
                                     @php $value=''; @endphp
                                     @if(isset($survey))
                                      @if($survey->count() > 0)                                     
                                        @foreach($survey as $set)
                                           @if($set->key_term=='profile')
                                                @php $value=$set->value; @endphp
                                           @endif 
                                        @endforeach
                                       @else
                                                @php $value=''; @endphp
                                       @endif 

                                       @endif
                                        <div class="form-line">
                                             <label for="logo">Logo</label>
                                            <input type="file" class="form-control" name="profile" required>
                                        </div>
                                        <span class="input-group-addon"> <i></i> </span>
                            </div>  

                             
                            <div class="col-lg-12 col-sm-12 col-md-12 input-group">
                                <input type="submit" name="submit" value="Save" class="btn  btn-raised btn-success waves-effect">
                            </div> 

                          </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>               
    </div>
</section>
@endsection()
@section('jsOutside')
<script src="{{asset('public/assets/js/pages/forms/advanced-form-elements.js')}}"></script>
    <script src="{{asset('public/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<!-- Bootstrap Colorpicker Js -->
  <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
  <script>
        CKEDITOR.replace( 'description' );;
        CKEDITOR.replace( 'long_description' );      
        CKEDITOR.replace( 'desc_below_image' );

  </script>
@endsection()
