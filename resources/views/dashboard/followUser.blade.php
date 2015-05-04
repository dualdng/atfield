@extends('layout')
@section('content')
<div id='article' class='col-md-9'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<?php if($authUser->id==$user->id) {?>
						<h2 class='panel-title'>我关注的人</h2>
						<?php }else{?>
						<h2 class='panel-title'>他关注的人</h2>
						<?php }?>
				</div>
				<div class='panel-body'>
						<?php foreach($followUser as $value) {?>
						<div class='col-md-3'>
								<div class="media">
										<div class="media-left">
												<a href="/dashboard/<?php echo $value->id;?>">
														<img class="media-object imgSmall" src="<?php echo $value->avatar;?>" alt="...">
												</a>
										</div>
										<div class="media-body media-middle">
												<a href="/dashboard/<?php echo $value->id;?>">
														<?php echo $value->nickname;?>
												</a>
										</div>
								</div>
						</div>
						<?php }?>
				</div>
		</div>
</div>
@endsection
