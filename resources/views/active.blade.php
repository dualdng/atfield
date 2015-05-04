@extends('layout')
@section('title')
注册 | AT.field 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@section('content')
<div class='col-md-12'>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<span class='panel-title'>感谢注册AT.Field</span>
				</div>
				<div class='panel-body'>
						<div class="jumbotron">
								<h1>AT.Field.club</h1>
								<p><?php echo $nickname;?>:</p>
								<p>感谢您的注册，系统已经发送一份激活邮件至<mark><?php echo $email;?></mark>,请查看邮件并激活帐号</p>
								<p>如长时间未收到邮件请尝试以下方式：</p>
								<ul class="list-group">
										<li class="list-group-item">检查您邮箱的垃圾箱，查看是否被误认为垃圾邮件，同时请将本站邮件地址加入白名单</li>
										<li class="list-group-item">检查您邮箱地址是否正确</li>
								</ul>
										<p><a class="btn btn-primary btn-lg" href="/sendmail?email=<?php echo $email;?>&code=<?php echo $activeCode;?>" role="button">重新发送</a></p>
								<p>再次感谢您的注册!</p>
						</div>
				</div>
		</div>
</div>
@endsection
