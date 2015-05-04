<?php namespace App\Http\Controllers\Dashboard;

use App\Model\User;
use App\Model\Relation;
use App\Model\Group;
use App\Model\Album;
use App\Model\Collect;
use App\Model\Comment;
use Auth;
use App\Model\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ThumbnailsController;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class MainController extends Controller {
		private $isLogin;
		private $authUser;
		public function __construct()
		{
						$this->isLogin=1;
						$this->authUser=Auth::user();
		}
		/**
		 * 获取文章
		 * $id 被访问的用户id
		 * $user 被访问用户的用户实例 
		 * $authUser 登录用户的用户实例
		 */
		public function index(Request $request,$id)
		{
				//
				$data=array();
				$user=User::find($id);
				$data['user']=$user;
				$post=Post::getPostTitle($id);
				$data['num']=count($post);
				$ajax=0;
				$data['ajax']=$ajax;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$result=count(Relation::where('author',$this->authUser->id)->where('followId',$id)->where('type',2)->get());
				if($result!==0) {
						$data['isFollow']=1;
				}else {
						$data['isFollow']=0;
				}
				$isReadPost=Post::isRead($id);
				$isReadPost=array_slice($isReadPost,0,5);
				if(count($isReadPost)!=0){
						$data['isReadPost']=$isReadPost;
				}
				$isReadComment=Comment::isRead($id);
				$isReadComment=array_slice($isReadComment,0,5);
				if(count($isReadComment)!=0){
						$data['isReadComment']=$isReadComment;
				}
				return view('dashboard.index',$data);
		}
		public function profile(Request $request,$id)
		{
				//
				$data=array();
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$ajax=$request->input('ajax');
				$data['ajax']=isset($ajax)?$ajax:0;
				$post=Post::getPostTitle($id);
				$data['num']=count($post);
				$data['id']=$id;
				$user=User::find($id);
				$data['user']=$user;
				$result=count(Relation::where('author',$this->authUser->id)->where('followId',$id)->where('type',2)->get());
				if($result!==0) {
						$data['isFollow']=1;
				}else {
						$data['isFollow']=0;
				}
				return view('dashboard.profile',$data);
		}

		/**
		 * 文章发布页面
		 * $id 登录用户id
		 */
		public function postPage(Request $request,$id)
		{
				$data=array();
				$data['userId']=$this->authUser->id;
				$ajax=$request->input('ajax');
				$data['type']=$request->input('type');
				$data['forumName']=$request->input('name');
				$data['forumId']=$request->input('forumId');
				$data['ajax']=isset($ajax)?$ajax:0;
				return view('dashboard.post',$data);
		}
		/**
		 * 更新头像
		 */
		public function postAvatar(Request $request,$id)
		{
				//
				$user=User::find($id);
				$path=dirname(dirname(dirname(dirname(dirname('__SELF__'))))).'/avatar/'; //头像储存目录
				$file=$request->file('avatar');
				$type=$file->getMimeType();
				$type=explode('/',$type);
				$name=$id.'.'.$type[1]; //头像名称
				$result=array();
				if ($file->getError() > 0)
				{
						$result['error']='Error: ' . $file->getError() ;
				}
				else
				{
						$file->move($path,$name); //将头像移动
						$result['store']='Stored in: ' . $path . 'Named : '.$name;
						$thumbnails=new ThumbnailsController($path.$name,'200','200');
						$thumbnails->produce();
						$avatar='/avatar/small/'.$name;
						$user->avatar=$avatar;
						$user->save();
				}
				$data=array();
				$data['id']=$id;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				$ajax=0;
				$data['ajax']=$ajax;
				$post=Post::getPostTitle($id);
				$data['num']=count($post);
				return view('dashboard.index',$data);
		}


		/**
		 * 发布文章
		 */
		public function postPost(Request $request,$id)
		{
				//
				$title=$request->input('title');
				$tag=$request->input('tag');
				$content=$request->input('content');
				$type=$request->input('type');
				$forumId=$request->input('forumId');
				if(!get_magic_quotes_gpc()) {
						$content=addslashes($content);
				}
				$state=$request->input('state');
				$result=Post::create(array('title'=>$title,'content'=>$content,'tag'=>$tag,'type'=>$type,'forumId'=>$forumId,'state'=>$state,'author'=>$id));
				if($result){
						if($type==1){
								return redirect('/group/forum/'.$forumId);
						}else{
								return redirect('/section/forum/'.$forumId);
						}
				}else{
						return 0;
				}
		}
		/*
		 *帖子列表 
		 */
		public function postList(Request $request,$id)
		{
				$post=Post::getPostTitle($id);
				$data=array();
				$ajax=$request->input('ajax');
				$data['ajax']=isset($ajax)?$ajax:0;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$data['id']=$id;
				$data['post']=$post;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.postList',$data);
		}
		/**
		 *编辑帖子
		 */
		public function editPost(Request $request,$id,$postId)
		{
				$data=array();
				$post=Post::find($postId);
				$ajax=$request->input('ajax');
				$data['ajax']=isset($ajax)?$ajax:0;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$data['postId']=$postId;
				$data['post']=$post;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.editPost',$data);
		}
		/**
		 * 关注用户
		 * $id为用户id
		 * $userId为被关注用户id；
		 */
		public function followUser(Request $request,$id,$userId)
		{
				$isFollow=$request->input('isFollow');
				if($isFollow==0){
						$result=Relation::create(['author'=>$id,'followId'=>$userId,'type'=>'2']);
						return 0;
				}else{
						$result=Relation::where('author',$id)->where('followId',$userId)->where('type',2)->delete();
						return 1;
				}
				return 2;
		}
		/**
		 * 获取关注的用户列表
		 * $id为用户id
		 */
		public function getFollowUser(Request $request,$id)
		{
				$result=Relation::getFollowUser($id);
				$data=array();
				$data['ajax']=$request->input('ajax');
				$data['followUser']=$result;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.followUser',$data);
		}
		/**
		 * 获取关注用户的动态
		 * $id为用户id
		 */
		public function getFollowUserState(Request $request,$id)
		{
				$result=Relation::getFollowUser($id);
				$data=array();
				$post=array();
				foreach($result as $value){
						$temp=array_slice(Post::getPostTitle($value->id),0,5);
						if(count($temp)>0){
								$post[]=$temp;
						}
				}
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$data['ajax']=$request->input('ajax');
				$user=User::find($id);
				$data['user']=$user;
				$data['followPost']=array_slice($post,0,10);
				return view('dashboard.followUserState',$data);
		}

		/**
		 * 关注文章
		 */
		public function getFollowPost(Request $request,$id)
		{
				$result=Relation::getFollowPost($id);
				$data=array();
				$data['ajax']=$request->input('ajax');
				$data['followPost']=$result;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.followPost',$data);

		}
		/**
		 * 我加入的群组
		 */
		public function getMyGroup(Request $request,$id)
		{
				$data=array();
				$result=Relation::getFollowGroup($id);
				$data['ajax']=$request->input('ajax');
				$data['group']=$result;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.group',$data);
		}
		/**
		 * 小组创建页面
		 */
		public function newGroup(Request $request,$id)
		{
				$data=array();
				$data['ajax']=$request->input('ajax');
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.newGroup',$data);
		}
		/**
		 * 小组创建过程
		 */
		public function postGroup(Request $request,$id)
		{
				$shortname=$request->input('shortname');
				$description=$request->input('description');
				$path=dirname(dirname(dirname(dirname(dirname('__SELF__'))))).'/group/'; //头像储存目录
				$file=$request->file('avatar');
				$type=$file->getMimeType();
				$type=explode('/',$type);
				$name=$id.time().'.'.$type[1]; //头像名称
				$result=array();
				if ($file->getError() > 0)
				{
						$result['error']='Error: ' . $file->getError() ;
				}
				else
				{
						$file->move($path,$name); //将头像移动
						$result['store']='Stored in: ' . $path . 'Named : '.$name;
						$thumbnails=new ThumbnailsController($path.$name,'200','200');
						$thumbnails->produce();
						$avatar='/group/small/'.$name;
				}

				$name=$request->input('name');
				$shortname=$request->input('shortname');
				$description=$request->input('description');
				$result=Group::create(['author'=>$id,'name'=>$name,'shortname'=>$shortname,'description'=>$description,'avatar'=>$avatar]);
				return redirect('/dashboard/'.$id);
		}
		/**
		 * 我创建的小组页面
		 */
		public function group(Request $request,$id)
		{
				$data=array();
				$result=Group::where('author',$id)->get();
				$data['ajax']=$request->input('ajax');
				$data['group']=$result;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.group',$data);
		}
		/**
		 * 关注图片相册选择页面
		 */
		public function getFollowPicPage(Request $request,$id)
		{
				$data=array();
				$data['userId']=$id;
				$data['imgUrl']=$request->input('imgUrl');
				$data['tag']=$request->input('tag');
				$data['isFollow']=$request->input('isFollow');
				$data['ajax']=$request->input('ajax');
				$result=Album::where('author',$id)->get();
				if(count($result)==0){
						$avatar='/avatar/default.jpg';
						$result=Album::create(['author'=>$id,'name'=>'默认相册','description'=>'这是一个默认相册','avatar'=>$avatar]);
				}
				$data['album']=$result;
				return view('followPic',$data);
		}
		/**
		 * 关注图片
		 * $id为用户id
		 * $imgUrl为被关注图片url；
		 */
		public function followPic(Request $request,$id)
		{
				$imgUrl=$request->input('imgUrl');
				$albumId=$request->input('albumId');
				$isFollow=$request->input('isFollow');
				$tag=$request->input('tag');
				if($isFollow==0){
						$result=Collect::create(['author'=>$id,'imgUrl'=>$imgUrl,'albumId'=>$albumId,'tag'=>$tag]);
						return 0;
				}else{
						$result=Collect::where('author',$id)->where('imgUrl',$imgUrl)->delete();
						return 1;
				}
				return 2;
		}

		/**
		 * 相册创建页面
		 */
		public function newAlbum(Request $request,$id)
		{
				$data=array();
				$data['ajax']=$request->input('ajax');
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.newAlbum',$data);
		}
		/**
		 * 相册创建过程
		 */
		public function postAlbum(Request $request,$id)
		{
				$name=$request->input('name');
				$description=$request->input('description');
				$avatar='/avatar/default.jpg';
				$result=Album::create(['author'=>$id,'name'=>$name,'description'=>$description,'avatar'=>$avatar]);
				return redirect('/dashboard/'.$id);
		}
		/**
		 * 我的相册
		 */
		public function album(Request $request,$id)
		{
				$data=array();
				$result=Album::where('author',$id)->get();
				foreach($result as $value){
						$pic=Collect::getPic($value->id);
						if(count($pic)!=0){
								$value->avatar=$pic[0]->imgUrl;
						}
				}
				$data['ajax']=$request->input('ajax');
				$data['album']=$result;
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.album',$data);
		}
		/**
		 * 我的图片
		 *
		 */
		public function pic(Request $request,$id,$albumId)
		{
				$data=array();
				$result=Collect::getPic($albumId);
				$data['pic']=$result;
				$data['ajax']=$request->input('ajax');
				$data['isLogin']=$this->isLogin;
				$data['authUser']=$this->authUser;
				$data['userId']=$this->authUser->id;
				$user=User::find($id);
				$data['user']=$user;
				return view('dashboard.pic',$data);

		}
		/**
		 * 查看图片
		 *$i为 数组索引号 
		 */
		public function getPic(Request $request,$albumId,$i)
		{
				$data=array();
				$temp=array();
				$result=Collect::getPic($albumId);
				foreach($result as $key=>$value){
						if($key==$i){
								$value->content=$value->imgUrl;
								$value->id=$value->albumId;
								$data['post']=$value;
						}
				}
				$data['ajax']=$request->input('ajax');
				$data['i']=$i;
				$data['type']=2;
				$data['num']=count($result);
				$data['userId']=$this->authUser->id;
				return view('pic',$data);

		}
		/**
		 * 清除通知
		 */
		public function clearMsg(Request $request)
		{
				$id=$request->input('id');
				$type=$request->input('type');
				if($type=='post'){
						$result=Post::find($id);
						$result->isRead=0;
						$result->save();
				}else{
						$result=Comment::find($id);
						$result->isRead=0;
						$result->save();
				}
		}
}
