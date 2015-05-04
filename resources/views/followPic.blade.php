@extends('layout')
@section('content')
<form method='POST' onsubmit='return followPic(<?php echo $userId;?>);'>
		<input class='sr-only' type='text' name='imgUrl' value='<?php echo $imgUrl;?>'/>
		<input class='sr-only' type='text' name='tag' value='<?php echo $tag;?>'/>
		<input class='sr-only' type='text' name='isFollow' value='<?php echo $isFollow;?>'/>
		<label for='albumId'>选择相册</label>
		<select class='form-control' id='albumId' name='albumId'>
				<?php foreach($album as $value){?>
				<option value='<?php echo $value->id;?>'><?php echo $value->name;?></option>
				<?php }?>
		</select>
		<input class='form-control btn btn-success' type='submit' value='提交'/>
</form>
@endsection
