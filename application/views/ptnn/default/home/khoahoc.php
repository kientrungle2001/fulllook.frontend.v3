<?php $controller->js('controller/home_khoahoc.js');?>
<div class="row" ng-controller="home_khoahoc_controller">
	<div class="col-md-1">
		<div class="row">
			<div class="topic">
			<a href="<?= base_url()?>index.php/article/category?category_id=80">{{title}}</a>
			</div>
		</div>
	</div>
	<div class="col-md-11">
		<div class="row">
			<div class="col-md-4">
				<div class="media">
					<div class="embed-responsive embed-responsive-16by9 w-100">
						<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[0].image}}" />
						</div>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[0].id}}" class="title">
							{{articles[0].title}}
							</a>
						</h4>
						<p ng-bind-html="stripTags(removeImage(articles[0].introtext))" class="text-justify introtext">
						</p>
					</div>
				</div>
			</div>
			<div class="border-left col-md-4">
				<div class="media">
					<div class="embed-responsive embed-responsive-16by9 w-100">
						<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[1].image}}" />
						</div>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[1].id}}" class="title">
								{{articles[1].title}}
							</a>
						</h4>
						<p ng-bind-html="stripTags(removeImage(articles[1].introtext))" class="text-justify introtext">
						</p>
					</div>
				</div>
			</div>
			<div class="border-left col-md-4">
				<div class="media">
					<div class="embed-responsive embed-responsive-16by9 w-100">
						<div class="embed-responsive-item">
						<img class="media-object w-100" ng-src="{{articles[2].image}}" />
						</div>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[2].id}}" class="title">
							{{articles[2].title}}
							</a>
						</h4>
						<p ng-bind-html="stripTags(removeImage(articles[2].introtext))" class="text-justify introtext">
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>