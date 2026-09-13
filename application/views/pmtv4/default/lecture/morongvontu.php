<?php
/** @var array $items */
$chunkSize = ceil(count($items) / 2);
$subChildrenChunk = array_chunk($items, $chunkSize);
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="row mt-3">
            <?php foreach ($subChildrenChunk as $chunkIndex => $subChildren): ?>
                <div class="col-12 col-md-6">
                    <div class="lecture-col">
                        <?php foreach ($subChildren as $index => $sub):
                            $num = $chunkSize * $chunkIndex + $index + 1;
                        ?>
                            <div class="lecture-detail mt-4 num<?= $num ?>">
                                <a class="lecture-title" href="/<?= $sub['alias'] ?>">
                                    <h3 class="my-0"><?= $sub['name'] ?></h3>
                                </a>
                                <ul>
                                    <?php for ($i = 0; $i < 8; $i++):
                                        if ($i == 0) {
                                            $video_title = 'video_title';
                                        } else {
                                            $video_title = 'video' . $i . '_title';
                                        }
                                    ?>
                                        <?php if (isset($sub[$video_title]) && $sub[$video_title]): ?>
                                            <li class="mt-1">
                                                <a href="/<?= $sub['alias'] ?>?video=<?= $i ?>"><i class="fa-brands fa-youtube"></i> <?= $sub[$video_title] ?></a>
                                            </li>
                                        <?php endif ?>
                                    <?php endfor ?>
                                    <li>
                                        <a href="/<?= $sub['alias'] ?>#practice-section"><i class="fa-solid fa-pen-to-square"></i> Bài tập</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>