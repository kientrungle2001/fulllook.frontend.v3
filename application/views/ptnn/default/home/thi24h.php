<?php $controller->js('controller/home_thi24h.js')?>
<div class="row" ng-controller="home_thi24h_controller">
<div class="col-md-1">
		<div class="row">
			<div class="topic">
			<a href="<?= base_url()?>index.php/article/category?category_id=82">{{title}}</a>
			</div>
		</div>
	</div>
	<div class="col-md-11">
		<div class="row">
		<div class="col-md-4">
				<div class="media-list">
					<div class="media">
						<div class="media-left">
							<div class="embed-responsive embed-responsive-16by9 thumbnail">
								<div class="embed-responsive-item">
								<img class="media-object w-100" ng-src="{{articles[1].image}}" />
								</div>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[1].id}}" class="title">
								{{articles[1].title}}
								</a>
							</h4>
							<a href="#" class="link">
								Xem thêm -&gt;
							</a>
						</div>
					</div>
					<div class="media">
						<div class="media-left">
							<div class="embed-responsive embed-responsive-16by9 thumbnail">
								<div class="embed-responsive-item">
								<img class="media-object w-100" ng-src="{{articles[2].image}}" />
								</div>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[2].id}}" class="title">
								{{articles[2].title}}
								</a>
							</h4>
							<a href="#" class="link">
								Xem thêm -&gt;
							</a>
						</div>
					</div>
					<div class="media">
						<div class="media-left">
							<div class="embed-responsive embed-responsive-16by9 thumbnail">
								<div class="embed-responsive-item">
								<img class="media-object w-100" ng-src="{{articles[3].image}}" />
								</div>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[3].id}}" class="title">
								{{articles[3].title}}
								</a>
							</h4>
							<a href="#" class="link">
								Xem thêm -&gt;
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="embed-responsive embed-responsive-16by9 w-100 relative">
					<div class="embed-responsive-item">
					<img class="media-object w-100" ng-src="{{articles[0].image}}" />
					</div>
					<div class="caption">
						<a href="<?= base_url()?>index.php/article/detail?article_id={{articles[0].id}}"><h2 class="title">{{articles[0].title}}</h2></a>
						<p ng-bind-html="stripTags(removeImage(articles[0].introtext))" class="text-justify introtext">
					</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>