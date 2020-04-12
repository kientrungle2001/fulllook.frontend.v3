<?php
$controller->load->model('pql/terms_model', 'terms_model');
$terms_model = $controller->terms_model;

#
$roots = $terms_model->get_roots();
?>
<?php foreach ($roots as $root) :
	if ($root['term_id'] == 1) {
		continue;
	}
	$children = $terms_model->get_children($root['term_id']);
	?>
	<option value="<?= $root['term_taxonomy_id'] ?>"><?= str_repeat('&nbsp;', 4) ?><?= wpglobus($root['name'], $language) ?></option>
	<?php foreach ($children as $child) :
		
		?>
		<option value="<?= $child['term_taxonomy_id'] ?>"><?= str_repeat('&nbsp;', 8) ?><?= wpglobus($child['name'], $language) ?></option>
		<?php
		if(0): 
		$sub_children = $terms_model->get_children($child['term_id']);
		foreach ($sub_children as $sub_child) : ?>
			<option value="<?= $sub_child['term_taxonomy_id'] ?>"><?= str_repeat('&nbsp;', 12) ?><?= wpglobus($sub_child['name'], $language) ?></option>
			<?php 
			
			$sub2_children = $terms_model->get_children($sub_child['term_id']);
			foreach ($sub2_children as $sub2_child) : ?>
				<option value="<?= $sub2_child['term_taxonomy_id'] ?>"><?= str_repeat('&nbsp;', 16) ?><?= wpglobus($sub2_child['name'], $language) ?></option>
			<?php endforeach;
			 ?>
		<?php endforeach;
		endif; ?>
	<?php endforeach; ?>
<?php endforeach; ?>