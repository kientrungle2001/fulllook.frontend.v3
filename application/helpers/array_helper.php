<?php
function buildTree(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $key1 => $element) {
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
