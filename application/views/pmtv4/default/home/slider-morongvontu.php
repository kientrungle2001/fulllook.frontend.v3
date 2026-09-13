<div class="mt-3 slider slider-morongvontu">
    <a href="/mo-rong-von-tu" class="slider-title">
        <h2 class="py-2">
            Mở rộng vốn từ
        </h2>
    </a>
    <div id="slide-morongvontu">
        <div class="row row-cols-5 g-3">
            <?php foreach ($mo_rong_von_tu as $item) { ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="/<?= $item['alias'] ?>">
                            <h3 class="card-header">
                                <?= $item['name'] ?>
                            </h3>
                        </a>
                        <div class="card-body text-center">
                            <img class="img-pmtv w-100" src="http://tiengviettieuhoc.vn<?= $item['img'] ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>