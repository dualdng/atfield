<?php namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model {
		protected $table='relations';
		protected $fillable=['author','followId','type'];
		/**
		 * 获取用户收藏文章
		 * $id 为用户id
		 */
		public static function getFollowPost($id)
		{
				$result=DB::table('relations')
						->leftJoin('posts','relations.followId','=','posts.id')
						->leftJoin('users','posts.author','=','users.id')
						->select('posts.id','posts.title','users.nickname')
						->where('relations.author','=',$id)
						->where('relations.type','1')
						->orderBy('relations.id','desc')
						->get();
				return $result;
		}
		/**
		 * 获取用户好友
		 * $id 为用户id
		 */
		public static function getFollowUser($id)
		{
				$result=DB::table('relations')
						->leftJoin('users','relations.followId','=','users.id')
						->select('users.id','users.nickname','users.avatar')
						->where('relations.author','=',$id)
						->where('relations.type','2')
						->orderBy('relations.id','desc')
						->get();
				return $result;
		}
		/**
		 * 获取用户群组
		 * $id 为用户id
		 */
		public static function getFollowGroup($id)
		{
				$result=DB::table('relations')
						->leftJoin('groups','relations.followId','=','groups.id')
						->select('groups.id','groups.name','groups.avatar')
						->where('relations.author','=',$id)
						->where('relations.type','3')
						->orderBy('relations.id','desc')
						->get();
				return $result;
		}
		/**
		 * 获取小组的用户
		 * $id 为小组编号
		 */
		public static function getGroupUser($id)
		{
				$result=DB::table('relations')
						->leftJoin('users','relations.author','=','users.id')
						->select('users.id','users.nickname','users.avatar')
						->where('followId',$id)
						->where('relations.type','3')
						->orderBy('relations.id','desc')
						->get();
				return $result;
		}
		/**
		 *获取特定用户的图片
		 *$id 用户id
		 *$id 为0 则获取所有
		 */
		public static function getFollowImg($id=0)
		{
				if($id!==0){
						$result=DB::table('relations')
						->leftJoin('users','relations.author','=','users.id')
						->select('users.id','users.nickname','users.avatar','relations.followId')
						->where('relations.author','=',$id)
						->where('relations.type','4')
						->orderBy('relations.id','desc')
						->get();
				}else{
						$result=DB::table('relations')
						->leftJoin('users','relations.author','=','users.id')
						->select('users.id','users.nickname','users.avatar','relations.followId')
						->where('relations.type','4')
						->orderBy('relations.id','desc')
						->get();
				}
				return $result;

		}
}
