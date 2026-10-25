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
		$data = [];
		$data['luyen_tu_va_cau'] = $this->getSubCategories(169);
		$data['mo_rong_von_tu'] = $this->getSubCategories(171);
		$data['tap_lam_van'] = $this->getSubCategories(173);
		$data['tap_doc_hieu'] = $this->getSubCategories(277);
		$data['de_thi_tong_hop'] = $this->getSubCategories(174);
		$this->render('home', $data);
	}

	/**
	 * @param string $alias
	 */
	public function route($alias, $alias2 = null, $alias3 = null)
	{
		if ($alias2)
			$alias .= '/' . $alias2;
		if ($alias3)
			$alias .= '/' . $alias3;
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$row = $this->getCategoryByAlias($alias);
		if ($row) {
			$row['router'] = trim($row['router'], '/') . '/' . $row['id'];
			$routes = explode('/', $row['router']);
			$main_id = $routes[2];
			if (strpos($row['router'], 'lecture/luyentuvacau') !== false) {
				$items = $this->getAllSubCategories($main_id);
				$items = buildTree($items, $main_id);
				return $this->render('page/luyentuvacau', compact('row', 'items'));
			}
			if (strpos($row['router'], 'lecture/morongvontu') !== false) {
				$items = $this->getSubCategories($main_id, 1);
				return $this->render('page/morongvontu', compact('row', 'items'));
			}
			if (strpos($row['router'], 'lecture/tapdochieu') !== false) {
				$semester_id = $routes[3];
				$main = $table_model->row([
					'table' => 'categories',
					'where' => ['id' => $main_id]
				]);
				$items = $this->getAllSubCategories($main_id);
				$items = buildTree($items, $main_id);
				if ($semester_id == $main_id) {
					$semester_id = $items[0]['id'];
				}
				return $this->render('page/tapdochieu', compact('row', 'main', 'items', 'routes', 'semester_id'));
			}
			if (strpos($row['router'], 'lecture/taplamvan') !== false) {
				$items = $this->getAllSubCategories($main_id, 1);
				$items = buildTree($items, $main_id);
				return $this->render('page/taplamvan', compact('row', 'items'));
			}
			if (strpos($row['router'], 'lecture/detail') !== false) {
				$parentId = $row['parent'];
				$others = $this->getSubCategories($parentId);
				$sections = $this->getAllLectureSubCategories();
				$sections = buildTree($sections, 0);

				return $this->render('page/detail', compact('row', 'others', 'sections'));
			}
			if ($row['router'] == 'news/index') {
				$newsList = $this->getNewsList($row['id']);
				return $this->render($row['router'], [
					'category' => $row,
					'newsList' => $newsList
				]);
			}
			echo '<pre>';
			echo json_encode($row, JSON_PRETTY_PRINT);
		}
		$row = $this->getNewsByAlias($alias);
		if ($row) {
			$newsList = $this->getNewsList($row['categoryId'], $row['id'], 5);
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

	protected function getSubCategories($categoryId, $display = null)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$where = [
			'parent' => $categoryId,
			'status' => 1,
			'software' => $this->app('software_id')
		];
		if (null !== $display) {
			$where['display'] = $display;
		}
		return $table_model->rows([
			'table' => 'categories',
			'where' => $where,
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
	}

	protected function getAllSubCategories($categoryId, $display = null)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$where = [
			'parents like ' => "%,$categoryId,%",
			'software' => $this->app('software_id'),
			'status' => 1
		];
		if (null !== $display) {
			$where['display'] = $display;
		}
		return $table_model->rows([
			'table' => 'categories',
			'where' => $where,
			'orderBy' => 'ordering',
			'orderDir' => 'asc'
		]);
	}

	protected function getAllLectureSubCategories()
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		return $table_model->rows([
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
	}

	protected function getCategoryByAlias($alias)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		return $table_model->row([
			'table' => 'categories',
			'where' => [
				'alias' => $alias,
				'software' => $this->app('software_id')
			]
		]);
	}

	protected function getNewsList($categoryId, $id = null, $offset = null)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		$where = [
			'categoryId' => $categoryId,
			'status' => 1,
			'software' => $this->app('software_id')
		];
		if (null !== $id) {
			$where['id != '] = $id;
		}
		$query = [
			'table' => 'news',
			'where' => $where,
			'orderBy' => 'id'
		];
		if (null !== $offset) {
			$query['ofsset'] = $offset;
		}
		return $table_model->rows($query);
	}

	protected function getNewsByAlias($alias)
	{
		/**
		 * @var Table_model
		 */
		$table_model = $this->table_model;
		return $table_model->row([
			'table' => 'news',
			'where' => [
				'alias' => $alias,
				'software' => $this->app('software_id')
			]
		]);
	}
}
