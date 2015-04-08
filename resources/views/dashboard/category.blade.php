@extends('layout')
@section('content')
		<div id='article' class='col-md-9'>
				<div class='panel panel-default'>
						<div class='panel-heading'>
								<h2 class='panel-title'>欢迎：<?php echo $id;?></h2>
						</div>
						<div class='panel-body'>
								<form method='POST' onsubmit='return postCategory()'>
										<div class='from-group'>
												<label for='name'>分类名称</label>
												<input class='form-control' name='name'/>
												<label for='description'>分类描述</label>
												<input class='form-control' name='description'/>

										</div>
												<label for='#' class='sr-only'>标签 : </label>
												<input class='form-control btn btn-success' type='submit' value='提交'/>
										</div>
								</form>
						</div>
				</div>
		</div>
@endsection
