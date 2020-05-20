<div>
	<div class="b_top">
		<h2><a href="/cart/confirm"><?= wpglobus('{:vi}Xác nhận thanh toán{:}{:en}Checkout Confirm{:}', $language) ?></a></h2>
	</div>
	<br>
  <?php
  $data['checkout_mode'] = true;
  ?>
  <?php $c->view('cart/components/cart', $data); ?>
	<?php $c->view('cart/components/confirm', $data); ?>
</div>