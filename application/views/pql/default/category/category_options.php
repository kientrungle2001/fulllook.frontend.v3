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
	<option value="<?= $root['term_taxonomy_id'] ?>">|----<?= wpglobus($root['name'], $language) ?></option>
	<?php foreach ($children as $child) :
		$sub_children = $terms_model->get_children($child['term_id']);
		?>
		<option value="<?= $child['term_taxonomy_id'] ?>">|----|----<?= wpglobus($child['name'], $language) ?></option>
		<?php foreach ($sub_children as $sub_child) :
			$sub2_children = $terms_model->get_children($sub_child['term_id']); ?>
			<option value="<?= $sub_child['term_taxonomy_id'] ?>">|----|----|----<?= wpglobus($sub_child['name'], $language) ?></option>
			<?php foreach ($sub2_children as $sub2_child) : ?>
				<option value="<?= $sub2_child['term_taxonomy_id'] ?>">|----|----|----|----<?= wpglobus($sub2_child['name'], $language) ?></option>
			<?php endforeach; ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
<?php endforeach; ?>