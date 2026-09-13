<div class="mt-3 slider slider-luyentuvacau">
    <a href="/luyen-tu-va-cau" class="slider-title">
        <h2 class="py-2">
            Luyện từ và câu
        </h2>
    </a>
    <div id="slide-luyentuvacau">
        <div class="row g-3">
            <?php foreach ($luyen_tu_va_cau as $item) { ?>
                <div class="col-12 mb-3 col-md-3">
                    <div class="card h-100">
                        <img class="w-100 img-pmtv" src="http://tiengviettieuhoc.vn<?= $item['img'] ?>">
                        <a href="/<?= $item['alias'] ?>">
                            <h3 class="card-header">
                                <?= $item['name'] ?>
                            </h3>
                        </a>
                        <div class="card-body">
                            <p class="card-desc">
                                <?= $item['content'] ?>
                            </p>
                            <ul class="card-details mt-3">
                                <li>
                                    <a href="/<?= $item['alias'] ?>"><i class="fa-solid fa-book"></i> Bài giảng cơ bản & nâng cao</a>
                                </li>
                                <li>
                                    <a href="/<?= $item['alias'] ?>"><i class="fa-solid fa-pencil"></i> Luyện tập cơ bản & nâng cao</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>