<div class="mt-3 slider slider-taplamvan">
    <a href="/tap-lam-van" class="slider-title">
        <h2 class="py-2">
            Tập làm văn
        </h2>
    </a>
    <div id="slide-taplamvan">
        <div class="row g-3">
            <?php foreach ($tap_lam_van as $item) { ?>
                <div class="col-12 mb-3 col-md-3">
                    <div class="card">
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