@extends('templates.partials.default')
<link href="{{asset('public/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('public/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@section('content')
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-7">
                    <h2>Dashboard</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">News</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card widget-stat">
                    <div class="card-body">
                        <h4></h4>
                        <a class="btn btn-raised btn-success waves-effect" data-toggle="modal" data-target="#modal_iconified"><i class="zmdi zmdi-plus"></i> Add Tags</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Display Name</th>
                                            <th>Last Upadated</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1;
                                        @endphp
                                        @if($news->count()>0)
                                        @foreach($news as $n)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$n->name}}</td>
                                            <td>{{$n->type}}</td>
                                            <td>{{$n->display_name}}</td>
                                            <td>{{$n->display_name}}</td>
                                            <td><button data-id="{{$n->id}}" data-name="{{$n->name}}" data-type="{{$n->type}}" data-display_name="{{$n->display_name}}" data-toggle="modal" data-target="#modal_edit_tag" class="btn btn-success edit-tag"><i class="icon-menu7 mr-2"></i></button></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{$news->links()}}
                            </div>
                        </div>
                    </div>






                    <div id="modal_iconified" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp;Create a New Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form method="POST" action="{{route('post.addnewtags')}}" id="add_new_tags">
                                        @csrf
                                        <div class="col-md-12 margin">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="{{old('name')}}" class="form-control input" required="required">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Display Name</label>
                                                        <input type="text" name="display_name" value="{{old('display_name')}}" class="form-control input" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <select name="type" class="form-control">
                                                            
                                                            <option>Keyword</option>
                                                            <option>Genre</option>
                                                            <option>Production Country</option>
                                                            <option>Custom</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-link"  data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
                                    <button class="btn bg-primary" id="submitnewtagform"><i class="icon-checkmark3 font-size-base mr-1"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>



                <div id="modal_edit_tag" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="icon-menu7 mr-2"></i> &nbsp;Update Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form method="POST" action="{{route('updatenewtags')}}" id="edit_new_tags">
                                        @csrf
                                        <input type="hidden" name="id" id="edit_id">
                                        <div class="col-md-12 margin">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" id="edit_name" value="{{old('name')}}" class="form-control input" required="required">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Display Name</label>
                                                        <input type="text" name="display_name" id="edit_display_name" value="{{old('display_name')}}" class="form-control input" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-12">
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <select name="type" id="edit_type" class="form-control">
                                                            
                                                            <option>Keyword</option>
                                                            <option>Genre</option>
                                                            <option>Production Country</option>
                                                            <option>Custom</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-link"  data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
                                    <button class="btn bg-primary" id="submitupdatetagform"><i class="icon-checkmark3 font-size-base mr-1"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection()
@section('jsOutside')
<script type="text/javascript">

$('#submitnewtagform').click(function(){
$('#add_new_tags').submit();
});

$('#submitupdatetagform').click(function(){
$('#edit_new_tags').submit();
});




$('.edit-tag').click(function(){

    id = $(this).data('id');
    name = $(this).data('name');
    type = $(this).data('type');
    display_name = $(this).data('display_name');    


    $('#edit_name').val(name);
    $('#edit_display_name').val(display_name);
    $('#edit_type option[text="'+type+'"]').attr("selected", "selected");


    $('#edit_id').val(id);
})
</script>
@endsection()