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

<div class='container'>
		<div class='col-md-12'>
				<div class='btn-group btn-group-sm' role='group'>
						<?php 
						$num=count($tag);
						for($i=0;$i<$num;$i++) {
						if($i<=12){
						echo '<button type=\'button\' class=\'btn btn-success\'>'.$tag[$i].'</button>';
						}
						}
						if($num>13){
						echo '<div class=\'btn-group\' role=\'group\'>';
								echo '<button type=\'button\' class=\'btn btn-default dropdown-toggle\' data-toggle=\'dropdown\' aria-expanded=\'false\'>';
										echo '更多';
										echo '<span class=\'caret\'></span>';
										echo '</button>';
								echo '<ul class=\'dropdown-menu\' role=\'menu\'>';
										for($i=13;$i<$num;$i++){
										echo '<li><a href=\'#\'>'.$tag[$i].'</a></li>';
										}
										echo '</ul>';
								echo '</div>';
						}
						?>
				</div>
				<div id='masonry' class='masonry'>
						<?php foreach($pic as $key=>$value){ ?>
						<?php $tag=explode(',',$value->tag); ?>
						<div class='box'>
								<a class='ajax' href='/pic/<?php echo $key;?>'><img src='<?php echo $value->imgUrl;?>'/></a>
								<div class='pak'> 
										<p>
										<?php foreach($tag as $values) {?>
										<span class='label label-success'><a href='#' title='#'><?php echo $values;?></a></span>
										<?php }?>
										</p>
										<span><a href='/dashboard/<?php echo $value->usersId;?>' title='#'><?php echo $value->nickname;?></a> 收录在 <a href='#' title='#'><?php echo $value->name;?></a></span>
								</div>
						</div>
						<?php }?>
				</div>
<?php if($pageNum!=1){?>
<div class='text-center loadMore'>
<a class='btn btn-success' href='/picfall?page=<?php echo $page+1;?>'>加载更多</a>
</div>
<?php }?>
		</div>
		<div class='col-md-3'>

		</div>
</div>
@endsection
