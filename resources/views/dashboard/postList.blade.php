@extends('layout')
@section('content')
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<h2 class='panel-title'>我的帖子</h2>
				</div>
				<div class='panel-body'>
						<table class='table table-striped table-bordered'>
								<tr>
										<td>序号</td>
										<td>标题</td>
										<td>操作</td>
								</tr>
								<?php
								foreach($post as $values) {
								echo '<tr>';
								echo '<td>'.$values->id.'</td>';
								echo '<td>'.$values->title.'</td>';
								echo '<td><a class=\'btn btn-success\' href=\'/dashboard/'.$id.'/editpost/'.$values->id.'\'>编辑</a><a class=\'btn btn-danger\' href=\'javascript:deletePost('.$values->id.')\'>删除</a></td>';
								echo '</tr>';
								};
								?>
						</table>
				</div>
		</div>
</div>
@endsection
