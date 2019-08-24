<?php echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
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
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('vi', $root_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('en', $root_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
	<?php
	$root_children = getTreeChildren($menu_items, $root_item);
	foreach($root_children as $root_child){
		$root_child_object_id = $root_child['_menu_item_object_id'];
		$root_child_object = $menu_item_object_indexeds[$root_child_object_id];
		//pre('--------' . $root_child_object['name']);
		?>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('vi', $root_child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('en', $root_child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
		<?php
		$children = getTreeChildren($menu_items, $root_child);
		foreach($children as $child) {
			$child_object_id = $child['_menu_item_object_id'];
			$child_object = $menu_item_object_indexeds[$child_object_id];
			?>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('vi', $child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('en', $child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
			<?php
			$sub_children = getTreeChildren($menu_item, $child);
			foreach($sub_children as $sub_child) {
				$sub_child_object_id = $sub_child['_menu_item_object_id'];
				$sub_child_object = $menu_item_object_indexeds[$sub_child_object_id];
				?>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('vi', $sub_child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>

<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_category_link('en', $sub_child_object) ?></loc>
	<changefreq>monthly</changefreq>
	<priority>0.2</priority>
</url>
				<?php
			}
		}
	}
}
$posts = $posts_model->get_posts(array(
	'post_type' => 'post',
	'post_status' => 'publish'
));
foreach($posts as $post):
	$term = $terms_model->get_term_taxonomies(array(
		'term_taxonomy_id' => $post['term_taxonomy_id'],
		'taxonomy' => 'category'
	));
	if(isset($term[0])):
	$category = $term[0];
?>
<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_link('vi', $category, $post) ?></loc>
	<lastmod><?= $post['post_modified']?></lastmod>

	<changefreq>weekly</changefreq>
	<priority>1</priority>
</url>

<url>
	<loc>http://<?= $_SERVER['HTTP_HOST']?><?= $links_model->get_product_link('en', $category, $post) ?></loc>
	<lastmod><?= $post['post_modified']?></lastmod>

	<changefreq>weekly</changefreq>
	<priority>1</priority>
</url>
<?php
	endif;
endforeach;
?>
</urlset>