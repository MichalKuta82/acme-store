<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
				  <title>Admin Panel - @yield('title')</title>
				  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				  	<link rel="stylesheet" type="text/css" href="/css/all.css">
				  	<script src="https://use.fontawesome.com/982ce8729b.js"></script>
				</head>
				<body data-page-id="@yield('data-page-id')">

					@include('includes.admin-sidebar')

				  <div class="off-canvas-content admin-title-bar" data-off-canvas-content>

					<div class="title-bar">
					  <div class="title-bar-left">
					    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
					    <span class="title-bar-title">{{ getenv('APP_NAME') }}</span>
					  </div>
					</div>
				    @yield('content')
				  </div>

					<script type="text/javascript" src="/js/all.js"></script>
					<script type="text/javascript">$(document).foundation();</script>
				</body>
				</html>
