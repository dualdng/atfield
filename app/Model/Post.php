<?php namespace App\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	//
	protected $table='posts';  
	protected $fillable=['title','content','category','tag','author','state','forumId','type','isRead','view','isTop'];  
	/*
	 * 获取文章标题及日期
	 * id 用户id
	 */
	public static function  getPostTitle($id)
	{
			$result=DB::table('posts')
					->leftJoin('users','posts.author','=','users.id')
					->select('title','posts.id as id','users.nickname','posts.view')
					->where('author',$id)
					->where('posts.state','1')
					->orderBy('posts.id','desc')
					->get();
			return $result;
	}
	/**
	 * 通过forumId和forum类型获取文章
	 * $id 为forumId
	 * $type 为forum类型
	 */
	public static function getPostByForumId($id,$type)
	{
			$result=DB::table('posts')
					->leftJoin('users','posts.author','=','users.id')
					->select('posts.isTop','title','posts.id as id','users.id as userId','users.nickname','posts.view','posts.created_at','posts.content')
					->where('forumId',$id)
					->where('type',$type)
					->where('posts.state','1')
					->orderBy('posts.id','desc')
					->get();
			return $result;

	}
	public static function getPost()
	{
			$result=DB::table('posts')
					->leftJoin('users','posts.author','=','users.id')
					->select('posts.id','posts.title','posts.author','users.nickname as nickname','users.avatar','posts.content','posts.tag','posts.created_at','posts.type','posts.forumId','posts.view')
					->where('posts.state','1')
					->orderBy('posts.id','desc')
					->get();
			return $result;
	}
	/**
	 * 文章是否有新平论
	 */
	public static function isRead($id)
	{
			$result=DB::table('posts')
					->select('posts.id','posts.title')
					->where('posts.author',$id)
					->where('posts.isRead',1)
					->orderBy('posts.id','desc')
					->get();
			return $result;
	}

}
