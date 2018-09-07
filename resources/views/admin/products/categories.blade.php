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
			<div class="grid-x grid-margin-x grid-padding-x">
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
				<div class="grid-x grid-margin-x grid-padding-x">
					<div class="cell small-12 medium-11">
						@if(count($categories))
						<table class="hover" border="1">
							<tbody>
								@foreach($categories as $category)
								<tr>
									<td>{{ $category['name'] }}</td>
									<td>{{ $category['slug'] }}</td>
									<td>{{ $category['added'] }}</td>
									<td>
											<a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        
                                        <!--Edit Category Modal -->
                                        <div class="reveal" id="item-{{$category['id']}}"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false">
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" name="name" value="{{ $category['name'] }}">
                                                </div>
                                                <div>
                                                        <input type="submit" class="button update-category"
                                                               id="{{$category['id']}}" 
                                                               data-token="{{ \App\Classes\CSRFToken::_token() }}"
                                                               value="Update">
                                                </div>
                                            </form>
                                            <a class="close-button" data-close aria-label="Close modal" type="button">
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
							<h3>You have not created any category</h3>
						@endif
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection