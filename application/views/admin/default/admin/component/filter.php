<?php $filters = $controller->filterFields; ?>
<!-- Filters -->
<div class="card">
	<div class="card-header bg-success text-white">Bộ lọc</div>
	<div class="card-body">
		<form>
			<div class="row">
				<?php foreach($filters as $filter):?>
				<div class="col-md-8">
					<?php $controller->view('admin/filter/' . $filter['type'], ['setting' => $filter])?>
				</div>
				<?php endforeach ?>
			</div>
		</form>
	</div>
</div>
<!-- End Filters -->