<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="mr-3">
						<a href="#"><img src="{{asset('public/global_assets/images/demo/users/face11.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
					</div>

					<div class="media-body">
						<div class="media-title font-weight-semibold">Victoria Baker</div>
						<div class="font-size-xs opacity-50">
							<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<li class="nav-item-header">
					<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
				</li>
				<li class="nav-item">
					<a href="{{route('home')}}" class="nav-link active">
						<i class="icon-home4"></i>
						<span>
							DashBoard
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('movies')}}" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							Movies
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('setting')}}" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							Settings
						</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							Forms
						</span>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{route('news')}}" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							News
						</span>
					</a>
				</li>




				<li class="nav-item">
					<a href="{{route('tags')}}" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							Tags
						</span>
					</a>
				</li>



				<li class="nav-item">
					<a href="{{route('video')}}" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
							Video
						</span>
					</a>
				</li>





				<!-- /layout -->


				<!-- /tables -->

				<!-- Page kits -->






				<!-- /page kits -->

			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->

</div>