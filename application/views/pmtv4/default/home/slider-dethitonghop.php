<div class="my-3 slider slider-dethitonghop">
    <a href="/de-thi-tong-hop" class="slider-title">
        <h2 class="py-2">
            Đề thi tổng hợp
        </h2>
    </a>
    <div id="slide-dethitonghop">
        <div class="row row-cols-5 g-3">
            <?php foreach ($de_thi_tong_hop as $item) { ?>
                <div class="col">
                    <div class="card">
                        <a href="/<?= $item['alias'] ?>">
                            <h3 class="card-header">
                                <?= $item['name'] ?>
                            </h3>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>