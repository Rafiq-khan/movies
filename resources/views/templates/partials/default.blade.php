@include('templates.partials.head')
@include('templates.partials.header')
<body>
	<div class="page-content">

		<!-- Main sidebar -->
		@include('templates.partials.sidebar')

		<!-- /main sidebar -->

		<!-- Main content -->
		<div class="content-wrapper">	
						@include('templates.partials.navbar')
			  @yield('content')


  		</div>

  	</div>
@include('templates.partials.footer')
			  @yield('jsOutside')
</body>
</html>
