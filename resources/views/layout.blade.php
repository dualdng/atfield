<?php 
/**
 * $ajax 判断是否是ajax请求数据 1 是 0 否
 * $isLogin 判断用户是否登录 1 是 0 否
 */
?>
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

				<link rel='stylesheet' href='/umeditor/themes/default/css/umeditor.css'>
				<link rel="stylesheet" href="/css/main.css">

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
				<header>
				@yield('header')
				</header>
				<article class='container'>
				<?php }?>
				@yield('content')
				<?php if($ajax==0){?>
				</article>
				<footer>
<div id='scrollUp' style='display:none'><a href='javascript:scrollUp();'><span class='glyphicon glyphicon-plane'></span></a></div>
				<div class='footer container-fluid'>
						<div class='container'>
								<div class='row'>
										<div class='col-md-3'>
												<h4>关于网站</h4>
												<p><a href='/any/1'>关于本站</a></p>
												<p><a href='/4'>广告投放</a></p>
										</div>
										<div class='col-md-3'>
												<h4>常用链接</h4>
												<p><a href='#'>百度</a></p>
												<p><a href='#'>网站建设</a></p>
										</div>
										<div class='col-md-3'>
												<h4>内容许可</h4>
												<p><a href='/any/3'>版权申明</a></p>
												<p><a href='/any/2'>用户须知</a></p>
										</div>

										<div class='col-md-3'>
												<h4>联系我们</h4>
												<address>
														<strong><a href='/any/5'>AT.Field</a></strong><br>
														<abbr title="MailTo">MailTo:</abbr><a href="mailto:#">admin@atfield.club</a>
												</address>

										</div>
								</div>
						</div>

				</div>
<!--百度分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"3","bdPos":"left","bdTop":"100"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
				@yield('footer')
<script>
$(function(){
		getNav();
})
</script>
				</footer>
		</body>
</html>
<?php }?>
