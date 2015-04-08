$(document).ready(function(){
		$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});
		$(window).scroll(function(){
		var h=$(this).scrollTop();
		if(h>0) {
				$('nav').stop(true,true);
				$('nav').animate({'height':'50px'},500);
				$('.navContent').css({'margin-top':'0'});
		}else if(h<=10){
				$('nav').stop(true,true);
				$('nav').animate({'height':'100px'},500);
				$('.navContent').css({'margin-top':'20px'});
		}
		})
})
/**
 * ajax 载入页面
 */
$(document).on('click','.dashboard a',function(){
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('#article').remove();
						$('article').append(data);
				}
		})
		console.log('xxxx');
		return false;
})
/**
 * 编辑文章页面
 */
/**
 * 发表文章
 * id 为用户id
 */
function postPost(id)
{
		var title=$('input[name=\'title\']').val();
		var category=$('#category').val();
		var tag=$('input[name=\'tag\']').val();
		var content=ue.getContent();
		var state=$('#state').val();
		var parastr={"title":title,"category":category,"tag":tag,"content":content,"state":state}

		var url='/dashboard/'+id+'/post';
		$.ajax({
				url:url,
				type:'POST',
				data:parastr,
				success:function(data) {
						if(data==1) {
								var h=$('nav').height();
								$('body').animate({scrollTop:h-50},1000);
								$('#article').fadeOut();
								$('#article').empty();
								$('#article').html('<h2>发布成功!</h2>');
								$('#article').fadeIn();
						}else {
								alert('发布失败，请重试');
						}
				}
		})
		return false;
}
/**
 * 图片页面ajax载入
 */
$(document).on('click','.box a',function(){
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('body').prepend(data);
				}
		})
		return false;
})
/**
 * 图片页面关闭
 */
function closePic()
{
		$('.pic').fadeOut().remove();
		return false;
}
/**
 * 获取评论列表
 * id 文章id
 */
function getComment(id) //页面载入完毕获取评论页面
{
		$('#progress').css({'height':'2px'}).animate({'width':'100%'},15000);
		var url='/comment/'+id;
		$.ajax({
				url:url,
				type:'GET',
				success:function(data){
						$('#comment').empty();
						$('#comment').append(data);
						$('#progress').stop(true,true);
						$('#progress').fadeOut();
				}
		});
}
/**
 * 获取评论框
 * userId为用户id
 * postId为文章id
 * parentId为评论父id 
 */
function getCommentArea(userId,postId,parentId)
{
		var parastr={"userId":userId,"postId":postId,"parentId":parentId};
		var url='/commentarea';
		$.ajax({
				url:url,
				type:'GET',
				data:parastr,
				success:function(data){
						if (parentId==0) {
						$('#commentArea').empty();
						$('#commentArea').append(data);
						} else {
								$('#commentArea').css({'display':'none'});
								$('#reply-'+parentId).css({'display':'none'});
								$('#cancelReply-'+parentId).css({'display':'inline'});
								$('#commentArea-'+parentId).empty();
								$('#commentArea-'+parentId).css({'display':'block'});
								$('#commentArea-'+parentId).append(data);
						}
				}
		});
}
/**
 * 取消评论框
 */
function cancelReply(parentId)
{
								$('#reply-'+parentId).css({'display':'inline'});
								$('#cancelReply-'+parentId).css({'display':'none'});
								$('#commentArea').css({'display':'block'});
								$('#commentArea-'+parentId).css({'display':'none'});
}
/**
 * 评论ajax翻页
 */
$(document).on('click','#pageNav a',function(){ //评论ajax翻页

		$('#progress').css({'height':'2px'}).animate({'width':'100%'},15000);
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						$('#commentBody').remove();
						$('#comment').append(data);
						$('#progress').stop(true,true);
						$('#progress').fadeOut();
				}
		});
		return false;
})
/**
 * 发表评论
 */
function postComment()
{
		var userId=$('#userId').val();
		var postId=$('#postId').val();
		var parentId=$('#parentId').val();
		var comment=$('#commentText').val();
		var parastr={"userId":userId,"postId":postId,"parentId":parentId,"comment":comment};
		var url='/Comment/'+postId;
		$.ajax({
				url:url,
				type:'POST',
				data:parastr,
				success:function(data) {
						$('#commentArea').empty();
						$('#commentArea').append(data);
				}

		});
		return false;
}

