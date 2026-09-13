<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Table_model $table_model
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Home extends MY_Controller
{

	public function index()
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$data = [];
		$data['luyen_tu_va_cau'] = $table_model->rows([
			'table' => 'categories',
			'where' => [
				'parent' => 169,
				'status' => 1,
				'software' => $this->app('software_id')
			],
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
		$data['mo_rong_von_tu'] = $table_model->rows([
			'table' => 'categories',
			'where' => [
				'parent' => 171,
				'status' => 1,
				'software' => $this->app('software_id')
			],
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
		$data['tap_lam_van'] = $table_model->rows([
			'table' => 'categories',
			'where' => [
				'parent' => 173,
				'status' => 1,
				'software' => $this->app('software_id')
			],
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
		$data['tap_doc_hieu'] = $table_model->rows([
			'table' => 'categories',
			'where' => [
				'parent' => 277,
				'status' => 1,
				'software' => $this->app('software_id')
			],
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
		$data['de_thi_tong_hop'] = $table_model->rows([
			'table' => 'categories',
			'where' => [
				'parent' => 174,
				'status' => 1,
				'software' => $this->app('software_id')
			],
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
		$this->render('home', $data);
	}

	/**
	 * @param string $alias
	 */
	public function route($alias)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$row = $table_model->row([
			'table' => 'categories',
			'where' => [
				'alias' => $alias,
				'software' => $this->app('software_id')
			]
		]);
		if ($row) {
			if (strpos($row['router'], 'lecture/luyentuvacau') !== false) {
				$routes = explode('/', $row['router']);
				$main_id = $routes[2];
				$items = $table_model->rows([
					'table' => 'categories',
					'where' => [
						'parents like ' => "%,$main_id,%",
						'software' => $this->app('software_id'),
						'status' => 1
					],
					'orderBy' => 'ordering',
					'orderDir' => 'asc'
				]);
				$items = buildTree($items, $main_id);
				return $this->render('page/luyentuvacau', compact('row', 'items'));
			}
			if ($row['router'] == 'lecture/detail') {
				$parentId = $row['parent'];
				$others = $table_model->rows([
					'table' => 'categories',
					'where' => [
						'parent' => $parentId,
						'software' => $this->app('software_id'),
						'status' => 1
					],
					'orderBy' => 'ordering',
					'orderDir' => 'asc'
				]);
				$sections = $table_model->rows([
					'table' => 'categories',
					'where' => [
						'router like ' => '%lecture%',
						'software' => $this->app('software_id'),
						'status' => 1,
						'display' => 1,
					],
					'orderBy' => 'ordering',
					'orderDir' => 'asc'
				]);
				$sections = buildTree($sections, 0);

				return $this->render('page/detail', compact('row', 'others', 'sections'));
			}
			if ($row['router'] == 'news/index') {
				$newsList = $table_model->rows([
					'table' => 'news',
					'where' => [
						'categoryId' => $row['id'],
						'status' => 1,
						'software' => $this->app('software_id')
					],
					'orderBy' => 'id'
				]);
				$this->render($row['router'], [
					'category' => $row,
					'newsList' => $newsList
				]);
			}
		}
		$row = $table_model->row([
			'table' => 'news',
			'where' => [
				'alias' => $alias,
				'software' => $this->app('software_id')
			]
		]);
		if ($row) {
			$newsList = $table_model->rows([
				'table' => 'news',
				'where' => [
					'categoryId' => $row['categoryId'],
					'status' => 1,
					'software' => $this->app('software_id'),
					'id != ' => $row['id']
				],
				'orderBy' => 'id',
				'offset' => 5
			]);
			$this->render('news/detail', ['news' => $row, 'newsList' => $newsList]);
		}
	}

	public function login_callback()
	{
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

	public function logout()
	{
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
