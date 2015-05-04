@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@endsection
@section('content')
<div class='col-md-9 single'>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<span class='panel-title'>
								<a href="/"> 首页 </a></lia>>
								<?php if($type==1){?>
								<a href="/group/forum/<?php echo $post->forumId;?>"><?php echo $post->forum;?>></a></li>
								<?php }else{?>
								<a href="/section/forum/<?php echo $post->forumId;?>"><?php echo $post->forum;?>></a></li>
								<?php }?>
								<span> <?php echo $post->title;?></span>
						</span>
				</div>
				<div class='panel-body'>
						<div class='title'>
								<h2 class='text-center'><?php echo $post->title;?></h2>
								<p><a href='/user/<?php echo $post->author;?>'><img src='<?php echo $post->avatar;?>'/> <?php echo $post->nickname;?></a> 发布于 <?php echo date('Y-m-d',time($post->created_at));?>
<span style='float:right'><?php echo $post->view;?> 人看过</span>
								</p>
						</div>
						<div class='singleMain'>
								<p><?php echo $post->content;?></p>
						</div>
				</div>
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
						view(<?php echo $post->id;?>);
				})
		</script>
</div>
<div class='col-md-3 secondary'>
</div>
<script>
		$(function(){
				getSide();
		})
</script>
@endsection

