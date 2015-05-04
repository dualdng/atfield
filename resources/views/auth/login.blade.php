@extends('layout')
@section('title')
AT.field | 登录 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@endsection
@section('content')
		<div class="col-md-8 col-md-offset-2 login">
			<div class="panel panel-success">
				<div class="panel-heading">登录</div>
				<div class="panel-body">
						<img src='/image/logo.png'/>
						<?php if($isLogin==0){?>
					<form class="form-horizontal" role="form" method="POST" onsubmit='return login();' action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">记住我
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">登录</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">忘记密码?</a>
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
