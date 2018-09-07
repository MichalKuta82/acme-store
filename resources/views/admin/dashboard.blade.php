@extends('admin.layout.base')
@section('title','Dashboard')

@section('content')
	<div class="dashboard">
		<div class="row expanded">
			<h2>Dashboard</h2>

			<form action="/admin" method="post" enctype="multipart/form-data">
				<input value="testing" name="product">
				<input type="file" name="image">
				<input type="submit" name="submit" value="Go">
			</form>


		</div>
	</div>
@endsection