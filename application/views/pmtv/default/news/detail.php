<div class="card card-box mb-3">
    <h2 class="card-header">
        Tin tức
    </h2>
    <div class="card-body text-justify">
        <h1 class="text-center fs-4"><?= $news['title'] ?></h1>
        <em> </em>

        <div class="news-content">
            <?= $news['content'] ?>
        </div>
        <h4 class="mt-3">Các tin liên quan</h4>
        <ul>
            <?php foreach ($newsList as $related): ?>
                <li>
                    <a class="text-decoration-none" href="/<?= $related['alias'] ?>"><?= $related['title'] ?></a>
                </li>
            <?php endforeach ?>
        </ul>

        <div class="fb-like" data-share="true" data-width="450" data-show-faces="true">
        </div>
        <div class="fb-comments" style="margin-left:150px;" data-href="http://tiengviettieuhoc.vn/100-de-trac-nghiem-danh-gia-nang-luc-mon-tieng-viet" data-numposts="5"></div>
    </div>
</div>