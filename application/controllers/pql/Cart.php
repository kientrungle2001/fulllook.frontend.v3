<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller
{
	public function index($language = 'vi')
	{
		$this->load->library('cart');
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name_short();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if (!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));
		$this->render('cart', $data);
	}
	public function addToCart($language = 'vi')
	{
		$data = array(
			'sku'      => $this->input->post('sku'),
			'qty'     => floatval($this->input->post('quantity')),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'image'    => $this->input->post('image'),
			'link'    => $this->input->post('link'),
			'stock'    => $this->input->post('stock'),
			'brand'    => $this->input->post('brand'),
		);

		$this->cart_insert($data);
		$this->summary();
	}
	public function update()
	{
		$data = array(
			'sku'      => $this->input->post('sku'),
			'qty'     => floatval($this->input->post('quantity'))
		);
		$this->cart_update($data);
		$this->summary();
	}
	public function remove()
	{
		$data = array(
			'sku'      => $this->input->post('sku'),
		);
		$this->cart_remove($data);
		$this->summary();
	}
	public function summary()
	{
		if (!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$rs = [
			'total_items' => count($this->session->cart_items),
			'total' => 0,
			'items' => $this->session->cart_items
		];
		echo json_encode($rs);
	}

	private function cart_insert($data)
	{
		if (!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$found = false;
		$cart_items = $this->session->cart_items;
		foreach ($cart_items as &$item) {
			if ($item['sku'] == $data['sku']) {
				$item['qty'] += $data['qty'];
				$found = true;
			}
		}

		if (!$found) {
			$cart_items[] = $data;
		}

		$this->session->cart_items = $cart_items;
	}

	private function cart_update($data)
	{
		if (!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$cart_items = $this->session->cart_items;
		$removeIndex = null;
		foreach ($cart_items as $index => &$item) {
			if ($item['sku'] == $data['sku']) {
				$item['qty'] = $data['qty'];
				if ($item['qty'] == 0) {
					$removeIndex = $index;
				}
			}
		}

		if (null !== $removeIndex) {
			array_splice($cart_items, $removeIndex, 1);
		}

		$this->session->cart_items = $cart_items;
	}

	private function cart_remove($data)
	{
		if (!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		$cart_items = $this->session->cart_items;
		$removeIndex = null;
		foreach ($cart_items as $index => &$item) {
			if ($item['sku'] == $data['sku']) {
				$removeIndex = $index;
			}
		}

		if (null !== $removeIndex) {
			array_splice($cart_items, $removeIndex, 1);
		}

		$this->session->cart_items = $cart_items;
	}

	public function placeorder()
	{
		if (!isset($this->session->cart_items)) {
			$this->session->cart_items = [];
		}
		if (count($this->session->cart_items)) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$content = $this->input->post('content');
			$payment_method = $this->input->post('payment_method');
			// $this->sendEmail($name, $email, $phone, $address, $city, $content, $payment_method, $this->session->cart_items);
			$this->saveCheckoutInfo($name, $email, $phone, $address, $city, $content, $payment_method, $this->session->cart_items);
		}
	}

	public function saveCheckoutInfo($name, $email, $phone, $address, $city, $content, $payment_method, $cart_items) {
		$this->session->checkout_info = [
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			'city' => $city,
			'content' => $content,
			'payment_method' => $payment_method
		];
	}
	public function sendEmail($name, $email, $phone, $address, $city, $content, $payment_method, $cart_items)
	{
		$emailContent = '<h1>Thông tin đơn hàng</h1>';
		$emailContent .= '<strong>Họ và tên</strong>: ' . html_escape($name)  . '<br />';
		$emailContent .= '<strong>Số điện thoại</strong>: ' . html_escape($phone) . '<br />';
		$emailContent .= '<strong>Địa chỉ</strong>: ' . html_escape($address) . '<br />';
		$emailContent .= '<strong>Tỉnh thành</strong>: ' . html_escape($city) . '<br />';
		$emailContent .= '<strong>Email</strong>: ' . html_escape($email) . '<br />';
		$emailContent .= '<strong>Nội dung</strong>:<br /> ' . nl2br(html_escape($content)) . '<br />';
		$emailContent .= '<strong>Hình thức thanh toán</strong>: ' . ($payment_method == 'bank' ? 'Chuyển khoản ngân hàng' : 'Thanh toán trực tiếp') . '<br />';
		$emailContent .= '<h2>Sản phẩm đã đặt</h2>';
		$emailContent .= '<table border=1 style="border-collapse: collapsed">';
		$emailContent .= '<tr>
		<th>STT</th>
		<th>Sản phẩm</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
	</tr>';
		foreach ($cart_items as $index => $product) {
			$emailContent .= '<tr>';
			$emailContent .= '<td>';
			$emailContent .= ($index + 1);
			$emailContent .= '</td>';
			$emailContent .= '<td>';
			$emailContent .= '<a href="' . $product['link'] . '" class="product-image">
			<img title="' . html_escape($product['name']) . '" src="' . $product['image'] . '" width="64" height="auto"" border="0" class="u-photo">
		</a>';
			$emailContent .= '<div class="product-info text-left">
			<h2><a href="' . $product['link'] . '" class="name_cate2 p-name">' . html_escape($product['name']) . '</a></h2>
			<p>Thương hiệu: ' . html_escape($product['brand']) . '</p>
			</div>';
			$emailContent .= '</td>';
			$emailContent .= '<td>';
			$emailContent .= html_escape(@$product['price']);
			$emailContent .= '</td>';
			$emailContent .= '<td>';
			$emailContent .= html_escape($product['qty']);
			$emailContent .= '</td>';
			$emailContent .= '</tr>';
		}
		$emailContent .= '</table>';
		$emailSubject = 'Đơn hàng mới: ' . html_escape($name) . ' - ' . html_escape($phone) . ' - ' . html_escape($email);
		$this->load->library('email');

		$email = $this->email;

		$config['protocol'] = 'sendmail';
		$config['mailPath'] = '/usr/sbin/sendmail';
		$config['charset']  = 'utf-8';
		$config['wordWrap'] = true;
		$config['mailtype'] = 'html';

		$email->initialize($config);

		$email->from('root@nextnobels.com', 'MOBO');
		$to_email = $this->options_model->get_option_tree('order_notification_email');
		if (!$to_email) {
			$to_email = 'kientrungle2001@gmail.com';
		}
		$email->to($to_email);

		$email->subject($emailSubject);
		$email->message($emailContent);

		if ($email->send()) {
			echo 'Your Email has successfully been sent.';
		} else {
			show_error($email->print_debugger());
		}
	}

	public function checkout($language = 'vi') {
		$this->load->library('cart');
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name_short();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if (!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Thanh toán{:}{:en}Checkout{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));
		$this->render('checkout', $data);
	}

	public function confirm($language = 'vi') {
		$this->load->library('cart');
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name_short();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if (!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Xác nhận thanh toán{:}{:en}Confirm Checkout{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));
		$this->render('confirm', $data);		
	}

	public function save_order($language = 'vi') {
		$cart_items = $this->session->cart_items;
		$checkout_info = $this->session->checkout_info;
		$this->db->insert([

		]);
	}

	public function success($language = 'vi') {

	}
}
