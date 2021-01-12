@extends('templates.partials.default')
<style type="text/css">
	
.switch {
  position: relative;
  display: inline-block;
  width: 46px;
  height: 22px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #f44336;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
@section('content')


<div class="row">
	<div class="col-lg-3">
		
		<div class="card">


			<div class="card-body">
				<div class="d-lg-flex justify-content-lg-between">
					<ul class="nav nav-pills flex-column mr-lg-3 mb-lg-0" style="width: 100% !important">

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

				</div>

			</div>


		</div>


	</div>


	<div class="col-lg-9">

		<form method="post" action="">
			<div class="tab-content" style="width: 100%">


				@php $i = 0; @endphp
						@foreach($array as $arr)

						<?php $str = strtolower($arr); ?>
						<div class="tab-pane fade <?php if ($i == 0) echo 'active show'; ?>" id="{{$str}}">

							<div class="card">
								<div class="card-body">

									<input type="hidden" name="setting_type" value="{{$str}}">
								@if($arr=='General')
									@include('templates.admin.settings_files.general')
								@elseif($arr=='Content')
									@include('templates.admin.settings_files.content')
								@elseif($arr=='Streaming')
									@include('templates.admin.settings_files.streaming')	
								@elseif($arr=='Billing')
									@include('templates.admin.settings_files.billing')
								@elseif($arr=='localization')
									@include('templates.admin.settings_files.localization')
								@elseif($arr=='Authentication')
									@include('templates.admin.settings_files.authentication')
								@elseif($arr=='Uploading')
									@include('templates.admin.settings_files.uploading')
								@elseif($arr=='Mail')
									@include('templates.admin.settings_files.mail')
								@elseif($arr=='Cache')
									@include('templates.admin.settings_files.cache')
								@elseif($arr=='Analytics')
									@include('templates.admin.settings_files.analytics')
								@elseif($arr=='Logging')
									@include('templates.admin.settings_files.logging')
								@elseif($arr=='Queue')
									@include('templates.admin.settings_files.queue')
								@elseif($arr=='Recaptcha')
									@include('templates.admin.settings_files.recaptcha')
								@elseif($arr=='GDRP')
									@include('templates.admin.settings_files.gdpr')
								@endif


								<div class="col-lg-12">

									<input type="submit" name="submit" value="Update" class="btn btn-danger">

								</div>

								</div>

							</div>
						</div>
						@php $i++; @endphp
						@endforeach


			</div>
		</form>


	</div>
</div>



@endsection()