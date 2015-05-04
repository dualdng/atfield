@extends('layout')
@section('title')
AT.field | 首页 
@endsection
@section('header')
<div class='headerNarrow container-fluid'>
</div>
@endsection
@section('content')
<div class='col-md-9 single'>
		<div class='panel panel-success'>

				<?php if($type==1){?>
				<?php foreach($group as $value) {?>
				<div class='panel-heading'>
						<span class='panel-title'>
								<a href="/showgroup">小组</a></li>>
								<span><?php echo $value->name;?></span>
						</span>
				</div>
				<div class='panel-body'>
						<div class='col-md-4'>
								<div class="media">
										<div class="media-left media-middle">
												<a href="/dashboard/<?php echo $value->id;?>">
														<img class="media-object imgSmall" src="<?php echo $value->avatar;?>" alt="...">
												</a>
										</div>
										<div class="media-body">
												<span class='middle-heading textMd'><?php echo $value->name;?></span><br />
												<?php echo $value->description;?><br />
												成员数:<?php echo count($groupUser)+1;?>
										</div>
								</div>
						</div>
						<div class='col-md-4'>
								<p> </p>
								创建者:<?php echo $value->nickname;?><br />
								<?php echo date('Y-m-d',time($value->created_at));?>
						</div>
				</div>
		</div>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<span class='panel-title'>最新帖子</span>
				</div>
				<div class='panel-body'>
						<div class='new'>
								<a class='btn btn-success btn-lg' href='/dashboard/<?php echo $userId;?>/post?type=1&name=<?php echo $value->name;?>&forumId=<?php echo $value->id;?>'>发布新帖</a>
						</div>
						<?php }?>
						<?php }else{?>
						<?php foreach($section as $value) {?>
						<div class='panel-heading'>
								<span class='panel-title'>
										<a href="/showsection">版块</a></li>>
										<span><?php echo $value->shortname;?></span>
								</span>
						</div>
						<div class='panel-body'>
								<div class='col-md-12'>
										<div class="media">
												<div class="media-left media-middle">
														<a href="/dashboard/<?php echo $value->id;?>">
																<img class="media-object imgSmall" src="<?php echo $value->avatar;?>" alt="...">
														</a>
												</div>
												<div class="media-body">
														<span class='middle-heading textMd'><?php echo $value->shortname;?></span><br />
														<?php echo $value->description;?><br />
												</div>
										</div>
								</div>
						</div>

				</div>
		<div class='panel panel-success'>
				<div class='panel-heading'>
						<span class='panel-title'>最新帖子</span>
				</div>
				<div class='panel-body'>
						<div class='new'>
								<a class='btn btn-success btn-lg' href='/dashboard/<?php echo $userId;?>/post?type=2&name=<?php echo $value->name;?>&forumId=<?php echo $value->id;?>'>发布新帖</a>
						</div>
						<?php }?>
						<?php }?>
												<table class='table table-striped table-bordered'>
								<tr>
										<td>状态</td>
										<td>标题</td>
										<td>作者</td>
										<td>查看</td>
										<td>回复</td>
										<td>发布时间</td>
										<td>最新回复</td>
								</tr>
<?php foreach($postTop as $value){?>
								<tr>
										<td><span class=''>置顶</span></td>
										<td><a href='/forum/<?php echo $value->id;?>'><?php echo $value->title;?></a></td>
										<td><a href='/dashboard/<?php echo $value->userId;?>'><?php echo $value->nickname;?></a></td>
										<td><?php echo $value->view;?></td>
										<td><?php echo $value->commentNum;?></td>
										<td><?php echo date('Y-m-d h-i-s',time($value->created_at));?></td>
										<td>
												<p><?php echo $value->lastComment;?></p>
												<?php echo $value->lastCommentAuthor;?>-
												<?php echo $value->lastCommentDate;?>
								</td> </tr>
						<?php }?>

								<?php foreach($post as $value){?>
								<tr>
										<td><span class=''>正常</span></td>
										<td><a href='/forum/<?php echo $value->id;?>'><?php echo $value->title;?></a></td>
										<td><a href='/dashboard/<?php echo $value->userId;?>'><?php echo $value->nickname;?></a></td>
										<td><?php echo $value->view;?></td>
										<td><?php echo $value->commentNum;?></td>
										<td><?php echo date('Y-m-d h-i-s',time($value->created_at));?></td>
										<td>
												<p><?php echo $value->lastComment;?></p>
												<?php echo $value->lastCommentAuthor;?>-
												<?php echo $value->lastCommentDate;?>
								</td> </tr>
								<?php }?>
						</table>
				</div>
		</div>
		<div class='pageNav text-center'>
		</div>
		<div class='adsMiddle'>
		</div>
</div>
<div class='col-md-3 secondary'>
</div>
<script>
		$(function(){
				getSide();
				pageNav('<?php echo $page;?>','<?php echo $url;?>','<?php echo $num;?>','<?php echo $pageSize;?>')
		})
</script>
@endsection

