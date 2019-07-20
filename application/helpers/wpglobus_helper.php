<?php
function wpglobus($str, $language = 'VI') {
	preg_match("/\{:$language\}([^\{]+)\{:\}/i", $str, $match);
	if(isset($match[1]))
		return $match[1];
	return $str;
}

function buildTree(array $elements, $parentId = 0) {
	$branch = array();
	foreach ($elements as $key1=>$element) {
		if ($element['parent'] == $parentId) {
			$children = buildTree($elements, $element['id']);
			if ($children) {
				$element['children'] = $children;
			}
			$branch[] = $element;
		}
	}

	return $branch;
}

function getTreeChildren(&$items, $node) {
	$children = array();
	if(is_numeric($node)) {
		$node = $items[$node];
	}
	if(isset($node['childrenIndexes'])) {
		foreach($node['childrenIndexes'] as $childIndex) {
			$children[] = $items[$childIndex];
		}
	}
	return $children;
}

function makeTree(&$items, $idField = 'id', $parentField = 'parent') {
	$tree = array();
	$total = count($items);
	for($i = 0; $i < $total; $i++) {
		$items[$i]['itemIndex'] = $i;
		$items[$i]['hasParent'] = false;
	}
	for($i = 0; $i < $total; $i++) {
		for($j = $i + 1; $j < $total; $j++) {
			if(@$items[$j][$parentField] == @$items[$i][$idField]) {
				$items[$j]['hasParent'] = true;
				if(!isset($items[$i]['childrenIndexes'])) {
					$items[$i]['childrenIndexes'] = array();
				}
				$items[$i]['childrenIndexes'][] = $j;
			} else if(@$items[$i][$parentField] == @$items[$j][$idField]) {
				$items[$i]['hasParent'] = true;
				if(!isset($items[$j]['childrenIndexes'])) {
					$items[$j]['childrenIndexes'] = array();
				}
				$items[$j]['childrenIndexes'][] = $i;
			}
		}
	}
	
	for($i = 0; $i < $total; $i++) {
		if($items[$i]['hasParent'] == false) {
			$tree[] = $items[$i]['itemIndex'];
		}
	}
	
	return $tree;
}

function parseTree(&$items, $tree, &$result, $level = 1, $idField = 'id', $parentField = 'parent') {
	foreach($tree as $index) {
		$items[$index]['treeLevel'] = $level;
		$result[] = $items[$index];
		if(isset($items[$index]['childrenIndexes'])) {
			parseTree($items, $items[$index]['childrenIndexes'], $result, $level+1, $idField, $parentField);
		}
	}
}

function treefy(&$items, $idField = 'id', $parentField = 'parent') {
	$tree = makeTree($items, $idField, $parentField);
	$result = array();
	parseTree($items, $tree, $result, 1, $idField, $parentField);
	return $result;
}

function pre($var) {
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}