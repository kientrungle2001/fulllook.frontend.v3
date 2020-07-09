<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends MY_Controller
{
  public function login() {
    $jsonArray = json_decode($this->input->raw_input_stream, true);
    $email = $jsonArray['email'];
    $password = $jsonArray['password'];
    if($email == 'kientrungle2001@gmail.com' && $password=='kienkien') {
      return $this->json([
        'success' => true,
        'message' => 'Đăng nhập thành công',
        'token' => md5($email.$password)
      ]);
    }
    return $this->json([
      'message' => 'Email hoặc mật khẩu không đúng.',
      'success' => false
    ], '404');
  }
}