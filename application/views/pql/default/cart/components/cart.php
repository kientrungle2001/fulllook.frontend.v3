<?php
$post_index = 0;
if(!isset($checkout_mode)) $checkout_mode = false; 
?>
<div class="order-table">
  <table class="product-price-table">
    <tr>
      <th>STT</th>
      <th>Sản phẩm</th>
      <th>Đơn giá</th>
      <th>Tình trạng</th>
      <th>Số lượng</th>
      <?php if(!$checkout_mode):?>
      <th>Cập nhật</th>
      <?php endif;?>
    </tr>
    <?php
    $cart_items = $c->session->cart_items;
    if (!$cart_items) $cart_items = [];
    ?>
    <?php foreach ($cart_items as $index => $product) : ?>
      <tr class="product-price-row">
        <td><?= $index + 1 ?></td>
        <td>
          <a href="<?= $product['link'] ?>" class="product-image">
            <img title="<?= $product['name'] ?>" src="<?= $product['image'] ?>" width="64" height="auto"" border=" 0" class="u-photo">
          </a>
          <div class="product-info text-left">
            <h2><a href="<?= $product['link'] ?>" class="name_cate2 p-name"><?= $product['name'] ?></a></h2>
            <p>Thương hiệu: <?= $product['brand'] ?></p>
          </div>

          <div class="clear"></div>
        </td>
        <td><?= @$product['price'] ?></td>
        <td><?= @$product['stock'] ?></td>
        <td class="text-center">
        <?php if(!$checkout_mode):?>
        <input id="quantity-<?= $product['sku'] ?>" type="text" size="5" name="quantity" class="input product-quantity" style="width: 80%" value="<?= $product['qty'] ?>">
        <?php else: ?>
        <?= $product['qty']?>
        <?php endif;?>
        </td>
        <?php if(!$checkout_mode):?>
        <td class="text-center"><button onclick="update_to_cart('<?= $product['sku'] ?>'); return false;" class="btn">Cập nhật</button> <button onclick="delete_to_cart('<?= $product['sku'] ?>'); return false;" class="btn">Xóa</button></td>
        <?php endif;?>
      </tr>
    <?php endforeach; ?>
    <?php if (!count($cart_items)) : ?>
      <tr>
        <td colspan="6">
          <p style="padding: 15px;">Không có sản phẩm nào trong giỏ hàng! Quay lại <a href="/<?= $language ?>">trang chủ</a></p>
        </td>
      </tr>
    <?php endif; ?>
  </table>
  <?php if(!$checkout_mode):?>
  <div class="text-right cart-checout-btns">
      <a href="<?= $links_model->get_language_link($language, '/cart/checkout')?>" class="btn btn-checkout"><?= wpglobus('Thanh toán[[language]]Checkout', $language)?></a>
  </div>
  <?php endif; ?>
</div>

<script>
	function update_to_cart(sku) {
		var quantity = parseFloat($('#quantity-' + sku).val());
		$.ajax({
			url: '/cart/update',
			type: 'post', dataType: 'json',
			data: {
				sku: sku,
				quantity: quantity
			},
			success: function() {
				alert('Đã cập nhật giỏ hàng thành công');
				window.location.reload();
			}
		});
	}
	function delete_to_cart(sku) {
		$.ajax({
			url: '/cart/remove', type: 'post', dataType: 'json',
			data: {
				sku: sku
			},
			success: function() {
				alert('Đã cập nhật giỏ hàng thành công');
				window.location.reload();
			}
		});
	}
</script>
