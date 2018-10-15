<!DOCTYPE html>
<html lang="en">
<head>
  <title>Email Example</title>
</head>
<body>

<div class="container">
	
	<div style="text-align: center;width: 200px;margin: 0 auto;">
	  <img src="http://development.webmedia.ie/pat-a-mat.jpg" width="80" height="80" />
	</div>
	<h2>Hallo <?php echo user()->fullname; ?>,</h2>
	<p>Your order confirmation details: #<?php echo $data['order_no']; ?> </p>
	<table cellpadding="5" cellspacing="5" border="0" width="600" style="border:1px soli #0a0a0a;">
		<tr style="background-color: #000000; color: #ffffff;">
			<th style="text-align: left;">Product Name</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
		<?php foreach ($data['product'] as $item): ?> 
			<tr>
				<td width="400"><?php echo $item['name']; ?></td>
				<td width="100">$<?php echo $item['price']; ?></td>
				<td width="50"><?php echo $item['quantity']; ?></td>
				<td width="50">$<?php echo $item['total']; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<h4>Total Amount: $<?php echo $data['total']; ?></h4>
	  <p>
	  	We hope to see you agoain<br>
	  	<h2>Web Media</h2>
	  </p>

</div>

</body>
</html>
