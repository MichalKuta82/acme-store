<?php $__env->startSection('title', 'Register Free Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
	<div class="auth" id="auth">
		<section class="register_form">
			<div class="small-12 medium-7 medium-centered">
				<h2 class="text-center">Create Account</h2>
				<?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<form action="/register" method="post">
					<input type="text" name="fullname" placeholder="Your Name" value="<?php echo e(\App\Classes\Request::old('post','fullname')); ?>">

					<input type="text" name="email" placeholder="Your Email Address" value="<?php echo e(\App\Classes\Request::old('post','email')); ?>">

					<input type="text" name="username" placeholder="Your Username" value="<?php echo e(\App\Classes\Request::old('post','username')); ?>">

					<input type="password" name="password" placeholder="Your Password">

					<textarea name="address" placeholder="Your Address"><?php echo e(\App\Classes\Request::old('post', 'address')); ?></textarea>

					<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">

					<button class="button float-right">Register</button>
				</form>
				<p>Already Registered? <a href="/login">Login Here</a></p>
			</div>
		</section>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>