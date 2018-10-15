<div class="row expanded column">

	<?php if(isset($errors) && count($errors) || \App\Classes\Session::has('error')): ?>
		<div class="callout alert" data-closable>
		<?php if(\App\Classes\Session::has('error')): ?>
			<?php echo e(\App\Classes\Session::flash('error')); ?>

		<?php else: ?>
			<?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $error_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo e($error_item); ?><br>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
			<button class="close-button" arial-label="Dismiss Message" type="button" data-close>
				<span arial-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>	

	<?php if(isset($success) || \App\Classes\Session::has('success')): ?>
		<div class="callout success" data-closable>
			<?php if(isset($success)): ?>
				<?php echo e($success); ?>

			<?php elseif(\App\Classes\Session::has('success')): ?>
				<?php echo e(\App\Classes\Session::flash('success')); ?>

			<?php endif; ?>
			<button class="close-button" arial-label="Dismiss Message" type="button" data-close>
				<span arial-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>	
</div>