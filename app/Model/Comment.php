<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	//
	protected $table='comments';
	protected $fillable=['postId','parentId','userId','comment'];
	public function hasOneUser(){
			return $this->hasOne('App\User','id','userId');
	}

}
