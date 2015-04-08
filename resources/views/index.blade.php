@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='header container-fluid'>
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

<div class='container'>
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
												<?php foreach($post as $key=>$value) {?>
												<?php if($key<5){?>
												<li class="list-group-item"><a href='/single/<?php echo $value->id;?>'><?php echo $value->title;?></a></li>
												<?php }?>
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
										<?php foreach($post as $key=>$value) {?>
										<?php if($key<5){?>
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
										<?php }?>
								</div>
						</div>
				</div>
		</div>
		<div class='col-md-3 secondary'> 
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>加入我们</h2>
						</div>
						<div class='panel-body'>
								<a class='btn btn-default' href='/auth/login' title='#'>登录</a>
								还没帐号？赶紧 <a  href='/auth/resiter' title='#'>注册</a>
						</div>
				</div>
				<div class='adsSmall'>
						<!--广告-->
				</div>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>最新会员</h2>
						</div>
						<div class='panel-body'>
										<?php foreach($user as $value) {?>
										<div class="media">
												<div class="media-left media-middle">
														<a href="/dashboard/<?php echo $value->id;?>">
																<img class="media-object" src="<?php echo $value->avatar;?>" alt="...">
														</a>
												</div>
												<div class="media-body">
													<?php echo $value->name;?>
												</div>
										</div>
										<?php }?>
						</div>
				</div>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>统计数据</h2>
						</div>
						<div class='panel-body'>
								<ul class="list-group">
										<li class="list-group-item">
										<span class="badge">14</span>
										运行时间
										
										</li>
								</ul>
						</div>
				</div>
		</div>
		<div class='col-md-12 adsBig'>
		</div>
		<div class='col-md-12'>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>热门图片</h2>
						</div>
						<div class='panel-body'>
								<div id='masonry'>
										<?php foreach($post as $key=>$value) {?>
										<?php if($key<10){?>
										<div class='box'>
												<img src='<?php echo $value->img;?>'/>
										</div>
										<?php }?>
										<?php }?>
								</div>
						</div>
				</div>
		</div>

</div>
@endsection

