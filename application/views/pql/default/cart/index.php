<div>
	<div class="b_top">
		<h2><a href="/cart"><?= wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) ?></a></h2>
	</div>
	<br>
	<?php $c->view('cart/components/cart', $data); ?>
</div>