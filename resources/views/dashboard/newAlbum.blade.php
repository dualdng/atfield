@extends('layout')
@section('content')
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<h2 class='panel-title'>欢迎：<?php echo $authUser->nickname;?></h2>
				</div>
				<div class='panel-body'>
						<form method='POST' action='/dashboard/<?php echo $authUser->id;?>/newalbum' enctype='multipart/form-data'>
								<input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
										<label class='sr-only' for='avatar'>更换头像</label>
										<input class='form-control sr-only' type='file' name='avatar'/>
										<label class='sr-only' for='avatar'>更换头像</label>
										<label for='name'>相册名称</label>
										<input class='form-control' type='text' name='name'/>
										<label for='shortname'>小组简称</label>
										<input class='form-control sr-only' type='text' name='shortname'/>
										<label for='description'>说明</label>
										<input class='form-control' type='text' name='description'/>
										<input class='form-control btn btn-success' type='submit' value='提交'/>
						</form>
				</div>
		</div>

</div>
@endsection
