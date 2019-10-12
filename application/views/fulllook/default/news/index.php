<?php $controller->js('controller/news_index.js')?>
<style>
	.fix-menu{margin-bottom: 15px;}
</style>
<div class="full pt-3" ng-controller="newsIndexController">
	<div class="container">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">{{category.name}}</li>
		  </ol>
		</nav>
    <div class="bg-white p-3 mb-3">
      <div class="row mb-3" ng-repeat="news in newsLists">
        <div class="col-md-3 col-12">
          <a href="/news/detail?news_id={{news.id}}"><img src="http://s1.nextnobels.com/{{news.img}}" class="img-fluid img-thumbnail" /></a>
        </div>
        <div class="col-md-9 col-12">
          <a href="/news/detail?news_id={{news.id}}">{{news.title}}</a>
        </div>
      </div>
    </div>
	</div>
</div>		