<?php namespace App\Http\Controllers;

use Auth;
use App\Model\User;
use App\Model\Post;
use App\Model\Trigger;
use App\Model\Comment;
use App\Model\Group;
use App\Model\Relation;
use App\Model\Collect;
use App\Model\Album;
use App\Model\Section;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyBaseController;
use Illuminate\Http\Request;

class MainController extends Controller {
		private $post;
		private $collect;
		private $userId;
		private $isLogin;
		private $user;
		/**
		 * 判断数据库是否有变化或者是否存在缓存
		 */
		public function __construct()
		{
/**				$cached=Trigger::find(1)->cached;
				if($cached==1||!Cache::has('post')) {
						Cache::forget('post');
						$post=Post::getPost();
						$this->post=$post;
						Cache::put('post',serialize($post),30*24);
						$trigger=Trigger::find(1);
						$trigger->cached='0';
						$trigger->save();
				}else{
						$this->post=unserialize(Cache::get('post'));
				}
				**/
				$this->post=Post::getPost();
				$this->collect=Collect::getAllPic();
				if(Auth::check()){
						$this->isLogin=1;
						$this->user=Auth::user();
				}else{
						$this->isLogin=0;
				}
		}
		/**
		 *首页
		 */
		public function index()
		{
				$data=array();
				$tempA=array();
				$tempB=array();
				$tempC='';
				$tempD=array();
				$tempE=array();
				$tempF=array();
				foreach($this->post as $value){
								$value->img=MyBaseController::getImage(stripslashes($value->content));
								$value->tag=explode(',',$value->tag);
						if($value->forumId==1&&$value->type==2){
								$tempA[]=$value;
						}elseif($value->forumId==2&&$value->type==2){
								$tempB[]=$value;
						}elseif($value->forumId==3&&$value->type==2){
								$tempD[]=$value;
						}elseif($value->forumId==8&&$value->type==2){
								$tempE[]=$value;
						}elseif($value->forumId==4&&$value->type==2){
								$tempF[]=$value;
						}
				}
				$data['isLogin']=$this->isLogin;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['ajax']=0;
				$data['postA']=array_slice($tempA,0,7);
				$data['postB']=array_slice($tempB,0,10);
				$data['postD']=array_slice($tempD,0,6);
				$data['postE']=array_slice($tempE,0,6);
				$data['postF']=array_slice($tempF,0,6);
				$tempC=$this->collect;
				$data['postC']=array_slice($tempC,0,10);
				$data['post']=$this->post;
				$data['nickname']=isset($this->user)?$this->user->nickname:'无';
				return view('index',$data);
		}
		/**
		 * ajax获取侧边栏
		 */
		public function getSide(Request $request)
		{
				$data=array();
				$data['isLogin']=$this->isLogin;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['ajax']=$request->input('ajax');
				$data['post']=$this->post;
				$data['nickname']=isset($this->user)?$this->user->nickname:'无';
				$user=User::all();
				$userNum=count($user);
				$commentNum=count(Comment::all());
				$postNum=count(Post::all());
				$user=$user->slice(0,5);
				$data['user']=$user;
				$data['userNum']=$userNum;
				$data['commentNum']=$commentNum;
				$data['postNum']=$postNum;
				return view('side',$data);
		}
		/**
		 * ajax获取导航条
		 */
		public function getNav(Request $request)
		{
				$data=array();
				$data['isLogin']=$this->isLogin;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['ajax']=$request->input('ajax');
				return view('nav',$data);

		}

		/**
		 * 获取文章页
		 * $id 文章id
		 */
		public function getSingle($id)
		{
				$data=array();
				$post=$this->post;
				foreach($post as $value) {
						if($value->id==$id) {
								$data['type']=$value->type;
								if($value->type==1){
										$result=Group::find($value->forumId);
										$value->forum=$result->name;
								}else {
										$result=Section::find($value->forumId);
										$value->forum=$result->name;
								}
								$value->content=stripslashes($value->content);
								$value->img=MyBaseController::getAllImageUrl($value->content);
								$data['post']=$value;
						}
				}
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['ajax']=0;
				return view('single',$data);
		}

