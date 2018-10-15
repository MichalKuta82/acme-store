<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
				  <title>Ecommerce Website - <?php echo $__env->yieldContent('title'); ?></title>
				  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				  	<link rel="stylesheet" type="text/css" href="/css/all.css">
				  	<script src="https://use.fontawesome.com/982ce8729b.js"></script>
				  	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
				</head>
				<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">

				  
				    <?php echo $__env->yieldContent('body'); ?>
					<script async type="text/javascript" src="/js/all.js"></script>
					<?php echo $__env->yieldContent('stripe-checkout'); ?>
				</body>
				</html>
