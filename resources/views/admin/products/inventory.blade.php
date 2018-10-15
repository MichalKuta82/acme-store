@extends('admin.layout.base')
@section('title','Manage Invenory')
@section('data-page-id','adminProduct')

@section('content')
	<div class="products">
		<div class="row expanded">
			<h2>Manage Invenory Items</h2>
		</div>
		@include('includes.message')
		<div class="row expanded">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 medium-11">
					<a href="/admin/products/create" type="button" class="button float-right"><i class="fa fa-plus"></i>
					 Add New Product</a>
				</div>
			</div>
			<div class="row expanded">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 medium-11">
						@if(count($products))
						<table class="hover unstriped" border="1" data-form="deleteForm">
							<thead>
								<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Category</th>
								<th>Subcategory</th>
								<th>Date Created</th>
								<th width="80">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td><img src="/{{$product['image_path']}}" alt="{{$product['name']}}" height="40" width="40"></td>
									<td>{{ $product['name'] }}</td>
									<td>{{ $product['price'] }}</td>
									<td>{{ $product['quantity'] }}</td>
									<td>{{ $product['category_name'] }}</td>
									<td>{{ $product['sub_category_name'] }}</td>
									<td>{{ $product['added'] }}</td>
									<td width="80" class="text-right">
										<span data-tooltip tabindex="1" title="Edit Product" class="has-tip top">
											<a href="/admin/product/{{$product['id']}}/edit"><i class="fa fa-edit"></i></a>
										</span>

                                    </td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $links !!}
						@else
							<h2>You have not created any product</h2>
						@endif
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection