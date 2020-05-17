<div>
	<div class="b_top">
		<h2><a href="/cart"><?= wpglobus('{:vi}Thanh toán{:}{:en}Checkout{:}', $language) ?></a></h2>
	</div>
	<br>
  <?php
  $data['checkout_mode'] = true;
  ?>
  <?php $c->view('cart/components/cart', $data); ?>
	<?php $c->view('cart/components/checkout', $data); ?>
</div>