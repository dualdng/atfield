<?php namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table='groups';
	protected $fillable=['name','shortname','avatar','description','author'];
	/**
	 *通过id获取小组
	 *$id 小组id
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