		/**
		 * 获取图片墙
		 */
		public function getPicFall(Request $request)
		{
				$data=array();
				$tag=array();
				$temp=array();
				$page=$request->input('page');
				$data['page']=isset($page)?$page:1;
				$page=$data['page'];
				$pageSize=20;
				$data['pageSize']=$pageSize;
				$ajax=$request->input('ajax');
				$data['ajax']=isset($ajax)?$ajax:0;
				$result=Collect::getAllPic();
				$num=count($result);
				$data['pageNum']=ceil($num/$pageSize);
				$result=array_slice($result,($page-1)*$pageSize,$page*$pageSize);
				foreach($result as $value){
						$tag[]=explode(',',$value->tag);
				}
				/*
				 * 获取标签云
				 */
				foreach($tag as $a){
						foreach($a as $b){
								$temp[]=$b;
						}
				}
				$data['tag']=array_unique($temp);
				$data['pic']=$result;
				return view('picfall',$data);
		}
		/**
		 * 图片页
		 * $id 为文章id,
		 * $i为图片数组索引号
		 */
		public function getPic(Request $request,$id,$i)
		{
				$data=array();
				$temp=array();
				$ajax=$request->input('ajax');
				$ajax=isset($ajax)?$ajax:0;
				foreach($this->post as $value){
						if($value->id==$id){
								$post=$value;
						}
				}
				$temp=MyBaseController::getAllImageUrl(stripslashes($post->content));
				$post->content=$temp[$i];
				$data['isLogin']=$this->isLogin;
				$data['type']=1;
				$data['ajax']=$ajax;
				$data['id']=$id;
				$data['i']=$i;
				$data['num']=count($post->content);
				$data['post']=$post;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['nickname']=isset($this->user)?$this->user->nickname:'无';
				return view('pic',$data);
		}
		/**
		 * 图片页-图片墙
		 */
		public function pic(Request $request,$i)
		{
				$data=array();
				$data['type']=3;
				$ajax=$request->input('ajax');
				$ajax=isset($ajax)?$ajax:0;
				$data['ajax']=$ajax;
				$result=Collect::getAllPic();
				foreach($result as $key=>$value){
						if($key==$i){
								$value->content=$value->imgUrl;
								$data['post']=$value;
						}
				}
				$data['i']=$i;
				$data['num']=count($result);
				$data['userId']=isset($this->user)?$this->user->id:0;
				return view('pic',$data);

		}
		/**
		 * 获取小组页面
		 */
		public function getGroup()
		{
				$data=array();
				$group=Group::all();
				$data['isLogin']=$this->isLogin;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['group']=$group;
				$data['ajax']=0;
				return view('group',$data);
		}
		/**
		 * 获取小组论坛页面
		 * $id 小组id
		 * $type 访问类型判断 group 小组  section 版块
		 */
		public function getForum(Request $request,$type,$id)
		{
				$data=array();
				$tempB=array();
				$tempA=array();
				$page=$request->input('page');
				$data['page']=isset($page)?$page:1;
				$page=$data['page'];
				$pageSize=10;
				$data['pageSize']=$pageSize;
				switch($type){
				case 'group':
						$group=Group::getGroup($id);
						$data['group']=$group;
						$groupUser=Relation::getGroupUser($id);
						$data['groupUser']=$groupUser;
						$post=Post::getPostByForumId($id,1);
						$data['num']=count($post);
						$post=array_slice($post,($page-1)*$pageSize,$pageSize*$page);
						foreach($post as $key=>$value) {
								$value->img='/'.MyBaseController::getImage(stripslashes($value->content));
								$temp=Comment::getComment($value->id);
								$value->commentNum=count($temp);
								if(count($temp)>0){
										$value->lastComment=$temp[0]->comment;
										$value->lastCommentAuthor=$temp[0]->nickname;
										$value->lastCommentDate=date('Y-h-d',time($temp[0]->created_at));
								}else{
										$value->lastComment='无';
										$value->lastCommentAuthor=null;
										$value->lastCommentDate=null;
								}
								if($value->isTop!=0){
										$tempB[]=$value;
								}else{
										$tempA[]=$value;
								}
						}
						$data['postTop']=$tempB;
						$data['userId']=isset($this->user)?$this->user->id:0;
						$data['post']=$tempA;
						$data['type']=1;
						$data['url']='/group/forum/'.$id;
						break;
				case 'section':
						$section=Section::where('id',$id)->get();
						$data['section']=$section;
						$post=Post::getPostByForumId($id,2);
						$data['num']=count($post);
						$post=array_slice($post,($page-1)*$pageSize,$pageSize*$page);
						foreach($post as $key=>$value) {
								$value->img='/'.MyBaseController::getImage(stripslashes($value->content));
								$temp=Comment::getComment($value->id);
								$value->commentNum=count($temp);
								if(count($temp)>0){
										$value->lastComment=$temp[0]->comment;
										$value->lastCommentAuthor=$temp[0]->nickname;
										$value->lastCommentDate=date('Y-h-d',time($temp[0]->created_at));
								}else{
										$value->lastComment='无';
										$value->lastCommentAuthor=null;
										$value->lastCommentDate=null;
								}
								if($value->isTop!=0){
										$tempB[]=$value;
								}else{
										$tempA[]=$value;
								}

						}
						$data['postTop']=$tempB;
						$data['userId']=isset($this->user)?$this->user->id:0;
						$data['post']=$tempA;
						$data['type']=2;
						$data['url']='/section/forum/'.$id;
						break;
				}
				$data['ajax']=0;
				return view('forum',$data);
		}
		/**
		 * 获取版块页面
		 */
		public function getSection()
		{
				$data=array();
				$section=Section::all()->sortBy('number');
				$data['section']=$section;
				$data['ajax']=0;
				return view('section',$data);
		}

