<?php $controller->js('controller/home_tintuc360.js')?>
<h2 class="text-center lead"><a href="<?= base_url()?>index.php/article/category?category_id=104">Tin tức 360</a></h2>
<div class="row" ng-controller="home_tintuc360_controller">
	<div class="border-right col-md-3">
		<ul class="media-list">
			<div class="media">
				<div class="embed-responsive embed-responsive-16by9 w-100 relative">
					<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[1].image}}" />
					</div>
					<div class="caption">
						<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[1].id}}" class="title">
							{{articles[1].title}}
						</a>
					</div>
				</div>
			</div>
			<div class="media">
				<div class="embed-responsive embed-responsive-16by9 w-100 relative">
					<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[2].image}}" />
					</div>
					<div class="caption">
						<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[2].id}}" class="title">
							{{articles[2].title}}
						</a>
					</div>
				</div>

			</div>
		</ul>
	</div>
	<div class="col-md-6">
		<div class="embed-responsive embed-responsive-16by9 w-100 relative">
			<div class="embed-responsive-item">
				<img class="media-object w-100" ng-src="{{articles[0].image}}" />
			</div>
			<div class="caption">
				<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[0].id}}">
					<h2 class="title">{{articles[0].title}}</h2>
				</a>
				<p ng-bind-html="stripTags(removeImage(articles[0].introtext))" class="text-justify">
				</p>
			</div>
		</div>

	</div>
	<div class="border-left col-md-3">
		<ul class="media-list">
			<div class="media">
				<div class="embed-responsive embed-responsive-16by9 w-100 relative">
					<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[3].image}}" />
					</div>
					<div class="caption">
						<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[3].id}}" class="title">
							{{articles[3].title}}
						</a>
					</div>
				</div>
			</div>
			<div class="media">
				<div class="embed-responsive embed-responsive-16by9 w-100 relative">
					<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[4].image}}" />
					</div>
					<div class="caption">
						<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[4].id}}" class="title">
							{{articles[4].title}}
						</a>
					</div>
				</div>
			</div>
		</ul>
	</div>
</div>