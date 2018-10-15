<?php $__env->startSection('title', 'Your Shopping Cart'); ?>
<?php $__env->startSection('data-page-id', 'cart'); ?>
<?php $__env->startSection('stripe-checkout'); ?>
	<script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="shopping_cart" id="shopping_cart">
		<div class="text-center">
			<img v-show="loading" src="/images/loading.gif">	
		</div>

		<section class="items" v-if="loading == false">
			<div class="row">
				<div class="small-12">
					<h2 v-if="fail" v-text="message"></h2>
					<div v-else>
						<h2>Your Cart</h2>
						<table class="hover unstriped">
							<thead class="text-left">
								<tr>
									<th>#</th>
									<th>Product Name</th>
									<th>($) Unit Price</th>
									<th>Qty</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="item in items">
									<td class="medium-text-center">
										<a :href="'/product/' + item.id"></a><img :src="'/' + item.image" height="60" width="60" alt="item.name">
									</td>
									<td>
										<h5><a :href="'/product/' + item.id">{{item.name}}</a></h5>
										Status: 
											<span v-if="item.stock > 1" style="color: #00AA00;">
												In Stock
											</span>
											<span v-else style="color: #ff0000;">
												Out Of Stock
											</span>
									</td>
									<td>
										{{item.price}}
									</td>
									<td>
										{{item.quantity}}
										<button v-if="item.stock > item.quantity" @click="updateQuantity(item.id, '+')" class="success" style="cursor: pointer; color: #00AA00">
											<i class="fa fa-plus-square" aria-hidden="true"></i>
										</button>
										<button v-if="item.quantity > 1" @click="updateQuantity(item.id, '-')" class="warning" style="cursor: pointer; color: #ff0000">
											<i class="fa fa-minus-square" aria-hidden="true"></i>
										</button>
									</td>
									<td>
										{{item.total}}
									</td>
									<td class="text-center">
										<button @click="removeItem(item.index)" type="button">
											<i class="fa fa-times" aria-hidden="true"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>

						<table>
							<tr>
								<td valign="top">
									<div class="input-group">
										<input type="text" name="cupon" class="input-group-field" placeholder="Cupon Code">
										<div class="input-group-button">
											<button type="button" class="button">Apply</button>
										</div>
									</div>
								</td>
								<td>
									<table class="unstriped">
										<tr>
											<td><h6>Subtotal:</h6></td>
											<td class="text-right"><h6>${{cartTotal}}</h6></td>
										</tr>
										<tr>
											<td><h6>Discount Amount:</h6></td>
											<td class="text-right"><h6>$0.00</h6></td>
										</tr>
										<tr>
											<td><h6>Tax:</h6></td>
											<td class="text-right"><h6>$0.00</h6></td>
										</tr>
										<tr>
											<td><h6>Total:</h6></td>
											<td class="text-right"><h6>${{cartTotal}}</h6></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>

						<div class="float-right">
							<a href="/" class="button secondary">
								Continue Shopping &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
							<button @click.prevent="checkout" v-if="authenticated" class="button success">
								Checkout &nbsp;<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							</button>
							<span v-else>
								<a href="/login" class="button success">
									Checkout &nbsp;<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
								</a>
							</span>
							<span id="properties" class="hide" data-customer-email="<?php echo e(user()->email); ?>" data-stripe-key="<?php echo e(\App\Classes\Session::get('publishable_key')); ?>">
								
							</span>
						</div>
						<div class="float-left">
							<button @click="removeAllItems()" type="button" class="button primary">
								Empty Cart &nbsp;<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>
			</div>		
		</section>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>