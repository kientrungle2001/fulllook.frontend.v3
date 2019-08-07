<?php

$controller->load->model('pql/terms_model', 'terms_model');
$terms_model = $controller->terms_model;
/** var Links_model $links_model  */
$links_model = $controller->links_model;
if(0):
#
$roots = $terms_model->get_roots();
?>
<?php foreach ($roots as $root) :
	if ($root['term_id'] == 1) {
		continue;
	}
	$children = $terms_model->get_children($root['term_id']);
	?>
	<div class="list_cate_left">
		<a href="/san-pham/<?= $root['slug']?>" class="cate_far_left"><?= wpglobus($root['name'], $language) ?></a>
	</div>
	<?php foreach ($children as $child) :
		$sub_children = $terms_model->get_children($child['term_id']);
		?>
		<ul class="mega-menu right">
			<li><a href="/san-pham/<?= $child['slug']?>" class="dc-mega"><?= $child['name'] ?><span class="dc-mega-icon"></span></a>
				<div class="sub-container non-mega">
					<ul class="sub">
						<?php foreach ($sub_children as $sub_child) :
							$sub2_children = $terms_model->get_children($sub_child['term_id']); ?>
							<li><a href="/san-pham/<?= $sub_child['slug']?>"><?= $sub_child['name'] ?></a></li>
							<?php foreach ($sub2_children as $sub2_child) : ?>
								<li class="cate4"><a href="/san-pham/<?= $sub2_child['slug']?>"> + <?= $sub2_child['name'] ?></a></li>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	<?php endforeach; ?>

<?php endforeach;
endif;
?>

<?php
	
    //[ID] => 28
    //[_menu_item_menu_item_parent] => 27

# danh sach cach menu item cua mot menu
$menu_items = $controller->posts_model->get_nav_items(169);
# danh sach cac root items
$tree_menu_items = makeTree($menu_items, 'ID', '_menu_item_menu_item_parent');

# danh sach cac object gan voi menu item
$menu_item_object_ids = array();
foreach($menu_items as $menu_item) {
	$menu_item_object_ids[] = $menu_item['_menu_item_object_id'];
}
$menu_item_objects = $controller->terms_model->prepare_term_taxonomies()
	->where_in('bv_term_taxonomy.term_taxonomy_id', $menu_item_object_ids)
	->fetch_all();
# index du lieu
$menu_item_object_indexeds = array();
foreach($menu_item_objects as $menu_item_object) {
	$menu_item_object_indexeds[$menu_item_object['term_taxonomy_id']] = $menu_item_object;
}
# hien thi cay du lieu
foreach($tree_menu_items as $root_item) {
	$root = $menu_items[$root_item];
	$root_object_id = $root['_menu_item_object_id'];
	$root_object = $menu_item_object_indexeds[$root_object_id];
	?>
	<div class="list_cate_left">
		<a href="<?= $links_model->get_product_category_link($language, $root_object) ?>" class="cate_far_left"><?= wpglobus($root_object['name'], $language) ?></a>
	</div>
	<?php
	$root_children = getTreeChildren($menu_items, $root_item);
	foreach($root_children as $root_child){
		$root_child_object_id = $root_child['_menu_item_object_id'];
		$root_child_object = $menu_item_object_indexeds[$root_child_object_id];
		//pre('--------' . $root_child_object['name']);
		?>
		<ul class="mega-menu right">
			<li><a href="<?= $links_model->get_product_category_link($language, $root_child_object) ?>" class="dc-mega"><?= wpglobus($root_child_object['name'], $language)  ?><span class="dc-mega-icon"></span></a>
				<div class="sub-container non-mega">
					<ul class="sub">
		<?php
		$children = getTreeChildren($menu_items, $root_child);
		foreach($children as $child) {
			$child_object_id = $child['_menu_item_object_id'];
			$child_object = $menu_item_object_indexeds[$child_object_id];
			?>
			<li><a href="<?= $links_model->get_product_category_link($language, $child_object) ?>"><?= wpglobus($child_object['name'], $language) ?></a></li>
			<?php
			$sub_children = getTreeChildren($menu_item, $child);
			foreach($sub_children as $sub_child) {
				$sub_child_object_id = $sub_child['_menu_item_object_id'];
				$sub_child_object = $menu_item_object_indexeds[$sub_child_object_id];
				?>
				<li class="cate4"><a href="<?= $links_model->get_product_category_link($language, $sub_child_object) ?>"> + <?= wpglobus($sub_child_object['name'], $language)  ?></a></li>
				<?php
			}
		}
		?>
					</ul>
				</div>
			</li>
		</ul>
		<?php
	}
}
?>