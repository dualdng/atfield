@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='header container-fluid'>
<div class="jumbotron">
  <h2>AT.Field club</h2>
  <p>打造面向绝对领域爱好者的精品社区</p>
  <p><a class="btn btn-primary btn-lg" href="/auth/register" role="button">赶快加入吧</a></p>
</div>
</div>
@endsection
@section('content')
<script>
		$(function(){
				var $container = $('#masonry');
				$container.imagesLoaded( function(){
						$container.masonry({
								itemSelector : '.box',
								gutterWidth : 20,
								isAnimated: true,
						});
				});
		});
</script>

		<div class='col-md-9 main'>
				<div class='col-md-7'>
						<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
								<!-- Indicators -->
								<ol class='carousel-indicators'>
										<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
										<li data-target='#carousel-example-generic' data-slide-to='1'></li>
										<li data-target='#carousel-example-generic' data-slide-to='2'></li>
								</ol>
								<!-- Wrapper for slides -->
								<div class='carousel-inner' role='listbox'>
										<div class='item active'>
												<img src='<?php echo $post[0]->img;?>' alt='...'>
												<div class='carousel-caption'>
														<h2><a href='/single/<?php echo $post[0]->id;?>'><?php echo $post[0]->title;?></a></h2>
												</div>
										</div>
										<?php foreach($post as $key=>$value){?>
										<?php if($key>0&&$key<3){?>
										<div class='item'>
												<img src='<?php echo $value->img;?>' alt='...'>
												<div class='carousel-caption'>
														<h2><a href='/single/<?php echo $post[0]->id;?>'><?php echo $value->title;?></a></h2>
												</div>
										</div>
										<?php }?>
										<?php }?>
								</div>

								<!-- Controls -->
								<a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
										<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
										<span class='sr-only'>Previous</span>
								</a>
								<a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
										<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
										<span class='sr-only'>Next</span>
								</a>
						</div>
				</div>
				<div class='col-md-5'>
						<div class='panel panel-success'>
								<div class='panel-heading'>
										<h2 class='panel-title'>资讯</h2>
								</div>
								<div class='panel-body'>
										<ul class="list-group">
												<?php foreach($postA as $key=>$value) {?>
												<li class="list-group-item"><a href='/single/<?php echo $value->id;?>'><?php echo $value->title;?></a></li>
												<?php }?>
										</ul>
								</div>
						</div>
				</div>
				<div class='col-md-12'>`
						<div class='panel panel-success'>
								<div class='panel-heading'>
										<h2 class='panel-title'>最新文章</h2>
								</div>
								<div class='panel-body'>
										<?php foreach($postB as $key=>$value) {?>
										<div class="media">
												<div class="media-left media-middle">
														<a href="#">
																<img class="media-object" src="<?php echo $value->img;?>" alt="...">
														</a>
												</div>
												<div class="media-body">
														<a href='/single/<?php echo $value->id;?>'><?php echo $value->title;?></a>
												</div>
										</div>
										<?php }?>
								</div>
						</div>
				</div>
		</div>
		<div class='col-md-3 secondary'> 
		</div>
		<div class='col-md-12 adsBig'>
		</div>
		<div class='col-md-12 picA'>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>二次元图片</h2>
						</div>
						<div class='panel-body'>
								<?php foreach($postD as $value){?>
								<div class='col-md-2'>
										<img src='<?php echo $value->img;?>'/>
								</div>
								<?php }?>
						</div>
				</div>
		</div>
		<div class='col-md-12 fourth'>
				<div class='col-md-6'>
						<div class='panel panel-success'>
								<div class='panel-heading'>
										<h2 class='panel-title'>袜子</h2>
								</div>
								<div class='panel-body'>
										<?php foreach($postE as $value){?>
										<div class="media">
												<div class="media-left media-middle">
														<a href="#">
																<img class="media-object imgEight" src="<?php echo $value->img;?>" alt="...">
														</a>
												</div>
												<div class="media-body">
														<a href='/single/<?php echo $value->id;?>'><?php echo $value->title;?></a>
												</div>
										</div>
										<?php }?>
								</div>
						</div>
				</div>
				<div class='col-md-6'>
						<div class='panel panel-success'>
								<div class='panel-heading'>
										<h2 class='panel-title'>旧番</h2>
								</div>
								<div class='panel-body'>
										<?php foreach($postF as $value){?>
										<div class="media">
												<div class="media-left media-middle">
														<a href="#">
																<img class="media-object imgEight" src="<?php echo $value->img;?>" alt="...">
														</a>
												</div>
												<div class="media-body">
														<a href='/single/<?php echo $value->id;?>'><?php echo $value->title;?></a>
												</div>
										</div>
										<?php }?>
								</div>
						</div>
				</div>

		</div>

		<div class='col-md-12 hotPic'>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>热门图片</h2>
						</div>
						<div class='panel-body'>
								<div class='col-md-3'>
										<img src='<?php echo $postC[0]->imgUrl;?>'/>
								</div>
								<div class='col-md-9'>
										<?php foreach($postC as $key=>$value){?>
										<div class='col-md-3'>
												<img src='<?php echo $value->imgUrl;?>'/>
										</div>
										<?php }?>
								</div>
						</div>
				</div>
		</div>
		<script>
				$(function(){
						getSide();
				})
		</script>

@endsection

