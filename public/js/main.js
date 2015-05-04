$(document).ready(function(){
		$.ajaxSetup({
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
		});
		$(window).scroll(function(){
		var h=$(this).scrollTop();
		if(h>0) {
				$('.navbar').stop(true,true);
				$('.navbar').animate({'height':'50px'},500);
				$('.navContent').css({'margin-top':'0'});
		}else if(h<=10){
				$('.navbar').stop(true,true);
				$('.navbar').animate({'height':'100px'},500);
				$('.navContent').css({'margin-top':'20px'});
		}
		})
})
$(window).scroll(function(){
		var h=$(this).scrollTop();
		if(h>500){
				$('#scrollUp').css({'display':'block'});
		}else {
				$('#scrollUp').css({'display':'none'});
		}
})
function scrollUp ()
{
		var h=$('#navTop').height();
		$('body').animate({scrollTop:h-50},1000);
		return false;
}
/**
 * ajax 载入页面
 */
$(document).on('click','.dashboard a',function(){
		var url=$(this).attr('href');
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('#article').remove();
						$('article').append(data);
						$('#progress').stop(true,true);
				}
		})
		console.log('xxxx');
		return false;
})
/**
 * 查看用户文章ajax
 */
function postlist(id)
{
		var url='/dashboard/'+id+'/postlist/';
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('#article').remove();
						$('article').append(data);
						$('#progress').stop(true,true);
				}
		})
		console.log('xxxx');
		return false;

}

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
		var tag=$('input[name=\'tag\']').val();
		var forumId=$('input[name=\'forumId\']').val();
		var type=$('input[name=\'type\']').val();
		var content=ue.getContent();
		var state=$('#state').val();
		var parastr={"title":title,"tag":tag,"content":content,"state":state,"forumId":forumId,"type":type}

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
 * ajax载入side
 */
function getSide()
{
		var url='/side';
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('.secondary').append(data);
						$('#progress').stop(true,true);
				}
		})
}
/**
 * ajax载入Nav
 */
function getNav()
{
		var url='/nav';
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('body').prepend(data);
				}
		})
}
/**
 * 图片页面ajax载入
 */
