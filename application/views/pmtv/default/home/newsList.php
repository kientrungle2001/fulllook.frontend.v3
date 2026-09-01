<div class="card card-box mt-3">
    <h2 class="card-header">
        Tin tức Happy Way
    </h2>
    <div class="card-body">
        <div class="list-group">
            <?php foreach ($newsList as $news): ?>
                <div class="list-group-item list-group-item-action p-3">
                    <div class="d-flex align-items-start">
                        <!-- Left Image -->
                        <div class="flex-shrink-0 me-3">
                            <img src="http://tiengviettieuhoc.vn<?= $news['img'] ?>" onerror="this.src='http://tiengviettieuhoc.vn/3rdparty/uploads/images/d2341319aee7a0f26d407a6fec53b802.png'" alt="News thumbnail" class="img-fluid rounded" style="width: 180px; height: 100px; object-fit: cover;">
                        </div>
                        <!-- Right Content -->
                        <div class="flex-grow-1">
                            <h5 class="mb-1 fs-5 fw-bold">
                                <a class="text-decoration-none" href="/<?= $news['alias'] ?>">
                                    <?= $news['title'] ?>
                                </a>
                            </h5>
                            <p class="mb-0 text-muted small"><?= $news['brief'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>