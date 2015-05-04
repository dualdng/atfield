<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

		protected $table='albums';
		protected $fillable=['name','avatar','author'];


}
