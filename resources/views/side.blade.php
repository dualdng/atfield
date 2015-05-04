@extends('layout')
@section('content')
<?php if($isLogin==0) {?>
<div class='panel panel-success'>
		<div class='panel-heading'>
				<h2 class='panel-title'>加入我们</h2>
		</div>
		<div class='panel-body'>
				<a class='btn btn-default' href='/auth/login' title='#'>登录</a>
				还没帐号？赶紧 <a  href='/auth/register' title='#'>注册</a>
		</div>
</div>
<?php }else {?>
<div class='panel panel-success'>
		<div class='panel-heading'>
				<h2 class='panel-title'>欢迎:<?php echo $nickname;?></h2>
		</div>
		<div class='panel-body'>
				<a class='btn btn-success' href='/dashboard/<?php echo $userId;?>/post'>发布</a>
		</div>
</div>
<?php }?>

<div class='adsSmall'>
		<!--广告-->
</div>
<div class='panel panel-success'>
		<div class='panel-heading'>
				<h2 class='panel-title'>最新会员</h2>
		</div>
		<div class='panel-body'>
				<?php foreach($user as $value) {?>
				<div class="media">
						<div class="media-left">
								<a href="/dashboard/<?php echo $value->id;?>">
										<img class="media-object" src="<?php echo $value->avatar;?>" alt="...">
								</a>
						</div>
						<div class="media-body media-middle">
								<?php echo $value->name;?>
						</div>
				</div>
				<?php }?>
		</div>
</div>
<div class='panel panel-success'>
		<div class='panel-heading'>
				<h2 class='panel-title'>统计数据</h2>
		</div>
		<div class='panel-body'>
				<ul class="list-group">
						<li class="list-group-item">
						<span class="badge"><?php echo $userNum;?></span>
						注册用户
						</li>
						<li class="list-group-item">
						<span class="badge"><?php echo $postNum;?></span>
						文章数
						</li>
						<li class="list-group-item">
						<span class="badge"><?php echo $commentNum;?></span>
						评论数
						</li>
				</ul>
		</div>
</div>
@endsection
