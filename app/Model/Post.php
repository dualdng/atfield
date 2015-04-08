<?php namespace App\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	//
	protected $table='posts';  
	protected $fillable=['title','content','category','tag','author','state'];  
	/*
	 * 获取文章标题及日期
	 * id 用户id
	 */
	public static function  getPostTitle($id)
	{
			$post=DB::table('posts')
					->leftJoin('users','posts.author','=','users.id')
					->select('title','posts.id as id')
					->where('author',$id)
					->orderBy('posts.id','desc')
					->get();
			return $post;
	}
	public static function getPost()
	{
			$post=DB::table('posts')
					->leftJoin('users','posts.author','=','users.id')
					->leftJoin('categorys','posts.category','=','categorys.id')
					->select('posts.id','posts.title','users.nickname as nickname','posts.content','posts.tag','categorys.name as categoryName','posts.created_at')
					->where('posts.state','1')
					->orderBy('posts.id','desc')
					->get();
			return $post;
	}

}
