@extends('layouts.app')
@section('title')
{{$product->name}}
@endsection
@section('data-page-id', 'product')

@section('content')
	<div class="product" id="product" data-token="{{$token}}" data-id="{{$product->id}}">
		<div class="text-center">
			<img v-show="loading" src="/images/loading.gif">	
		</div>
		<section class="item-container" v-if="loading == false">
			<div class="row column">
				<nav aria-label="You are here:" role="navigation">
				  <ul class="breadcrumbs">
				    <li><a :href="'/product/category/' + category.slug">@{{category.name}}</a></li>
				    <li><a :href="'/product/subcategory/' + subCategory.slug">@{{subCategory.name}}</a></li>
				    <li>@{{product.name}}</li>
				  </ul>
				</nav>	
			</div>

			<div class="row collapse grid-x">
				<div class="small-12 medium-5 large-4 cell">
					<div>
						<img :src="'/' + product.image_path" width="100%" height="200">
					</div>
				</div>
				<div class="small-12 medium-7 large-8 cell">
					<div class="product-details">
						<h2>@{{product.name}}</h2>
						<p>@{{product.description}}</p>
						<h2>$@{{product.price}}</h2>
						 <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart alert">
					    	Add To Cart
					    </button>
					    <button v-else class="button cart warning" disabled>
					    	Out Of Stock
					    </button>
					</div>
				</div>
			</div>
		</section>
		
		<section class="home" v-if="loading == false">
			<div class="display-products">
				<div class="row medium-up-4">
					<h2>Similar Products</h2>
					<div  class="grid-x">
						<div class="small-12 medium-6 large-3 cell" v-cloak v-for="similar in similarProducts">
							<a :href="'/product/' + similar.id">					
							 <!-- image has padding -->
								<div class="card" data-equalizer-watch>
								  <div class="card-section">
								    <img :src="'/' + similar.image_path" width="100%" height="200">
								  </div>
								  <div class="card-section">
								    <p>
								    	@{{stringLimit(similar.name, 15)}}
								    </p>
								    <a :href="'/product/' + similar.id" class="button more expanded">
								    	See More
								    </a>
									<button v-if="similar.quantity > 0" @click.prevent="addToCart(similar.id)" class="button cart alert expanded">
								    	$@{{similar.price}} - Add To Cart
								    </button>
								    <button v-else class="button warning expanded" disabled>
								    	Out Of Stock
								    </button>
								  </div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

@stop