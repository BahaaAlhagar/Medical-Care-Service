<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

	protected $guarded = [];
	
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function locations()
    {
    	return $this->hasMany(ProviderLocation::class);
    }
}
