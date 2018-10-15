<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
	<div class="home">
		<h1>Homepage</h1>

		<section class="hero">
			<div class="hero-slider">
				<div>
					<img src="/images/sliders/slide_4.jpg" alt="Ecommerce Store">
				</div>
				<div>
					<img src="/images/sliders/slide_5.jpg" alt="Ecommerce Store">
				</div>
				<div>
					<img src="/images/sliders/slide_6.jpg" alt="Ecommerce Store">
				</div>
			</div>
		</section>

		<section class="display-products" data-token="<?php echo e($token); ?>" id="root">
			<div class="row medium-up-4">
				<h2>Featured Products</h2>
				<div  class="grid-x">
					<div class="small-12 medium-6 large-3 cell" v-cloak v-for="feature in featured">
						<a :href="'/product/' + feature.id">					
						 <!-- image has padding -->
							<div class="card" data-equalizer-watch>
							  <div class="card-section">
							    <img :src="'/' + feature.image_path" width="100%" height="200">
							  </div>
							  <div class="card-section">
							    <p>
							    	{{stringLimit(feature.name, 18)}}
							    </p>
							    <a :href="'/product/' + feature.id" class="button more expanded">
							    	See More
							    </a>
							    <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)" class="button cart expanded">
							    	${{feature.price}} - Add To Cart
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

			<div class="row medium-up-4">
				<h2>Product Picks</h2>
				<div  class="grid-x">
					<div class="small-12 medium-6 large-3 cell" v-cloak v-for="product in products">
						<a :href="'/product/' + product.id">					
						 <!-- image has padding -->
							<div class="card" data-equalizer-watch>
							  <div class="card-section">
							    <img :src="'/' + product.image_path" width="100%" height="200">
							  </div>
							  <div class="card-section">
							    <p>
							    	{{stringLimit(product.name, 18)}}
							    </p>
							    <a :href="'/product/' + product.id" class="button more expanded">
							    	See More
							    </a>
							    <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" class="button cart expanded">
							    	${{product.price}} - Add To Cart
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

			<div class="text-center">
				<img v-show="loading" src="/images/loading.gif" style="padding-bottom: 3rem; position: fixed; top: 60%; bottom: 20%;">
			</div>
		</section>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>