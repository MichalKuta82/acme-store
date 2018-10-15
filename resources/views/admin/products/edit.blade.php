@extends('admin.layout.base')
@section('title','Edit Products')
@section('data-page-id','adminProduct')

@section('content')
	<div class="add-product">
		<div class="row expanded">
			<div class="colum medium-11">
				<h2>Edit {{$product->name}}</h2>
			</div>
			
		</div>
		@include('includes.message')

			<form method="post" action="/admin/product/edit" enctype="multipart/form-data">
				<div class="small-12 medium-11">
					<div class="row expanded">
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Name :<input type="text" name="name" placeholder="Product Name" value="{{$product->name}}"></label>
							</div>
							<div class="small-12 medium-6 cell">
								<label>Product Price :<input type="text" name="price" value="{{$product->price}}"></label>
							</div>
						</div>
						<div class="grid-x  grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Category :
									<select name="category" id="product-category">
										<option value="{{$product->category->id}}">
											{{$product->category->name}}
										</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</label>
							</div>
							<div class="small-12 medium-6 cell">
								<label>Product Subcategory :
									<select name="subcategory" id="product-subcategory">
										<option value="{{$product->subCategory->id}}">
											{{$product->subCategory->name}}
										</option>
									</select>
								</label>
							</div>
						</div>
						<div class="grid-x  grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Qantity :
									<select name="quantity">
										<option value="{{$product->quantity}}">
											{{$product->quantity}}
										</option>
										@for($i=1; $i <= 50; $i++)
										<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
								</label>
							</div>
							<div class="small-12 medium-6 cell">
								<br>
								<div class="input-group">
									<span class="input-group-label">Product Image:</span>
									<input type="file" name="productImage" class="input-group-field">
								</div>
							</div>
						</div>
						<div class="grid-x  grid-padding-x">
							<div class="small-12 cell">
								<label>
									<textarea name="description" placeholder="Description">{{$product->description}}</textarea>
								</label>
								<input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<button type="submit" class="button warning float-right">Update Product</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!-- delete button -->
			<div class="small-12 medium-11">
					<div class="row expanded">
						<div class="grid-x grid-padding-x">
							<table data-form="deleteForm">
								<tr style="border: 1px solid #fff;">
									<td style="border: 1px solid #fff;">
										<form method="POST" action="/admin/product/{{$product->id}}/delete" class="delete-item">
												<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
												<button type="submit" class="button alert">Delete Product</button>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>
			</div>
	</div>

	@include('includes.delete-modal')
@endsection