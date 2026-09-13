<div class="mt-3 slider slider-tapdochieu">
    <a href="/tap-doc-hieu" class="slider-title">
        <h2 class="py-2">
            Tập đọc hiểu
        </h2>
    </a>
    <div id="slide-tapdochieu">
        <div class="row row-cols-5 g-3">
            <?php foreach ($tap_doc_hieu as $item) { ?>
                <div class="col">
                    <div class="card">
                        <a href="/<?= $item['alias'] ?>">
                            <h3 class="card-header" style="font-size: 0.75rem;">
                                <?= $item['name'] ?>
                            </h3>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>