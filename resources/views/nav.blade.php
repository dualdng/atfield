@extends('layout')
@section('content')
				<nav class="navbar navbar-fixed-top">
				<div class="navContent container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="/"><img src='/image/logo.png' alt='AT.Field'/></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
										<li class="active"><a href="/showgroup">小组 <span class="sr-only">(current)</span></a></li>
										<li><a href="/showsection">论坛</a></li>
										<li><a href="/picfall">图墙</a></li>
										<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">施工中 <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
												<li class="divider"></li>
												<li><a href="#">One more separated link</a></li>
										</ul>
										</li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
<?php if($isLogin==0){?>
										<li><a href="/auth/login">登录</a></li>
										<li><a href="/auth/register">注册</a></li>
<?php } else {?>
										<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我的帐号 <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
										<li><a href="/dashboard/<?php echo $userId;?>">用户首页</a></li>
												<li><a href="/auth/logout">登出</a></li>
												<li class="divider"></li>
												<li></li>
										</ul>
										</li>
										<li><a class='isRead' href='/dashboard/<?php echo $userId;?>'></a><li>
<script>
$(function(){
		isRead(<?php echo $userId;?>);
})
</script>
<?php }?>
								</ul>
						</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
<div id='progress'>
</div>
</nav>
@endsection