$(document).on('click','a.ajax',function(){
		$('.pic').fadeOut().remove();
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1},
				success:function(data) {
						$('body').prepend(data).fadeIn();
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
function getComment(id,page) //页面载入完毕获取评论页面
{
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		var url='/comment/'+id;
		$.ajax({
				url:url,
				type:'GET',
				data:{"ajax":1,"page":page},
				success:function(data){
						$('.comment').append(data);
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
function getCommentArea(postId,parentId)
{
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		var parastr={"ajax":1,"parentId":parentId};
		var url='/commentarea/'+postId;
		$.ajax({
				url:url,
				type:'GET',
				data:parastr,
				success:function(data){
						if (parentId==0) {
						$('.commentArea').empty();
						$('.commentArea').append(data);
						} else {
								$('#commentArea').css({'display':'none'});
								$('#reply-'+parentId).css({'display':'none'});
								$('#cancelReply-'+parentId).css({'display':'inline'});
								$('#commentArea-'+parentId).empty();
								$('#commentArea-'+parentId).css({'display':'block'});
								$('#commentArea-'+parentId).append(data);
						$('#progress').stop(true,true);
						}
				}
		});
}
/**
 * 回复评论
 */
function reply(postId,nickname)
{
		$('input[name=\'parentId\']').val(postId);
		$('.commentArea .panel-title').html('<a href=\'javascript:cancelReply();\'>取消回复</a>');
		$('.commentArea textarea').text('@'+nickname+':');
		var h=$('.commentArea').offset().top;
		$('body').animate({scrollTop:h},1000);
		return false;
}
/**
 * 取消评论框
 */
function cancelReply()
{
		$('input[name=\'parentId\']').val(0);
		$('.commentArea .panel-title').text('发表评论');
		$('.commentArea textarea').text('');
		return false;
}
/** function cancelReply(parentId)
{
								$('#reply-'+parentId).css({'display':'inline'});
								$('#cancelReply-'+parentId).css({'display':'none'});
								$('#commentArea').css({'display':'block'});
								$('#commentArea-'+parentId).css({'display':'none'});
}
**/
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
/**
 * 登录
 */
function login()
{
		$('#progress').css({'height':'5px'}).animate({'width':'100%'},3000);
		var email=$('input[name=\'email\']').val();
		var password=$('input[name=\'password\']').val();
		var url='/auth/login';
		var parastr={"email":email,"password":password};
		$.ajax({
				url:url,
				type:'POST',
				data:parastr,
				success:function(data){
						$('#progress').stop(true,true);
						switch(parseInt(data)){
								case 0:
										window.location.href='/';
										break;
								case 1:
										alert('错误');
										break;
								default:
										alert('1');
										break;
						}
				}
		})
		return false;
}
/**
 * 注册表单实时验证
 */
$(document).on('change','#register input',function(){
		var selector=$(this).attr('name');
		var parastr=$(this).val();
		switch(selector){
				case 'nickname':
						$.ajax({
								url:'/auth/verify',
								type:'GET',
								data:{"nickname":parastr},
								success:function(data) {
										if(data==1) {
												$('#nickname').removeClass('has-success');
												$('#nickname').addClass('has-error');
												$('#nickname input').val('').attr('placeholder','昵称已被占用');
								}else{
												$('#nickname').removeClass('has-error');
												$('#nickname').addClass('has-success');

								}
								}
						})
						break;
				case 'email':
						$.ajax({
								url:'/auth/verify',
								type:'GET',
								data:{"email":parastr},
								success:function(data) {
										if(data==1) {
												$('#email').removeClass('has-success');
												$('#email').addClass('has-error');
												$('#email input').val('').attr('placeholder','邮箱已被占用');
								}else{
												$('#email').removeClass('has-error');
												$('#email').addClass('has-success');

								}
								}
						})
						break;
				case 'password':
						$('#password').removeClass('has-error');
						$('#password').addClass('has-success');
						break;
						$('#password').removeClass('has-success');
						$('#password').addClass('has-error');
						$('#password input').val('').attr('placeholder','密码格式不正确');
				case 'confirmPassword':
						var password=$('input[name=\'password\']').val();
						if(parastr!=password)
						{
								$('#confirmPassword').removeClass('has-success');
								$('#confirmPassword').addClass('has-error');
								$('#confirmPassword input').val('').attr('placeholder','与密码不一致');
						}else{
												$('#confirmPassword').removeClass('has-error');
												$('#confirmPassword').addClass('has-success');

								}
						break;
		}
})
/**
 * 注册
 */
function register()
{
		var email=$('input[name=\'email\']').val();
		var nickname=$('input[name=\'nickname\']').val();
		var password=$('input[name=\'password\']').val();
		var url='/auth/register';
		var parastr={"email":email,"password":password,"nickname":nickname};
		$.ajax({
				url:url,
				type:'POST',
				data:parastr,
				success:function(data){
						switch(parseInt(data)){
								case 0:
										window.location.href='/active?email='+email+'&nickname='+nickname+'&activeCode=xxx';
										break;
								case 1:
										alert('错误');
										break;
								default:
										alert('1');
										break;
						}
				}
		})
		return false;
}
/**
 * 关注ajax
 */
$(document).on('click','a.follow',function(){
		var url=$(this).attr('href');
		var isFollow=parseInt($(this).attr('value'));
		$.ajax({
				url:url,
				type:'POST',
				data:{"isFollow":isFollow},
				success:function(data){
						if(data==0){
								$('a.follow').attr('value',1).text('取消关注');
						}else if(data==1) {
								$('a.follow').attr('value',0).text('关注');
						}else {
								alert('发生错误');
						}
				}
		})
		return false;
})
/**
 * 获取收藏图片页面ajax
 */
function getFollowPicPage(userId)
{
		var imgUrl=$('a.followPic').attr('imgUrl');
		var tag=$('a.followPic').attr('tag');
		var isFollow=parseInt($('a.followPic').attr('value'));
		if(isFollow==0) {
		var parastr={"imgUrl":imgUrl,"tag":tag,"isFollow":isFollow,"ajax":1};
		$.ajax({
				url:'/dashboard/'+userId+'/followpic',
				type:'GET',
				data:parastr,
				success:function(data){
						$('.ajaxArea').append(data);
						}
		})
		}else{
				var albumId=$('a.followPic').attr('albumId');
		var parastr={"imgUrl":imgUrl,"tag":tag,"isFollow":isFollow,"ajax":1,"albumId":albumId};
		$.ajax({
				url:'/dashboard/'+userId+'/followpic',
				type:'POST',
				data:parastr,
				success:function(data){
						alert('删除成功');
						}
		})
		}
		return false;
}
/**
 * 收藏图片
 */
function followPic(userId)
{
		var imgUrl=$('input[name=\'imgUrl\']').val();
		var tag=$('input[name=\'tag\']').val();
		var albumId=$('#albumId').val();
		var isFollow=$('input[name=\'isFollow\']').val();
		var parastr={"imgUrl":imgUrl,"tag":tag,"isFollow":isFollow,"albumId":albumId};
		$.ajax({
				url:'/dashboard/'+userId+'/followpic',
				type:'POST',
				data:parastr,
				success:function(data){
						$('.ajaxArea').empty();
						$('a.followPic').addClass('disabled').text('收藏成功');
				}
		})
		return false;
}
/**
 * 是否有新消息
 */
function isRead(id)
{
		var url='/'+id+'/isread';
		setInterval(function(){
				$.ajax({
						url:url,
						type:'GET',
						success:function(data){
								if(data==1){
										$('.isRead').empty();
										$('.isRead').text('你有新消息');
								}else{
										$('.isRead').empty();
								}						
						}
				})
		},300000);
}
/**
 * 清除未读信息提示
 */
$(document).on('click','a.isMsg',function(){
		var id=$(this).attr('value');
		var type=$(this).attr('type');
		var url='/clearmsg';
		var parastr={"id":id,"type":type};
		$.ajax({
				url:url,
				type:'POST',
				data:parastr,
				success:function(data){
				}
		})
})
/**
 * ajax载入分页
 */
function pageNav(page,url,num,pageSize)
{
		var postUrl='/pagenav';
		var parastr={"ajax":1,"page":page,"url":url,"num":num,"pageSize":pageSize};
		$.ajax({
				url:postUrl,
				type:'GET',
				data:parastr,
				success:function(data){
						$('.pageNav').append(data);
				}
		})

}
/**
 * 更新浏览量
 */
function view(id)
{
		var url='/view';
		$.ajax({
				url:url,
				type:'POST',
				data:{"id":id},
				success:function(data){
				}
		})
}

