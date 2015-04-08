<?php if($ajax==0){?>
<!DOCTYPE html>
<html>
		<head>
				<meta charset='utf-8'/>
				<meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- laravel的放夸域请求验证 -->
				<title>@yield('title')</title>
				<meta name='description' content='What a beauty life!' />
				<meta name='keywords' content='Brague,WordPress,Emlog,php' />
				<meta name='author' content='Tinty' />
				<link rel='shortcut icon' href='/favicon.ico'>
				<!-- 新 Bootstrap 核心 CSS 文件 -->
				<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

				<!-- 可选的Bootstrap主题文件（一般不用引入） -->
				<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">

				<link rel="stylesheet" href="/css/main.css">
				<link rel='stylesheet' href='/umeditor/themes/default/css/umeditor.css'>

				<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
				<script src="/js/jquery-2.1.0.min.js"></script>

				<script src="/js/jquery.masonry.min.js"></script>
				<script src="/js/main.js"></script>

				<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
				<script src="/bootstrap/js/bootstrap.min.js"></script>
				<script src="/umeditor/umeditor.min.js"></script>
				<script src="/umeditor/umeditor.config.js"></script>
		</head>
		<body>
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
								<a class="navbar-brand" href="#">Brand</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
										<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
										<li><a href="#">Link</a></li>
										<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
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
										<li><a href="#">登录</a></li>
										<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li class="divider"></li>
												<li><a href="#">Separated link</a></li>
										</ul>
										</li>
								</ul>
						</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
				</nav>
				<header>
				@yield('header')
				</header>
				<article class='container'>
				<?php }?>
				@yield('content')
				<?php if($ajax==0){?>
				</article>
				<footer>
				<div class='footer container-fluid'>
						<div class='container'>
								<div class='row'>
										<div class='col-md-3'>
												<h4>关于网站</h4>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
										</div>
										<div class='col-md-3'>
												<h4>常用链接</h4>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
										</div>
										<div class='col-md-3'>
												<h4>关注我们</h4>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
										</div>
										<div class='col-md-3'>
												<h4>内容许可</h4>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
												<p><a href='#'>测试链接</a></p>
										</div>
								</div>
						</div>

				</div>
				@yield('footer')
				</footer>
		</body>
</html>
<?php }?>
