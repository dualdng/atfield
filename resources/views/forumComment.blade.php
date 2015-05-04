@extends('layout')
@section('content')
<div class='panel panel-success'>
		<div class='panel-heading'>
				<span class='panel-title'>评论</span>
		</div>
		<div class='panel-body'>
				<table class='table table-striped table-bordered'>
						<?php foreach($comment as $value){?>
						<tr>
										<td>
												<img class='imgSmall' src='<?php echo $value->avatar;?>'/><br />
												<?php echo $value->nickname;?><br />
										</td>
										<td>
												<?php echo $value->comment;?><br />
												<div class='text-right'>
														<a  href='javascript:reply(<?php echo $value->commentId;?>,"<?php echo $value->nickname;?>");'>回复</a><br />
														<?php echo date('Y-m-d',time($value->created_at));?></div>
										</td>
						</tr>
						<?php }?>
				</table>
<div class='pageNav text-center'>
</div>
		</div>
</div>
<script>
$(function(){
		pageNav('<?php echo $page;?>','<?php echo $url;?>','<?php echo $num;?>','<?php echo $pageSize;?>')
})
</script>
@endsection

