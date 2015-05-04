@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
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

<div class='col-md-12'>
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
				<div class='panel-body forum'>
						<table class='table table-striped table-bordered'>
								<tr>
										<td>主题</td>
										<td><?php echo $post->title;?></td>
								</tr>
								<tr>
										<td>
												<img class='imgBig' src='<?php echo $post->avatar;?>'/><br />
												<?php echo $post->nickname;?><br />
												<?php echo date('Y-m-d',time($post->created_at));?>
										</td>
										<td>
												<?php echo $post->content;?>
										</td>

								</tr>
						</table>
				</div>
		</div>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<h2 class='panel-title'>图片墙</h2>
				</div>
				<div class='panel-body'>
						<div id='masonry'>
								<?php foreach($post->img as $key=>$value) {?>
								<div class='box'>
										<a class='ajax' href='/pic/post/<?php echo $post->id;?>/<?php echo $key;?>'><img src='<?php echo $value;?>'/></a>
								</div>
								<?php }?>
						</div>
				</div>
		</div>
		<div class='adsMiddle'>
		</div>
		<div class='comment'>
				<!--comment 空间 -->
		</div>
		<div class='commentArea'>
				<!--评论框-->
		</div>
		<script>
				$(function (){
						getComment(<?php echo $post->id;?>,<?php echo $page;?>);
						getCommentArea(<?php echo $post->id;?>,0);
						view(<?php echo $post->id;?>);
				})
		</script>
</div>
@endsection

