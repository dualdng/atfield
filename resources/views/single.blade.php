@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='header container-fluid'>
</div>
@endsection
@section('content')
<div class='container'>
		<div class='col-md-9 single'>
				<ol class="breadcrumb">
						<li><a href="#">首页</a></li>
						<li><a href="#">绝对领域</a></li>
						<li class="active"><?php echo $post->categoryName;?></li>
				</ol>
				<div class='singleiTitle'>
						<h2 class='text-center'><?php echo $post->title;?></h2>
						<p><a href='#'><?php echo $post->nickname;?></a> 发布于 <?php echo $post->created_at;?></p>
				</div>
				<div class='singleMain'>
						<p><?php echo $post->content;?></p>
				</div>
				<div class='adsMiddle'>
				</div>
				<div id='commentArea' class='singleComment'>
				</div>
				<div id='comment' class='singleComment'>
				</div>
				<script>
						$(function (){
								getComment(<?php echo $post->id;?>);
								getCommentArea(<?php echo $userId;?>,<?php echo $post->id;?>,0);
						})
				</script>
		</div>
		<div class='col-md-3 secondary'>
				<div class='panel panel-success'>
						<div class='panel-heading'>
								<h2 class='panel-title'>加入我们</h2>
						</div>
						<div class='panel-body'>
								<a class='btn btn-default' href='/auth/login' title='#'>登录</a>
								还没帐号？赶紧 <a  href='/auth/register' title='#'>注册</a>
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
										<div class="media-left">
												<a href="/dashboard/<?php echo $value->id;?>">
														<img class="media-object" src="<?php echo $value->avatar;?>" alt="...">
												</a>
										</div>
										<div class="media-body media-middle">
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
</div>
@endsection

