@extends('admin.layout.base')
@section('title','Create Products')
@section('data-page-id','adminProduct')

@section('content')
	<div class="add-product">
		<div class="row expanded">
			<div class="colum medium-11">
				<h2>Add Inventory Item</h2>
			</div>
			
		</div>
		@include('includes.message')

			<form method="post" action="/admin/product/create" enctype="multipart/form-data">
				<div class="small-12 medium-11">
					<div class="row expanded">
						<div class="grid-x grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Name :<input type="text" name="name" placeholder="Product Name" value="{{\App\Classes\Request::old('post', 'name')}}"></label>
							</div>
							<div class="small-12 medium-6 cell">
								<label>Product Price :<input type="text" name="price" placeholder="Product Price" value="{{\App\Classes\Request::old('post', 'price')}}"></label>
							</div>
						</div>
						<div class="grid-x  grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Category :
									<select name="category" id="product-category">
										<option value="{{\App\Classes\Request::old('post', 'category')?:""}}">
											{{\App\Classes\Request::old('post', 'category')?:"Select Category"}}
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
										<option value="{{\App\Classes\Request::old('post', 'subcategory') ? : ""}}">
											{{\App\Classes\Request::old('post', 'subcategory') ? : "Select Subcategory"}}
										</option>
									</select>
								</label>
							</div>
						</div>
						<div class="grid-x  grid-padding-x">
							<div class="small-12 medium-6 cell">
								<label>Product Qantity :
									<select name="quantity">
										<option value="{{\App\Classes\Request::old('post', 'quantity')?:""}}">
											{{\App\Classes\Request::old('post', 'quantity')?:"Select Quantity"}}
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
									<textarea name="description" placeholder="Description">{{\App\Classes\Request::old('post', 'description')}}</textarea>
								</label>
								<input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
								<button type="reset" class="button alert">Reset</button>
								<button type="submit" class="button success float-right">Save Product</button>
							</div>
						</div>
					</div>
				</div>
				
			</form>
	</div>

	@include('includes.delete-modal')
@endsection