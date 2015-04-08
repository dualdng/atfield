<?php namespace App\Http\Controllers\Dashboard;

use App\User;
use Auth;
use App\Model\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ThumbnailsController;

use Illuminate\Http\Request;

class MainController extends Controller {
	/**
	 * 获取文章
	 * id 用户id
	 */
	public function index(Request $request,$id)
	{
		//
		$data=array();
		$avatar=User::find($id)->avatar;
		$post=Post::getPostTitle($id);
		$data['num']=count($post);
		$ajax=0;
		$data['ajax']=$ajax;
		$data['id']=$id;
		$data['avatar']=$avatar;
		return view('dashboard.index',$data);
	}
	public function profile(Request $request,$id)
	{
		//
		$data=array();
		$data['ajax']=$request->input('ajax');
		$post=Post::getPostTitle($id);
		$data['num']=count($post);
		$data['id']=$id;
		$avatar=User::find($id)->avatar;
		$data['avatar']=$avatar;
		return view('dashboard.profile',$data);
	}

	/**
	 * 文章发布页面
	 */
	public function postPage(Request $request,$id)
	{
		//
		$data=array();
		$data['ajax']=$request->input('ajax');
		$data['id']=$id;
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
			$data['avatar']=$avatar;
			$data['id']=$id;
			$ajax=0;
			$data['ajax']=$ajax;
			return view('dashboard.index',$data);
	}


	/**
	 * 发布文章
	 */
	public function postPost(Request $request,$id)
	{
		//
		$title=$request->input('title');
		$category=$request->input('category');
		$tag=$request->input('tag');
		$content=$request->input('content');
		if(!get_magic_quotes_gpc()) {
				$content=addslashes($content);
		}
		$state=$request->input('state');
		$result=Post::create(array('title'=>$title,'content'=>$content,'tag'=>$tag,'category'=>$category,'state'=>$state,'author'=>$id));
		if($result){
				return 1;
		}else{
				return 0;
		}
	}
	/*
	 *我的帖子列表 
	 */
	public function postList(Request $request,$id)
	{
			$post=Post::getPostTitle($id);
			$data=array();
			$data['ajax']=$request->input('ajax');
			$data['id']=$id;
			$data['post']=$post;
			return view('dashboard.postList',$data);
	}
	/**
	 *编辑帖子
	 */
	public function editPost(Request $request,$id,$postId)
	{
			$data=array();
			$post=Post::find($postId);
			$data['ajax']=$request->input('ajax');
			$data['postId']=$postId;
			$data['post']=$post;
			return view('dashboard.editPost',$data);
	}
	
}
