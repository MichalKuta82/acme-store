<?php $__env->startSection('body'); ?>

	<!-- navigation -->
	<?php echo $__env->make('includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- site wrapper -->
	<div class="site_wrapper">
		<?php echo $__env->yieldContent('content'); ?>

		<div class="notify text-center">
			
		</div>
	</div>
	<?php echo $__env->yieldContent('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>