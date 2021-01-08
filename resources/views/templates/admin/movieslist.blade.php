@extends('templates.partials.default')

@section('content')

<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Movies List</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>



				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Movie Id </th>
								<th>Image</th>
								<th>Release Date</th>
								<th>Original Title</th>
								<th>Genres</th>
								<th>Popularity</th>
								<th>Vote</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							@php $i=1;
							@endphp
							@foreach($movies as $m)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$m->movie_id}}</td>
								<td><a href="#"></a></td>
								<td>{{$m->release_date}}</td>
								<td>{{$m->original_title}}</td>
								<td>@php $gencount = 1; @endphp @foreach($m->movies_genres as $genre)

									{{$genre->movies_genres_name->name}}

									@if(count($m->movies_genres) != $gencount)
									{{','}}
									@endif
									@php $gencount++; @endphp
									@endforeach
								</td>
								<td>{{$m->popularity}}</td>
								<td>{{$m->vote_count}}</td>

								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i>Edit</a>
												<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Delete</a>

											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach






						</tbody>




					</table>
					{{$movies->links()}}
				</div>
			</div>

		</div>



	</div>




</div>

@endsection()