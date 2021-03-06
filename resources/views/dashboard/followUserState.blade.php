@extends('layout')
@section('content')
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<?php if($authUser->id==$user->id) {?>
						<h2 class='panel-title'>我关注的动态</h2>
						<?php }else{?>
						<h2 class='panel-title'>他的帖子</h2>
						<?php }?>
				</div>
				<div class='panel-body'>
						<table class='table table-striped table-bordered'>
								<tr>
										<td>序号</td>
										<td>标题</td>
										<td>作者</td>
										<td>操作</td>
								</tr>
								<?php
								foreach($followPost as $post) {
										foreach($post as $values){
								echo '<tr>';
										echo '<td>'.$values->id.'</td>';
										echo '<td>'.$values->title.'</td>';
										echo '<td>'.$values->nickname.'</td>';
										echo '<td><a class=\'btn btn-danger sr-only\' href=\'javascript:deletePost('.$values->id.')\'>删除</a><a class=\'btn btn-success\' href=\'/single/'.$values->id.'\'>查看</a></td>';
										echo '</tr>';
								};
								};
								?>
						</table>
				</div>
		</div>
</div>
@endsection
