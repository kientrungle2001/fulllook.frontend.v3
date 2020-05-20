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
            <label>Họ và tên: </label>
              <?= html_escape($c->session->checkout_info['name'])?>
          </div>
          <div class="form-item">
            <label>Số điện thoại: </label>
              <?= html_escape($c->session->checkout_info['phone'])?>
          </div>
          <div class="form-item">
            <label>Địa chỉ: </label>
              <?= html_escape($c->session->checkout_info['address'])?>
          </div>
          <div class="form-item">
            <label>Tỉnh thành: </label>
              <?= html_escape($c->session->checkout_info['city'])?>
          </div>
          <div class="form-item">
            <label>Email: </label>
              <?= html_escape($c->session->checkout_info['email'])?>
          </div>
        </div>
        <div class="form-item">
          <label>Nội dung lời nhắn:</label>
            <?= nl2br(html_escape($c->session->checkout_info['content']))?>
        </div>
        <div class="form-buttons">
          <input type="button" value="Thanh toán" onclick="place_order(); return false;">
          <input type="button" class="secondary" value="Quay lại" onclick="edit_checkout(); return false;">
        </div>
      </form>
    </div>
    <div class="order_right">
      <h2>Hình thức thanh toán</h2>
      <ol>
        <?php if($c->session->checkout_info['payment_method'] == 'bank'):?>
        <li><input type="radio" name="payment_method" value="bank" id="payment_method_bank" disabled <?= ($c->session->checkout_info['payment_method'] == 'bank') ? 'checked':''?>> <label for="payment_method_bank">Chuyển khoản ngân hàng</label>
          <div>
            <?= $options_model->get_option_tree('bank_info') ?>
          </div>
        </li>
        <?php endif; ?>
        <?php if($c->session->checkout_info['payment_method'] == 'money'):?>
        <li>
          <input type="radio" name="payment_method" value="money" id="payment_method_money" disabled <?= ($c->session->checkout_info['payment_method'] == 'money') ? 'checked':''?>> <label for="payment_method_money">Thanh toán trực tiếp</label>
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
        <?php endif;?>
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
      url: '/cart/save_order',
      type: 'post',
      success: function() {
        // alert('Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn sớm nhất có thể!');
        // window.location.reload();
        window.location = "<?= $links_model->get_language_link($language, '/cart/save_order')?>";
      }
    });

  }

  function edit_checkout() {
    window.location = "<?= $links_model->get_language_link($language, '/cart/checkout')?>";
  }
</script>