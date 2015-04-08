@extends('layout')
@section('content')
		<div id='article' class='col-md-9'>
				<div class='panel panel-default'>
						<div class='panel-heading'>
								<h2 class='panel-title'>编辑</h2>
						</div>
						<div class='panel-body'>
						<form method='POST' onsubmit='return updatePost(<?php echo $postId;?>)'>
										<div class='from-group'>
												<label for='title'>标题</label>
												<input class='form-control' name='title' value='<?php echo $post->title;?>'/>
										</div>
												<label for='content'>内容</label>
												<textarea id='myContent' class='form-control' name='content' ><?php echo stripslashes($post->content);?></textarea>
										<div class='form-group form-inline'>
												<label for='tag'>标签 : </label>
												<input class='form-control' name='tag' value='<?php echo $post->tag;?>'/>
												<label for='state'>状态 : </label>
												<select class='form-control' name='state' id='state'>
														<?php switch($post->type) {
														case 1:
														echo '<option value=\'1\' checked=\'checked\'>公开</option>';
														echo '<option value=\'0\'>私密</option>';
														echo '<option value=\'2\'>草稿</option>';
														break;
														case 0:
														echo '<option value=\'1\'>公开</option>';
														echo '<option value=\'0\' checked=\'checked\'>私密</option>';
														echo '<option value=\'2\'>草稿</option>';
														break;
														case 2:
														echo '<option value=\'1\'>公开</option>';
														echo '<option value=\'0\'>私密</option>';
														echo '<option value=\'2\' checked=\'checked\'>草稿</option>';
														break;
														}?>
												</select>
												<label for='category'> 分类 : </label>
												<select class='form-control' name='category' id='category'>
														<?php switch($post->category) {
														case 1:
														echo '<option value=\'1\' checked=\'checked\'>三次元</option>';
														echo '<option value=\'2\'>二次元</option>';
														echo '<option value=\'3\'>Cosplay</option>';
														break;
														case 2:
														echo '<option value=\'1\'>三次元</option>';
														echo '<option value=\'2\' checked=\'checked\'>二次元</option>';
														echo '<option value=\'3\'>Cosplay</option>';
														break;
														case 3:
														echo '<option value=\'1\'>三次元</option>';
														echo '<option value=\'2\'>二次元</option>';
														echo '<option value=\'3\' checked=\'checked\'>Cosplay</option>';
														break;
														}?>
												</select>
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
		initialFrameWidth:790
});
</script>
@endsection
