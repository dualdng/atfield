<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trigger extends Model {

	//
	protected $table='caches';
	protected $fillable=['id','cached'];
	public $timestamps=false;

}
