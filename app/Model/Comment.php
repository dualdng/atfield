<?php namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	//
	protected $table='comments';
	protected $fillable=['postId','parentId','userId','comment','isRead'];
	public function hasOneUser(){
			return $this->hasOne('App\Model\User','id','userId');
	}
	/**
	 * 通过文章id获取文章评
	 */
	public static function getComment($id)
	{
			$result=DB::table('comments')
					->leftJoin('users','comments.userId','=','users.id')
					->select('comments.id as commentId','comments.parentId','comments.comment','comments.created_at','users.nickname','users.id','users.avatar')
					->where('postId',$id)
					->orderBy('comments.id','asc')
					->get();
			return $result;

	}
	/**
	 * 是否有新评论
	 */
	public static function isRead($id)
	{
			$result=DB::table('comments')
					->leftJoin('posts','comments.postId','=','posts.id')
					->select('comments.isRead','comments.postId','posts.title','comments.id')
					->where('comments.userId',$id)
					->where('comments.isRead',1)
					->orderBy('comments.id','desc')
					->get();
			return $result;
	}

}
