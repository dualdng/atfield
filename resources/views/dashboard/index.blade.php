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
				<?php if($authUser->id==$user->id) {?>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/profile'>我的主页</a>
				<a class='list-group-item disabled'>文章管理</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/postlist'>我的文章</a>

				<a class='list-group-item disabled'>群组管理</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/group'>我加入的小组</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/newgroup'>创建群组</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/mygroup'>我创建的小组</a>
				<a class='list-group-item disabled'>关注列表</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/followuser'>我关注的人</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/followuserstate'>动态</a>
				<a class='list-group-item disabled'>相册</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/newalbum'>创建相册</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/album'>管理相册</a>
								<?php }else{?>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/profile'>他的主页</a>
				<a class='list-group-item disabled'>文章管理</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/postlist'>他的文章</a>

				<a class='list-group-item disabled'>群组管理</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/group'>他的群组</a>
				<a class='list-group-item disabled'>关注列表</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/followuser'>他关注的人</a>
<a class='list-group-item disabled'>相册</a>
				<a class='list-group-item' href='/dashboard/<?php echo $user->id;?>/album'>他的相册</a>
				<?php }?>
				<?php if($authUser->id==1){?>
				<a class='list-group-item disabled'>网站管理</a>
				<a class='list-group-item disabled' href='javascript:void(0)'>网站选项</a>
				<a class='list-group-item disabled' href='javascript:editLink()'>友情链接</a>
				<a class='list-group-item disabled'>其他</a>
				<a class='list-group-item' href='/logout' >登出</a>
				<a class='list-group-item' href='/dashboard/clearCache'>缓存</a>
				<?php }?>
		</div>
</div>
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<h3 class='panel-title'>欢迎：<?php echo $authUser->nickname;?></h3>
				</div>
				<div class='panel-body'>
						<div class='row'>
								<div class='col-md-4'>
										<div class="thumbnail">
												<img src="<?php echo $user->avatar;?>" alt="...">
												<div class="caption">
														<?php if($authUser->id==$user->id) {?>
														<form method='POST' action='/dashboard/<?php echo $authUser->id;?>/avatar' enctype='multipart/form-data'>
																<div class='form-group'>
																		<label class='sr-only' for='avatar'>更换头像</label>
																		<input class='form-control' type='file' name='avatar'/>
																		<label class='sr-only' for='avatar'>更换头像</label>
																		<input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
																</div>
																<input class='btn btn-success' type='submit' value='保存'/>
														</form>
														<?php } else {?>
														<span><?php echo $user->nickname;?></span>
														<?php if($isFollow===0){ ?>
														<a class='btn btn-success btn-sm follow' href='/dashboard/<?php echo $authUser->id;?>/followuser/<?php echo $user->id;?>' value='0'>关注</a>
														<?php }else{?>
														<a class='btn btn-success btn-sm follow' href='/dashboard/<?php echo $authUser->id;?>/followuser/<?php echo $user->id;?>' value='1'>取消关注</a>
														<?php }?>
														<?php }?>
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
												<a href='javascript:postlist(<?php echo $user->id;?>);'>发帖数 </a>
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
<div class='col-md-4'>
<ul class='list-group'>
<?php if(isset($isReadPost)){?>
<?php foreach($isReadPost as $value){?>
<li class='list-group-item'>
<a class='isMsg' type='post' value='<?php echo $value->id;?>' href='/forum/<?php echo $value->id;?>'>有人在<mark><?php echo $value->title;?></mark>中回复了你！
</li>
<?php }?>
<?php }?>
<?php if(isset($isReadComment)){?>
<?php foreach($isReadComment as $value){?>
<li class='list-group-item'>
<a class='isMsg' type='comment' value='<?php echo $value->id;?>' href='/forum/<?php echo $value->postId;?>'>有人回复了你在<mark><?php echo $value->title;?></mark>的评论！
</li>
<?php }?>
<?php }?>
</ul>
</div>

						</div>
				</div>
		</div>
</div>
@endsection

