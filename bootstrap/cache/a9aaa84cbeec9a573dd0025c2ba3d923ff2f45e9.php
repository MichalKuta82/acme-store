<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
	<div class="dashboard">
		<div class="row expanded">
			<h2>Dashboard</h2>

			<form action="/admin" method="post" enctype="multipart/form-data">
				<input value="testing" name="product">
				<input type="file" name="image">
				<input type="submit" name="submit" value="Go">
			</form>


		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>