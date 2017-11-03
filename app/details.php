<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class details extends Model
{
	public function slidesrc() {
		return $this->hasMany('App\DetailSlideSrcs');
	}
}
