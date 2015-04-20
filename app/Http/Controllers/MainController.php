<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Model\Post;
use App\Model\Trigger;
use App\Model\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyBaseController;
use Illuminate\Http\Request;

class MainController extends Controller {
		private $post;
		private $userId;
		/**
		 * 判断数据库是否有变化或者是否存在缓存
		 */
		public function __construct()
		{
				$cached=Trigger::find(1)->cached;
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
				if(Auth::user()) {
						$this->userId=Auth::user()->id;
				}else {
						$this->userId=0;
				}
		}
		/**
		 *首页
		 */
		public function index()
		{
				$user=User::all()->slice(0,5);
				$data=array();
				$temp=array();
				foreach($this->post as $value){
						$value->img=MyBaseController::getImage(stripslashes($value->content));
						$value->tag=explode(',',$value->tag);
				}
				$data['ajax']=0;
				$data['post']=$this->post;
				$data['userId']=$this->userId;
				$data['user']=$user;
				return view('index',$data);
		}
		/**
		 * 获取文章页
		 * $id 文章id
		 */
		public function getSingle($id)
		{
				$data=array();
				$user=User::all()->slice(0,5);
				$post=$this->post;
				foreach($post as $value) {
						if($value->id==$id) {
								$value->content=stripslashes($value->content);
								$data['post']=$value;
						}
				}
				$data['userId']=$this->userId;
				$data['user']=$user;
				$data['ajax']=0;
				return view('single',$data);
		}
		 
		 /**
		 * 获取图片墙
		 */
	public function getPicFall()
	{
			$data=array();
			$tag=array();
			$temp=array();
			$data['ajax']=0;
			foreach($this->post as $value){
					$value->content=MyBaseController::getAllImage(stripslashes($value->content));
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
			$data['post']=$this->post;
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
				$ajax=$request->input('ajax');
				$ajax=isset($ajax)?$ajax:0;
				foreach($this->post as $value){
						if($value->id==$id){
								$post=$value;
						}
				}
				$post->content=MyBaseController::getAllImage(stripslashes($post->content));
				$data['ajax']=$ajax;
				$data['id']=$id;
				$data['i']=$i;
				$data['post']=$post;
				$data['userId']=$this->userId;
				return view('pic',$data);
		}
		/**
		 * 获取文章评论
		 * $id 为文章id
		 */
		public function getComment(Request $request,$id)
		{
				$result=$request->input('page');
				$comment=Comment::with('hasOneUser')->where('postId',$id)->where('parentId',0)->get()->sortByDesc('id')->toArray();
				if(empty($comment)) {
						echo '<h3 class=\'text-center\'>还没有评论!</h3>';
						exit;
				}
				echo '<div id=\'commentBody\'>';
				echo '<div class=\'media-list\'>';
				foreach ($comment as $values) {
						echo '<div class=\'media\'>';
						echo '<div class=\'media-left\'><img class=\'media-object\' src=\''.$values['has_one_user']['avatar'].'\'/></div>';
						echo '<div class=\'media-body\'><h4 class=\'media-heading\'>'.$values['has_one_user']['name'].'</h4>';
						echo '<span class=\'media-heading\'>'.date('Y.m.d h:i',strtotime($values['created_at'])).'</span><a id=\'reply-'.$values['id'].'\' style=\'float:right\' href=\'javascript:getCommentArea('.$values['has_one_user']['id'].','.$id.','.$values['id'].')\'>回复</a><a id=\'cancelReply-'.$values['id'].'\' style=\'display:none;float:right\' href=\'javascript:cancelReply('.$values['id'].')\'>取消回复</a>';
						echo '<p>'.$values['comment'].'</p>';
						echo '<div id=\'commentArea-'.$values['id'].'\'></div>';
						$this->getChildrenComment($values['id']);
						echo '</div>';
						echo '</div>';
				}
				echo '</div>';
				echo '</div>';
		}
		/**
		 * 获取文章评论子评论
		 * $id 为父评论id
		 */
		public function getChildrenComment($id)
		{
				$comment=Comment::with('hasOneUser')->where('parentId',$id)->orderBy('id')->get()->sortByDesc('id')->toArray();
				if (!empty($comment)) {
				foreach($comment as $values){
						echo '<div class=\'media\'>';
						echo '<div class=\'media-left\'><img class=\'media-object\'  src=\''.$values['has_one_user']['avatar'].'\'/></div>';
						echo '<div class=\'media-body\'><h4 class=\'media-heading\'>'.$values['has_one_user']['name'].'</h4>';
						echo '<span class=\'media-heading\'>'.date('Y.m.d h:i',strtotime($values['created_at'])).'</span><a id=\'reply-'.$values['id'].'\'style=\'float:right\'  href=\'javascript:getCommentArea('.$values['has_one_user']['id'].','.$id.','.$values['id'].')\'>回复</a><a id=\'cancelReply-'.$values['id'].'\' style=\'display:none;float:right;\'  href=\'javascript:cancelReply('.$values['id'].')\'>取消回复</a>';
						echo '<p>'.$values['comment'].'</p>';
						echo '<div id=\'commentArea-'.$values['id'].'\'></div>';
						$temp=self::getChildrenComment($values['id']);
						echo '</div>';
						echo '</div>';
				};
				}
		}
		/**
		 * 获取文章评论框
		 */
		public function getCommentArea(Request $request)  //回复框
		{
				$userId=$request->input('userId');
				if ($userId!=0) {
						$user=User::find($userId);
						$parentId=$request->input('parentId');
						$postId=$request->input('postId');
						echo '<form onsubmit=\'return postComment()\'>';
						echo '<div class=\'media-list\'>';
						echo '<div class=\'media\'>';
						echo '<div class=\'media-left media-middle\'><img class=\'media-object\' src=\''.$user->avatar.'\'/></div>';
						echo '<div class=\'media-body\'><h4 class=\'media-heading\'>'.$user->name.'</h4>';
						echo '<input class=\'form-control\' name=\'postId\' id=\'postId\' type=\'hidden\'value=\''.$postId.'\'></input>';
						echo '<input class=\'form-control\' name=\'userId\' id=\'userId\' type=\'hidden\'value=\''.$userId.'\'></input>';
						echo '<input class=\'form-control\' name=\'parentId\' id=\'parentId\' type=\'hidden\'value=\''.$parentId.'\'></input>';
						echo '<textarea class=\'form-control\' rows=\'3\' name=\'commentText\' id=\'commentText\'></textarea>';
						echo '<input class=\'btn btn-success\' type=\'submit\' value=\'提交\'></input>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</form>';
				}else{
						echo '<a href=\'/auth/login\'>登录</a>';
						echo '没有帐号？点击 <a href=\'/auth/login\'>注册</a>';
				}
		}
		/**
		 * 发表评论
		 */
		public function postComment(Request $request)
		{
				$userId=$request->input('userId');
				$user=User::find($userId);
				$postId=$request->input('postId');
				$parentId=$request->input('parentId');
				$comment=$request->input('comment');
				$result=Comment::create(array('userId'=>$userId,'postId'=>$postId,'parentId'=>$parentId,'comment'=>$comment));
				if($result) {
						echo '<div class=\'media\'>';
						echo '<div class=\'media-left\'><img class=\'media-object\' src=\''.$user->avatar.'\'/></div>'; echo '<div class=\'media-body\'><h4 class=\'media-heading\'>'.$user->name.'</h4>';
						echo '<p>'.$comment.'</p>';
						echo '</div>';
						echo '</div>';
				}
		}
}
