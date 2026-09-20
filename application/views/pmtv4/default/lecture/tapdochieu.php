<?php
$startFromWeek = 0;
foreach ($items as $section):
    if (!isset($section['children'])) $section['children'] = [];

    if ($section['id'] != $semester_id) {
        $startFromWeek += ceil(count($section['children']) / 2);
        continue;
    }
    $semesterItems = $section['children'];
    $weekItemsChunk = array_chunk($semesterItems, 20);
?>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><span class="px-5 py-2"><?= $section['name'] ?></span></h2>
            <?php foreach ($weekItemsChunk as $weekNum => $weekItems) { ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><span class="px-5 py-2">
                                Tuần từ <?= $startFromWeek + $weekNum * 10 + 1 ?> - <?= $startFromWeek + $weekNum * 10 + ceil(count($weekItems) / 2) ?>
                            </span></h2>
                        <?php $weekRows = array_chunk($weekItems, 6); ?>
                        <div class="row mt-3">
                            <?php foreach ($weekRows as $weekRowIndex => $weekRowItems) { ?>
                                <?php $weekColumns = array_chunk($weekRowItems, 2); ?>
                                <?php foreach ($weekColumns as $weekColumnIndex => $weekColumnItems) { ?>
                                    <div class="col-md-4">
                                        <div class="lecture-col">
                                            <?php $num = $startFromWeek + $weekNum * 10 + $weekRowIndex * 3 + $weekColumnIndex + 1 ?>
                                            <div class="lecture-detail pt-4 num<?= $num ?>">
                                                <?php foreach ($weekColumnItems as $weekColumnItem) { ?>
                                                    <a class="lecture-title" href="/<?= $weekColumnItem['alias'] ?>">
                                                        <h3 class="py-0 my-0"><?= $weekColumnItem['name'] ?></h3>
                                                    </a>
                                                    <ul class="my-0 pb-3">
                                                        <li class="pt-1">
                                                            <a href="/<?= $weekColumnItem['alias'] ?>"><i class="fa-brands fa-youtube"></i>
                                                                Hướng dẫn đọc
                                                            </a>
                                                        </li>
                                                        <li class="mt-1">
                                                            <a href="/<?= $weekColumnItem['alias'] ?>"><i class="fa-solid fa-pen-to-square"></i>
                                                                Hướng dẫn trả lời câu hỏi SGK
                                                            </a>
                                                        </li>
                                                        <li class="mt-1">
                                                            <a href="/<?= $weekColumnItem['alias'] ?>"><i class="fa-solid fa-pen-to-square"></i>
                                                                Bài tập luyện tập
                                                            </a>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php endforeach ?>