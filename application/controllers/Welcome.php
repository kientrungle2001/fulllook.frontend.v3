<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->render('hello');
	}
	public function test() {
		$this->load->model('user');
		$start = microtime(true);
		#	
		$user = $this->user->get_one(2);
		#
		$username = $this->user->get_username($user);
		echo $username . '<br />';
		#
		$link = $this->user->get_link($user);
		echo $link . '<br />';
		#
		$registered = $this->user->get_formatted_registered($user);
		echo $registered . '<br />';
		#
		$end = microtime(true);
		echo ($end - $start) . 's';
		//echo json_encode($user);
	}

	public function mail() {
		echo 'Mail start<br />';
		$to = 'kientrungle2001@gmail.com';
		$from = 'kientrungle2001@gmail.com';
		$name = 'Anonymous';
		$subject = 'Test gửi mail';
		$content = 'Test gửi <strong>smtp</strong>';
		$this->load->library('email');

		/*
		$this->email->from($from, $name);
		$this->email->to($to);

		$this->email->subject($subject);
		$this->email->message($content);

		$this->email->send();
		*/
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'kientrungle2001@gmail.com';
		$config['smtp_pass']    = 'Kien102105';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validate'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);

		$this->email->from($from, $name);
		$this->email->to($to);
		$this->email->cc('kien.le.86.vn@gmail.com');

		$this->email->subject($subject);
		$this->email->message($content);

		$this->email->send();
		echo $this->email->print_debugger() . '<br />';


		echo 'Mail end';

	}
}