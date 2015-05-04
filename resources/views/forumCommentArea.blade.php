@extends('layout')
@section('content')
<div class='panel panel-success'>
		<div class='panel-heading'>
				<span class='panel-title'>发表评论</span>
		</div>
		<div class='panel-body'>
				<table class='table table-striped table-bordered'>
										<?php if($isLogin==0){?>
										<h3>尚未<a href='/auth/login'>登录</a><br /></h3>没有帐号？点击<a href='/auth/register'>注册</a>
										<?php }else{?>
						<tr>
										<td>
												<img class='imgSmall' src='<?php echo $user->avatar;?>'/><br />
												<?php echo $user->nickname;?><br />
										</td>
										<td>
												<form method='POST' action='/comment/<?php echo $postId;?>'>
														<div class='form-group'>
																<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
																<label class='form-control sr-only' for='userId'>用户</label>
																<input class='form-control' type='hidden' name='userId' value='<?php echo $user->id;?>' placeholder='#'/>
																<label class='form-control sr-only' for='postId'>文章id</label>
																<input class='form-control' type='hidden' name='postId' value='<?php echo $postId;?>' placeholder='#'/>
																<label class='form-control sr-only' for='parentId'>父id</label>
																<input class='form-control' type='hidden' name='parentId' value='<?php echo $parentId;?>' placeholder='#'/>
																<label class='form-control sr-only' for='comment'>评论</label>
																<textarea class='form-control' name='comment' placeholder='输入评论内容' rows='4'></textarea>
																<input class='form-control btn btn-success' type='submit' value='提交'/>
														</div>
												</form>
										</td>
						</tr>
						<?php }?>
				</table>
		</div>
</div>
						@endsection

