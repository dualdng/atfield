@extends('layout')
@section('content')
		<div id='article' class='col-md-9'>

				<div class='panel panel-default'>
						<div class='panel-heading'>
								<h2 class='panel-title'>欢迎：<?php echo $id;?></h2>
						</div>
						<div class='panel-body'>
						<form method='POST' onsubmit='return postPost(<?php echo $id;?>)'>
										<div class='from-group'>
												<label for='title'>标题</label>
												<input class='form-control' name='title'/>
										</div>
												<label for='content'>内容</label>
												<script id='myContent' name='content' type='text/plain'></script>
										<div class='form-group form-inline'>
												<label for='tag'>标签 : </label>
												<input class='form-control' name='tag'/>
												<label for='state'>状态 : </label>
												<select class='form-control' name='state' id='state'>
														<option value='1'>公开</option>
														<option value='0'>私密</option>
														<option value='2'>草稿</option>
												</select>
												<label for='category'> 分类 : </label>
												<select class='form-control' name='category' id='category'>
														<option value='0'>请选择</option>
														<option value='1'>三次元</option>
														<option value='2'>二次元</option>
														<option value='3'>Cosplay</option>
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
