@extends('layout')
@section('content')
<div class='col-md-12 post'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
								<a href="/"> 首页 </a></lia>>
								<?php if($type==1) {?>
								<a href="/showgroup">小组</a></li>>
								<?php }else{?>
								<a href="/forum">版块</a></li>>
								<?php }?>
								<span><?php echo $forumName;?></span>
				</div>
				<div class='panel-body'>
				<form method='POST' action='/dashboard/<?php echo $userId;?>/post'>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" name="forumId" value="<?php echo $forumId; ?>">
						<input type="hidden" name="type" value="<?php echo $type; ?>">
								<div class='from-group'>
										<label for='title'>标题</label>
										<input class='form-control' name='title' placeholder='不建议超过20个字'/>
								</div>
								<label for='content'>内容(第一张图片会自动设置为帖子封面)</label>
								<script id='myContent' name='content' type='text/plain'></script>
								<div class='form-group'>
										<label for='tag'>标签 : 用','分隔</label>
										<input class='form-control' name='tag' placeholder='美女,动漫,搞笑图片'/>
										<label for='state'>状态 : </label>
										<select class='form-control' name='state' id='state'>
												<option value='-1'>选择该帖子是否公开，设为私密，只有本人可以访问</option>
												<option value='1'>公开</option>
												<option value='0'>私密</option>
										</select>
								</div>
								<div class='form-group'>
										<label for='#' class='sr-only'>标签 : </label>
										<input class='form-control btn btn-success' type='submit' value='提交'/>
								</div>

						</form>
				</div>
		</div>

</div>
<script type="text/javascript">
		var ue = UM.getEditor('myContent',{
initialFrameHeight:500,
initialFrameWidth:1098
});
</script>

@endsection
