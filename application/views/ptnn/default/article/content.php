<script>
	article_id = <?php echo $controller->input->get('article_id', true); ?>;
</script>
<?php $controller->js('controller/article_detail.js')?>
<div ng-controller="article_detail_controller">
	<h1 class="text-justify">{{article.title}}</h1>
	<em ng-bind-html="stripTags(removeImage(article.introtext))" class="text-justify"></em>
	<hr class="hr-separator" />
	<div ng-bind-html="replaceImage(article.fulltext)" class="text-justify"></div>
</div>