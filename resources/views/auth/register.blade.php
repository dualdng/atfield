@extends('layout')
@section('title')
注册 | AT.field 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@section('content')
		<div class="col-md-8 col-md-offset-2 register">
			<div class="panel panel-default">
				<div class="panel-heading">注册帐号</div>
				<div class="panel-body">
						<img src='/image/logo.png'/>
						<?php if($isLogin==0){?>
					<form id='register' class="form-horizontal" role="form" method="POST"  action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div id='nickname' class="form-group has-feedback">
							<label class="col-md-4 control-label">昵称</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nickname" placeholder='昵称(必填)'>
								<span class='glyphicon glyphicon-ok form-control-feedback sr-only'></span>
								<span class='glyphicon glyphicon-error form-control-feedback sr-only'></span>
							</div>
						</div>

						<div id='email' class="form-group has-feedback">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" placeholder='邮箱(必填)'>
								<span class='glyphicon glyphicon-ok form-control-feedback sr-only'></span>
								<span class='glyphicon glyphicon-error form-control-feedback sr-only'></span>
							</div>
						</div>

						<div id='password' class="form-group has-feedback">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" placeholder='密码(必须)'>
								<span class='glyphicon glyphicon-ok form-control-feedback sr-only'></span>
								<span class='glyphicon glyphicon-error form-control-feedback sr-only'></span>

							</div>
						</div>

						<div id='confirmPassword' class="form-group has-feedback">
							<label class="col-md-4 control-label">确认密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="confirmPassword" placeholder='确认密码'>
								<span class='glyphicon glyphicon-ok form-control-feedback sr-only'></span>
								<span class='glyphicon glyphicon-error form-control-feedback sr-only'></span>

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
										注册
								</button>
							</div>
						</div>
					</form>
					<?php }else {?>
					<h3 class='text-center'>你已经登录!</h3>
					<?php }?>
				</div>
			</div>
		</div>
@endsection
