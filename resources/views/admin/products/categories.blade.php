@extends('admin.layout.base')
@section('title','Products Categories')
@section('data-page-id','adminCategories')

@section('content')
	<div class="category">
		<div class="row expanded">
			<h2>Products Categories</h2>
		</div>
		@include('includes.message')
		<div class="row expanded">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 medium-6">
					<form action="" method="post">
						<div class="input-group">
							<input type="text"  class="input-group-field" placeholder="Search by name">
							<div class="input-group-button">
								<input type="submit" class="button" value="Search">
							</div>
						</div>
					</form>
				</div>
				
				<div class="cell small-12 medium-5">
					<form action="/admin/product/categories" method="post">
						<div class="input-group">
							<input type="text"  class="input-group-field" name="name" placeholder="Category Name">
							<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
							<div class="input-group-button">
								<input type="submit" class="button" value="Create">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row expanded">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 medium-11">
						@if(count($categories))
						<table class="hover unstriped" border="1" data-form="deleteForm">
							<thead>
								<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>DateCreated</th>
								<th width="80">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $category)
								<tr>
									<td>{{ $category['name'] }}</td>
									<td>{{ $category['slug'] }}</td>
									<td>{{ $category['added'] }}</td>
									<td width="80" class="text-right">
										<span data-tooltip tabindex="1" title="Add Category" class="has-tip top">
											<a data-open="add-subcategory-{{$category['id']}}"><i class="fa fa-plus"></i></a>
										</span>
										<span data-tooltip tabindex="1" title="Edit Category" class="has-tip top">
											<a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
										</span>
										<span style="display: inline-block;" data-tooltip tabindex="1" title="Delete Category" class="has-tip top">
											<form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
												<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
												<button type="submit"><i class="fa fa-times delete"></i></button>
											</form>
										</span>
    
                                            <!--Edit category modal-->
                                           	<div class="reveal" id="item-{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Edit Category</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="item-name-{{$category['id']}}" value="{{ $category['name'] }}" name="name">
														<div>
															<input type="submit" name="token" class="button update-category" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Update" id="{{$category['id']}}">
														</div>
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>

											<!--Add subcategory modal-->
                                           	<div class="reveal" id="add-subcategory-{{$category['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Add Subcategory</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="subcategory-name-{{$category['id']}}">
														<div>
															<input type="submit" name="token" class="button add-subcategory" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Create" id="{{$category['id']}}">
														</div>
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>
                                        </td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $links !!}
						@else
							<h2>You have not created any category</h2>
						@endif
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div class="subcategory">
		<div class="row expanded">
			<h2>Subcategories</h2>
		</div>

			<div class="row expanded">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 medium-11">
						@if(count($subcategories))
						<table class="hover unstriped" border="1" data-form="deleteForm">
							<thead>
								<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>DateCreated</th>
								<th width="50">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($subcategories as $subcategory)
								<tr>
									<td>{{ $subcategory['name'] }}</td>
									<td>{{ $subcategory['slug'] }}</td>
									<td>{{ $subcategory['added'] }}</td>
									<td width="50" class="text-right">
										<span data-tooltip tabindex="1" title="Edit Subcategory" class="has-tip top">
											<a data-open="item-subcategory-{{$subcategory['id']}}"><i class="fa fa-edit"></i></a>
										</span>
										<span style="display: inline-block;" data-tooltip tabindex="1" title="Delete Subcategory" class="has-tip top">
											<form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
												<input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
												<button type="submit"><i class="fa fa-times delete"></i></button>
											</form>
										</span>
    
                                            <!--Edit subcategory modal-->
                                           	<div class="reveal" id="item-subcategory-{{$subcategory['id']}}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Edit Subcategory</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="item-subcategory-name-{{$subcategory['id']}}" value="{{ $subcategory['name'] }}">
													</div>
													<div class="input-group">
														<label>Change Category
															<select id="item-category-{{ $subcategory['category_id'] }}">
																@foreach(\App\Models\Category::all() as $category)
																	@if($category->id == $subcategory['category_id'])
																		<option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
																	@endif
																		<option value="{{ $category->id }}">{{ $category->name }}</option>
																@endforeach
															</select>
														</label>
													</div>
													<div class="input-group">
														<input type="submit" data-category-id="{{$subcategory['category_id']}}" class="button update-subcategory" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Update" id="{{$subcategory['id']}}">
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>
                                        </td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $subcategories_links !!}
						@else
							<h2>You have not created any subcategory</h2>
						@endif
					</div>	
				</div>
			</div>
		</div>
	</div>

	@include('includes.delete-modal')
@endsection