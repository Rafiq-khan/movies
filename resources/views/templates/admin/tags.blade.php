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

                        <a href="{{route('addtags')}}" class="btn btn-raised btn-success waves-effect float-right"><i class="zmdi zmdi-plus"></i> Add Tags</a>

                    </div>

                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Display Name</th>
                                            <th>Actions</th>
                                            <th>Last Upadated</th>

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
                                            <td></td>
                                            <td></td>
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


                </div>
            </div>

        </div>
    </div>
</section>


@endsection()
@section('jsOutside')
@endsection()