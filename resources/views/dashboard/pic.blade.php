@extends('layout')
@section('content')
<div id='article' class='col-md-9 album'>
		<div class='panel panel-default'>
				<div class='panel-heading'>
						<h2 class='panel-title'><?php echo $pic[0]->name;?></h2>
				</div>
				<div class='panel-body'>
						<?php foreach($pic as $key=>$value){?>
						<div class='thumbnail col-md-3'>
								<a class='ajax' href='/pic/album/<?php echo $value->albumId;?>/<?php echo $key;?>'><img src='<?php echo $value->imgUrl;?>'/></a>
								<div class='caption'>
										<a class='btn btn-success followPic' href='javascript:getFollowPicPage(<?php echo $userId;?>);' albumId='<?php echo $value->albumId;?>' imgUrl='<?php echo $value->imgUrl;?>' tag='<?php echo $value->tag;?>'  value='1'>删除</a>
								</div>
						</div>
						<?php }?>
				</div>
		</div>
</div>
@endsection
