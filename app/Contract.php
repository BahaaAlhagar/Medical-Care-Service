<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	protected $guarded = [];
	
    public function contractable()
    {
    	return $this->morphTo();
    }
}
