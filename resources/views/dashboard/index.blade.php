@extends('layout')
@section('title')
AT.field | 用户中心 
@endsection
@section('header')
<div class='header container-fluid'>
</div>
@endsection
@section('content')
		<div class='col-md-3 dashboard'>
				<div class='list-group'>
						<a class='list-group-item disabled'>网站管理</a>
						<a class='list-group-item' href='/dashboard/<?php echo $id;?>/profile'>用户首页</a>
						<a class='list-group-item' href='/dashboard/<?php echo $id;?>/post' >发布</a>
						<a class='list-group-item' href='/dashboard/<?php echo $id;?>/postlist'>编辑</a>
						<a class='list-group-item disabled' href='/dashboard/<?php echo $id;?>/category'>编辑分类</a>
						<a class='list-group-item disabled' href='javascript:void(0)'>网站选项</a>
						<a class='list-group-item disabled' href='javascript:editLink()'>友情链接</a>
						<a class='list-group-item disabled'>其他</a>
						<a class='list-group-item' href='/logout' >登出</a>
						<a class='list-group-item' href='/dashboard/clearCache'>缓存</a>
				</div>
		</div>
		<div id='article' class='col-md-9'>
				<div class='panel panel-default'>
						<div class='panel-heading'>
								<h2 class='panel-title'>欢迎：<?php echo $id;?></h2>
						</div>
						<div class='panel-body'>
								<div class='row'>
										<div class='col-md-4'>
												<div class="thumbnail">
														<img src="<?php echo $avatar;?>" alt="...">
														<div class="caption">
																<form method='POST' action='/dashboard/<?php echo $id;?>/avatar' enctype='multipart/form-data'>
																		<div class='form-group'>
																				<label class='sr-only' for='avatar'>更换头像</label>
																				<input class='form-control' type='file' name='avatar'/>
																				<label class='sr-only' for='avatar'>更换头像</label>
																				<input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
																		</div>
																		<input class='btn btn-success' type='submit' value='保存'/>
																</form>
														</div>
												</div>
										</div>
										<div class='col-md-4'>

												<ul class="list-group">
														<li class="list-group-item">
														<span class="badge">14</span>
														积分
														</li>
														<li class="list-group-item">
														<span class="badge"><?php echo $num;?></span>
														<a href='/dashboard/<?php echo $id;?>/postlist'>发帖数 </a>
														</li>

												</ul>			
												<form class='sr-only' method='POST' onsubmit='return postProfile()'>
														<div class='form-group'>
																<label for='nickname'>昵称</label>
																<input class='form-control' name='nickname' type='text'/>
																<label for='description'>个人说明</label>
																<input class='form-control' name='description' type='text'/>
														</div>
														<input class='btn btn-success' type='submit' value='保存' />
												</form>

										</div>

								</div>
						</div>
				</div>
		</div>
@endsection

