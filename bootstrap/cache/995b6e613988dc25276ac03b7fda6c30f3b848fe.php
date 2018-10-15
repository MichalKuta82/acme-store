<?php $__env->startSection('title', 'Login To Your Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
	<div class="auth" id="auth">
		<section class="login_form">
			<div class="small-12 medium-7 medium-centered">
				<h2 class="text-center">Login</h2>
				<?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<form action="/login" method="post">

					<input type="text" name="username" placeholder="Your Username Or Email" value="<?php echo e(\App\Classes\Request::old('post','username')); ?>">

					<input type="password" name="password" placeholder="Your Password">

					<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">

					<button class="button float-right">Login</button>
				</form>
				<p>Not Yet A Member? <a href="/register">Register Here</a></p>
			</div>
		</section>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>