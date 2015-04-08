@extends('layout')
@section('content')
<div class='container-fluid pic'>
		<div class='close'><a href='javascript:closePic()'><span class='glyphicon glyphicon-remove-circle'></span></a></div>
		<div class='container picBody'>
				<div class='col-md-8 right'>
						<p><?php echo $post->content[$i].'/>';?></p>
				</div>
				<div class='col-md-4 left'>
						<div id='commentArea'>
						</div>
						<div id='comment'>
						</div>
						<script>
								$(function (){
										getComment(<?php echo $id;?>);
										getCommentArea(<?php echo $userId;?>,<?php echo $id;?>,0);
								})
						</script>
				</div>
		</div>
</div>
@endsection
