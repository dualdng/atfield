@extends('layout')
@section('content')
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<?php if($authUser->id==$user->id) {?>
						<h2 class='panel-title'>我的相册</h2>
						<?php }else{?>
						<h2 class='panel-title'>他的相册</h2>
						<?php }?>
				</div>
				<div class='panel-body'>
						<table class='table table-striped table-bordered'>
								<tr>
										<td>序号</td>
										<td>名称</td>
										<td>操作</td>
								</tr>
								<?php foreach($album as $value) {?>
								<tr>
										<td>
										</td>
										<td>
												<div class="media">
														<div class="media-left">
																<a href="/dashboard/<?php echo $value->id;?>">
																		<img class="media-object imgSmall" src="<?php echo $value->avatar;?>" alt="...">
																</a>
														</div>
														<div class="media-body media-middle">
																<a href="/dashboard/<?php echo $value->id;?>">
																		<?php echo $value->name;?>
																</a><br />
																<?php echo $value->description;?>
														</div>
												</div>
										</td>
										<td class='dashboard'>
												<?php if($authUser->id==$user->id) {?>
												<a class='btn btn-success' href='#'>删除</a>
												<?php }?>
												<a class='btn btn-success' href='/dashboard/<?php echo $user->id;?>/album/<?php echo $value->id;?>'>查看</a>
										</td>
								</tr>
								<?php }?>
						</table>
				</div>
		</div>
</div>
@endsection
