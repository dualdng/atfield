<?php namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Section extends Model {

		protected $table='sections';
		protected $fillable=['name','shortname','author','description','avatar'];
		/**
		 * 通过section id来获取section
		 */
		public static function getGroup($id)
		{
				$result=DB::table('groups')
						->leftJoin('users','groups.author','=','users.id')
						->select('groups.name','groups.avatar','groups.description','users.id','users.nickname','groups.created_at')
						->where('groups.id',$id)
						->get();
				return $result;
		}
}
