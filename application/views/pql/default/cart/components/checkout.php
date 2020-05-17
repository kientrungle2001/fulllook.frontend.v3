<?php $cart_items = $c->session->cart_items;
if (count($cart_items)) :
?>
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
              <input name="email" id="customer_email" />
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
            <?= $options_model->get_option_tree('bank_info') ?>
          </div>
        </li>
        <li>
          <input type="radio" name="payment_method" value="money" id="payment_method_money"> <label for="payment_method_money">Thanh toán trực tiếp</label>
          <div>
            <p><?= $options_model->get_option_tree('company_name') ?></p>
            <p><?= wpglobus('{:vi}Địa chỉ{:}{:en}Address{:}', $language) ?>: <?= $options_model->get_option_tree('address') ?></p>
            <p><?= wpglobus('{:vi}VPDD{:}{:en}Office{:}', $language) ?>: <?= $options_model->get_option_tree('office_address') ?></p>
            <p>Tel: <?= $options_model->get_option_tree('tel') ?> - Fax: <?= $options_model->get_option_tree('fax') ?></p>
            <p>Email: <?= $options_model->get_option_tree('email') ?></p>
            <p><?= wpglobus('{:vi}Mã số thuế{:}{:en}Tax Code{:}', $language) ?>: <?= $options_model->get_option_tree('tax_code') ?></p>
            <p><?= wpglobus('{:vi}Số ĐKKD{:}{:en}Business Number{:}', $language) ?>: <?= $options_model->get_option_tree('business_number') ?></p>
            <p><?= $options_model->get_option_tree('business_author') ?></p>
          </div>
        </li>
      </ol>
    </div>
  </div>
<?php endif; ?>

<script>
  function place_order() {
    var name = $('#customer_name').val();
    var phone = $('#customer_phone').val();
    var address = $('#customer_address').val();
    var city = $('#customer_city').val();
    var email = $('#customer_email').val();
    var content = $('#customer_content').val();
    var payment_method = $('[name=payment_method]:checked').val();
    if (name == '') {
      return alert('Vui lòng nhập họ và tên');
    }
    if (phone == '') {
      return alert('Vui lòng nhập số điện thoại');
    }
    if (address == '') {
      return alert('Vui lòng nhập địa chỉ');
    }
    if (city == '') {
      return alert('Vui lòng nhập tỉnh thành');
    }
    if (email == '') {
      return alert('Vui lòng nhập email');
    }
    if (content == '') {
      return alert('Vui lòng nhập nội dung');
    }
    if (!payment_method || payment_method == '') {
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
      type: 'post',
      success: function() {
        alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn sớm nhất có thể!');
        window.location.reload();
      }
    });
  }
</script>