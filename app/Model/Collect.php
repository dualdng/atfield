<?php namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model {

		protected $table='collects';
		protected $fillable=['author','imgUrl','albumId','tag'];
		public static function getPic($albumId)
		{
				$result=DB::table('collects')
						->leftJoin('albums','collects.albumId','=','albums.id')
						->select('collects.albumId','albums.name','collects.tag','collects.imgUrl','collects.id')
						->where('collects.albumId',$albumId)
						->orderBy('collects.id','desc')
						->get();
				return $result;
		}
		public static function getAllPic()
		{
				$result=DB::table('collects')
						->leftJoin('albums','collects.albumId','=','albums.id')
						->leftJoin('users','collects.author','=','users.id')
						->select('collects.albumId','albums.name','collects.tag','collects.imgUrl','collects.id','users.nickname','users.id as usersId')
						->orderBy('collects.id','desc')
						->get();
				return $result;
		}


}