		/**
		 * 获取论坛文章页面
		 */
		public function getForumPage(Request $request,$id)
		{
				$data=array();
				$post=$this->post;
				foreach($post as $value) {
						if($value->id==$id) {
								$data['type']=$value->type;
								if($value->type==1){
										$result=Group::find($value->forumId);
										$value->forum=$result->name;
								}else {
										$result=Section::find($value->forumId);
										$value->forum=$result->name;
								}
								$value->content=stripslashes($value->content);
								$value->img=MyBaseController::getAllImageUrl($value->content);
								$data['post']=$value;
						}
				}
				$page=$request->input('page');
				$data['page']=isset($page)?$page:1;
				$data['userId']=isset($this->user)?$this->user->id:0;
				$data['ajax']=0;
				return view('forumPage',$data);

		}
		/**
		 * 获取文章评论Forum格式
		 * $id 为文章id
		 */
		public function getComment(Request $request,$id)
		{
				$data=array();
				$pageSize=10;
				$data['pageSize']=$pageSize;
				$page=$request->input('page');
				$data['page']=$page;
				$comment=Comment::getComment($id);
				if(empty($comment)) {
						exit;
				}

				$data['url']='/forum/'.$id;
				$data['num']=count($comment);
				$data['comment']=array_slice($comment,($page-1)*$pageSize,$pageSize*$page);
				$data['ajax']=$request->input('ajax');
				return view('forumComment',$data);
		}
		public function getCommentArea(Request $request,$id)
		{
				$data=array();
				$data['user']=$this->user;
				$data['parentId']=$request->input('parentId');
				$data['postId']=$id;
				$data['isLogin']=$this->isLogin;
				$data['ajax']=$request->input('ajax');
				return view('forumCommentArea',$data);
		}
		/**
		 * 发表评论
		 */
		public function postComment(Request $request,$postId)
		{
				$userId=$request->input('userId');
				$parentId=$request->input('parentId');
				$comment=$request->input('comment');
				$result=Comment::create(array('userId'=>$userId,'postId'=>$postId,'parentId'=>$parentId,'comment'=>$comment));
				if($parentId==0){
						$result=Post::find($postId);
						$result->isRead=1;
						$result-save();
				}else{
						$result=Comment::find($parentId);
						$result->isRead=1;
						$resuslt->save();
				}
						return redirect('/forum/'.$postId);
		}
		/**
		 * 查看是否有通知
		 */
		public function isRead($id)
		{
				$post=Post::isRead($id);
				$comment=Comment::isRead($id);
				if(count($post)!=0||count($comment)!=0){
						return 1;
				}else{
						return 0;
				}
		}
		/**
		 * 分页
		 */
		public function pageNav(Request $request)
		{
				$data=array();
				$data['url']=$request->input('url');
				$num=$request->input('num');
				$pageSize=$request->input('pageSize');
				$data['pageNum']=ceil($num/$pageSize);
				$data['page']=$request->input('page');
				$data['ajax']=$request->input('ajax');
				return view('pagenav',$data);

		}
		/**
		 * any
		 */
		public function anything($type)
		{
				$data=array();
				$data['ajax']=0;
				$data['type']=$type;
				return view('anything',$data);
		}
		/**
		 * 更新浏览量
		 */
		public function view(Request $request)
		{
				$id=$request->input('id');
				$result=Post::find($id);
				$view=$result->view;
				$result->view=$view+1;
				$result->save();
		}
}
