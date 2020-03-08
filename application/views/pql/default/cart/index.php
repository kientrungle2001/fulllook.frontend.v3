<div>
<div class="b_top">
	<h2><a href="/cart"><?= wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) ?></a></h2>
</div>
<br>
<?php
$post_index = 0;
?>
<table class="product-price-table">
			<tr>
				<th>STT</th>
				<th>Sản phẩm</th>
				<th>Đơn giá</th>
				<th>Tình trạng</th>
				<th>Số lượng</th>
				<th>Cập nhật</th>
			</tr>
      <?php
      $cart_items = $c->session->cart_items;
      if(!$cart_items) $cart_items = [];
      ?>
      <?php foreach($cart_items as $index => $product):?>
      <tr class="product-price-row">
			<td><?= $index + 1?></td>
			<td>
				<a href="<?= $product['link']?>" class="product-image">
					<img title="<?= $product['name']?>" src="<?= $product['image']?>" width="64" height="auto"" border="0" class="u-photo">
				</a>
				<div class="product-info text-left">
				<h2><a href="<?= $product['link']?>" class="name_cate2 p-name"><?= $product['name']?></a></h2>
				<p>Thương hiệu: <?= $product['brand']?></p>
				</div>
				
				<div class="clear"></div>
			</td>
			<td><?= @$product['price']?></td>
			<td><?= @$product['stock']?></td>
			<td class="text-center"><input id="quantity-<?= $product['sku']?>" type="text" size="5" name="quantity" class="product-quantity" style="width: 80%" value="<?= $product['qty']?>"></td>
			<td class="text-center"><button onclick="update_to_cart(<?= $product['sku']?>, '<?= html_escape($product['name'])?>', <?= @$product['price']?>); return false;">Cập nhật</button></td>
		</tr>
      <?php endforeach;?>
</table>
</div>