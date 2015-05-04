@extends('layout')
@section('content')
<div class='container-fluid pic'>
		<div class='close'><a href='javascript:closePic()'><span class='glyphicon glyphicon-remove-circle'></span></a></div>
		<div class='container picBody'>
				<div class='col-md-8 right'>
						<p>
						<img src='<?php echo $post->content;?>'/>
						</p>
						<?php if($i<$num&&$i!=0){?>
						<?php if($type==1){?>
						<span class='glyphicon glyphicon-chevron-left'><a class='ajax' href='/pic/post/<?php echo $post->id;?>/<?php echo $i-1;?>'>上一张</a></span>&nbsp&nbsp&nbsp
						<?php }else if($type==2){?>
						<span class='glyphicon glyphicon-chevron-left'><a class='ajax' href='/pic/album/<?php echo $post->id;?>/<?php echo $i-1;?>'>上一张</a></span>&nbsp&nbsp&nbsp
						<?php }else{?>
						<span class='glyphicon glyphicon-chevron-left'><a class='ajax' href='/pic/<?php echo $i-1;?>'>上一张</a></span>&nbsp&nbsp&nbsp
						<?php }?>
						<?php }?>
						<a class='btn btn-success' href=''>下载</a>
<?php if($userId!=0){?>
						<a class='btn btn-success followPic' href='javascript:getFollowPicPage(<?php echo $userId;?>);' imgUrl='<?php echo $post->content;?>' tag='<?php echo $post->tag;?>'  value='0'>收藏</a>
						<?php }?>
						<?php if($i<$num&&$i!=$num-1){?>
						<?php if($type==1){?>
						&nbsp&nbsp&nbsp<a class='ajax' href='/pic/post/<?php echo $post->id;?>/<?php echo $i+1;?>'>下一张</a>
						<span class='glyphicon glyphicon-chevron-right'></span><br />
						<?php }else if($type==2){?>
&nbsp&nbsp&nbsp<a class='ajax' href='/pic/album/<?php echo $post->id;?>/<?php echo $i+1;?>'>下一张</a>
						<span class='glyphicon glyphicon-chevron-right'></span><br />
						<?php }else{?>
&nbsp&nbsp&nbsp<a class='ajax' href='/pic/<?php echo $i+1;?>'>下一张</a>
						<span class='glyphicon glyphicon-chevron-right'></span><br />
						<?php }?>
						<?php }?>
						<div class='ajaxArea'>
						</div>
				</div>
				<div class='col-md-4 left'>
						<div id='commentArea'>
						</div>
						<div id='comment'>
						</div>
				</div>
		</div>
</div>
@endsection
