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
			<td class="text-center"><input id="quantity-<?= $product['sku']?>" type="text" size="5" name="quantity" class="input product-quantity" style="width: 80%" value="<?= $product['qty']?>"></td>
			<td class="text-center"><button onclick="update_to_cart('<?= $product['sku']?>'); return false;" class="btn">Cập nhật</button> <button onclick="delete_to_cart('<?= $product['sku']?>'); return false;" class="btn">Xóa</button></td>
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
<div class="order_billing_information">
<div class="order_left">
<form class="order_form" id="order_information">
	<div class="form-group">
		<div class="form-item">
			<label>Họ và tên (*)</label>
			<div class="form-input">
				<input name="customer_name" id="customer_name" />
			</div>
		</div>
		<div class="form-item">
			<label>Số điện thoại (*)</label>
			<div class="form-input">
			<input name="customer_phone" id="customer_phone" />
			</div>
		</div>
		<div class="form-item">
			<label>Địa chỉ (*)</label>
			<div class="form-input">
			<input name="customer_address" id="customer_address" />
			</div>
		</div>
		<div class="form-item">
			<label>Tỉnh thành (*)</label>
			<div class="form-input">
			<input name="customer_city" id="customer_city" />
			</div>
		</div>
		<div class="form-item">
			<label>Email (*)</label>
			<div class="form-input">
			<input name="email"  id="customer_email" />
			</div>
		</div>
	</div>
	<div class="form-item">
		<label>Nội dung lời nhắn (*)</label>
		<div class="form-input">
		<textarea name="content" id="customer_content"></textarea>
		</div>
	</div>
	<div class="form-buttons">
		<input type="button" value="Đặt hàng" onclick="place_order(); return false;">
	</div>
</form>
</div>
<div class="order_right">
	<h2>Hình thức thanh toán</h2>
	<ol>
		<li><input type="radio" name="payment_method" value="bank" id="payment_method_bank"> <label for="payment_method_bank">Chuyển khoản ngân hàng</label>
		<div>
				<?= $options_model->get_option_tree('bank_info')?>
		</div>
		</li>
		<li>
		<input type="radio" name="payment_method" value="money" id="payment_method_money"> <label for="payment_method_money">Thanh toán trực tiếp</label>
		<div>
		<p><?= $options_model->get_option_tree('company_name')?></p>
		<p><?= wpglobus('{:vi}Địa chỉ{:}{:en}Address{:}', $language)?>: <?= $options_model->get_option_tree('address')?></p>
		<p><?= wpglobus('{:vi}VPDD{:}{:en}Office{:}', $language)?>: <?= $options_model->get_option_tree('office_address')?></p>
		<p>Tel: <?= $options_model->get_option_tree('tel')?> - Fax: <?= $options_model->get_option_tree('fax')?></p>
		<p>Email: <?= $options_model->get_option_tree('email')?></p>
		<p><?= wpglobus('{:vi}Mã số thuế{:}{:en}Tax Code{:}', $language)?>: <?= $options_model->get_option_tree('tax_code')?></p>
		<p><?= wpglobus('{:vi}Số ĐKKD{:}{:en}Business Number{:}', $language)?>: <?= $options_model->get_option_tree('business_number')?></p>
		<p><?= $options_model->get_option_tree('business_author')?></p>
		</div>
		</li>
	</ol>
</div>
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

	function place_order() {
		var name = $('#customer_name').val();
		var phone = $('#customer_phone').val();
		var address = $('#customer_address').val();
		var city = $('#customer_city').val();
		var email = $('#customer_email').val();
		var content = $('#customer_content').val();
		var payment_method = $('[name=payment_method]:checked').val();
		if(name == '') {
			return alert('Vui lòng nhập họ và tên');
		}
		if(phone == '') {
			return alert('Vui lòng nhập số điện thoại');
		}
		if(address == '') {
			return alert('Vui lòng nhập địa chỉ');
		}
		if(city == '') {
			return alert('Vui lòng nhập tỉnh thành');
		}
		if(email == '') {
			return alert('Vui lòng nhập email');
		}
		if(content == '') {
			return alert('Vui lòng nhập nội dung');
		}
		if(!payment_method || payment_method == '') {
			return alert('Vui lòng chọn hình thức thanh toán');
		}
		$.ajax({
			url: '/cart/placeorder',
			data: {
				name: name,
				phone: phone,
				address: address,
				city: city,
				email: email,
				content: content,
				payment_method: payment_method
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
		width: 100%;
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

	.order_billing_information::after {
		display: block;
		content: '';
		clear: both;
	}

	.order_billing_information .order_left,
	.order_billing_information .order_right {
		float: left;
		width: 50%;
		padding: 15px;
		margin: -15px;
	}
</style>