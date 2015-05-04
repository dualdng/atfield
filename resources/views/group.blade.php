@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@endsection
@section('content')
<div class='col-md-9 single group'>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<span class='panel-title'>
								<a href="/"> 首页 </a></li>>
								<span>小组</span>
						</span>
				</div>
				<div class='panel-body'>
						<?php foreach($group as $value) {?>
								<div class="media">
										<div class="media-left media-middle">
												<a href="/group/forum/<?php echo $value->id;?>">
														<img class="media-object imgSmall" src="<?php echo $value->avatar;?>" alt="...">
												</a>
										</div>
										<div class="media-body">
												<a href='/group/forum/<?php echo $value->id;?>'><h4 class='middle-heading'><?php echo $value->name;?></h4></a>
												<?php echo $value->description;?>
										</div>
								</div>
						<?php }?>
				</div>
		</div>
		<div class='adsMiddle'>
		</div>
</div>
<div class='col-md-3 secondary'>
</div>
<script>
		$(function(){
				getSide();
		})
</script>
@endsection

