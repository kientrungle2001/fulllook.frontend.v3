<?php
$semester_1 = $items[0];
$semester_2 = $items[1];

?>
<h1 class="text-center my-5"><?= $main['name'] ?></h1>

<div class="container container-luyentuvacau my-5">
    <div class="border-side-grey">
        <div class="border-side-lightgrey paper">
            <h2 class="container-title">
                <a href="/<?= $semester_1['alias'] ?>">
                    <span class="span3 <?= $semester_1['id'] == $semester_id ? 'span-active' : '' ?>"><?= $semester_1['name'] ?></span>
                    
                </a>
                <a href="/<?= $semester_2['alias'] ?>">
                    <span class="span6 <?= $semester_2['id'] == $semester_id ? 'span-active' : '' ?>"><?= $semester_2['name'] ?></span>
                </a>
            </h2>
            <?php $controller->view('lecture/tapdochieu', $data); ?>

        </div>
    </div>
</div>