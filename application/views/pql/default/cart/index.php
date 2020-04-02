<div>
<div class="b_top">
	<h2><a href="/cart"><?= wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) ?></a></h2>
</div>
<br>
<?php
$post_index = 0;
?>
<div class="order-table">
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
			<td class="text-center"><button onclick="update_to_cart('<?= $product['sku']?>'); return false;">Cập nhật</button> <button onclick="delete_to_cart('<?= $product['sku']?>'); return false;">Xóa</button></td>
		</tr>
      <?php endforeach;?>
		<?php if(!count($cart_items)):?>
		<tr>
			<td colspan="6"><p style="padding: 15px;">Không có sản phẩm nào trong giỏ hàng! Quay lại <a href="/<?= $language?>">trang chủ</a></p></td>
		</tr>
		<?php endif;?>
</table>
</div>
<?php if(count($cart_items)):?>
<div class="b_top">
	<h2><a href="/cart"><?= wpglobus('{:vi}Thông tin đặt hàng{:}{:en}Order Information{:}', $language) ?></a></h2>
</div>
<br>
<form class="order_form" id="order_information">
	<div class="form-group">
		<div class="form-item">
			<label>Họ và tên (*)</label>
			<div class="form-input">
				<input name="name" id="customer_name" />
			</div>
		</div>
		<div class="form-item">
			<label>Số điện thoại (*)</label>
			<div class="form-input">
			<input name="name" id="customer_phone" />
			</div>
		</div>
		<div class="form-item">
			<label>Email</label>
			<div class="form-input">
			<input name="email"  id="customer_email" />
			</div>
		</div>
	</div>
	<div class="form-item">
		<label>Nội dung</label>
		<div class="form-input">
		<textarea name="content" id="customer_content"></textarea>
		</div>
	</div>
	<div class="form-buttons">
		<input type="button" value="Đặt hàng" onclick="place_order(); return false;">
	</div>
</form>
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

	function place_order() {
		var name = $('#customer_name').val();
		var phone = $('#customer_phone').val();
		var email = $('#customer_email').val();
		var content = $('#customer_content').val();
		if(name == '') {
			return alert('Vui lòng nhập họ và tên');
		}
		if(phone == '') {
			return alert('Vui lòng nhập số điện thoại');
		}
		if(email == '') {
			return alert('Vui lòng nhập email');
		}
		if(content == '') {
			return alert('Vui lòng nhập nội dung');
		}
		$.ajax({
			url: '/cart/placeorder',
			data: {
				name: name,
				phone: phone,
				email: email,
				content: content
			},
			type: 'post', success: function() {
				alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn sớm nhất có thể!');
				window.location.reload();
			}
		});
	}
</script>

<style>
	.order-table {
		padding: 15px;
	}
	.order_form {
		padding: 15px;
		width: 75%;
		margin: 0 auto;
	}

	.order_form .form-group::after {
		display: block;
		clear:both;
		content: '';
	}
	.order_form .form-group .form-item {
		float: left;
		width: 30%;
		padding: 1%;
	}
	.form-input textarea, .form-input input {
		width: 100%;
		padding: 5px;
	}
	.form-input textarea {
		height: 80px;
	}

	.form-buttons button, .form-buttons input {
		padding: 10px 25px;
		background: #0269b6;
		color: #fff;
		border: none;
	}
</style>