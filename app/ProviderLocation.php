<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderLocation extends Model
{
	protected $guarded = [];
	
    public function provider()
    {
    	return $this->belongsTo(Provider::class);
    }
}
