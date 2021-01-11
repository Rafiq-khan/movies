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
              <h4>News</h4>              

                    <a href="addnews" data-target="#add_new" data-backdrop="false" class="btn btn-raised btn-success waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add news</a>

            </div>

<div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                    <th><input type="checkbox" name="all" value="all"></th>
                                        <th>Title</th>
                                        <th>Source</th>
                                        <th>Last update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                           
                                <tbody>
                                @php $i= 1;
                                @endphp
                                   @if($news->count()>0) 
                                    @foreach($news as $n)
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" value="{{$n->id}}"></td>
                                        <td><img src="{{$n->image}}" style="width: 50px;height: 50px; margin-right: 10px;">{{$n->text}}</td>
                                        <td>{!!$n->source!!}</td>
                                        <td>{{$n->updated_at->diffForHumans()}}</td>
                                        <td>

                                            <a href="{{route('news.edit',['id'=>$n->id])}}"><i class="icon-pencil5 mr-2"></i></a>

                                            <a href="{{route('news.delete',['id'=>$n->id])}}" ><i class="icon-folder-remove mr-2"></i></a>

                                            </td>
                                    </tr>
                                    @endforeach
                                   @else
                                        <tr><td colspan="6">No Record Found</td></tr>
                                   @endif 
                                    
                                </tbody>
                            </table>
                            {{$news->links()}}
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
@endsection()
