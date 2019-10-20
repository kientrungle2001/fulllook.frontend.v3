<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->render('home');
	}

	public function test_schedule()
	{
		$this->render('home/test_schedule');
	}

	public function student()
	{
		$this->render('home/student');
	}

	public function teacher()
	{
		$this->render('home/teacher');
	}

	public function classes_outside()
	{
		$this->render('home/classes_outside');
	}

	public function student_fee()
	{
		$this->render('home/student_fee');
	}

	public function order()
	{
		$this->render('home/order');
	}

	public function login_callback() {
		$dataUser = $this->input->get();
		$this->session->username = $dataUser['username'];
		$this->session->phone = $dataUser['phone'];
		$this->session->email = $dataUser['email'];
		$this->session->name = $dataUser['name'];
		$this->session->userId = $dataUser['userId'];
		$this->session->checkPayment = $dataUser['checkPayment'];
		$this->session->paymentDate = $dataUser['paymentDate'];
		$this->session->expiredDate = $dataUser['expiredDate'];
		header('Location: /');
	}

	public function logout() {
		$this->session->username = null;
		$this->session->phone = null;
		$this->session->email = null;
		$this->session->name = null;
		$this->session->userId = null;
		$this->session->checkPayment = null;
		$this->session->paymentDate = null;
		$this->session->expiredDate = null;
		header('Location: /');
	}
}