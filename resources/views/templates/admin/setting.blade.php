@extends('templates.partials.default')

@section('content')
@php $name_tooltip = 'Name Should be Unique and doesnot contain spaces e.g (first_name)';
$id_tooltip = 'ID Should be Unique and doesnot contain spaces e.g (first_name)';
$date_tooltip = 'Date Format e.g for Default Value (2019-01-01)';
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">Left position</h6>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="d-lg-flex justify-content-lg-between">
					<ul class="nav nav-pills flex-column mr-lg-3 wmin-lg-250 mb-lg-0">

						@php $i = 0; @endphp
						@foreach($array as $arr)
						<?php $str = strtolower($arr); ?>
						<li class="nav-item">
							<a href="#{{$str}}" class="nav-link <?php if ($i == 0) echo 'active'; ?>" data-toggle="tab">
								{{$arr}}
							</a>
						</li>
						@php $i++; @endphp
						@endforeach




					</ul>

					<div class="tab-content" style="width: 100%">


						@php $i = 0; @endphp
						@foreach($array as $arr)
						<?php $str = strtolower($arr); ?>
						<div class="tab-pane fade <?php if ($i == 0) echo 'active show'; ?>" id="{{$str}}">


							<!-- 											setting form -->






							<!-- 											setting form -->


						</div>
						@php $i++; @endphp
						@endforeach



					</div>
				</div>
			</div>




		</div>
	</div>


</div>



@endsection()