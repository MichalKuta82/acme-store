@extends('layouts.base')

@section('body')

	<!-- navigation -->
	@include('includes.nav')
	<!-- site wrapper -->
	<div class="site_wrapper">
		@yield('content')

		<div class="notify text-center">
			
		</div>
	</div>
	@yield('footer')

@stop