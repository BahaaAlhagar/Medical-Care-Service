<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

	protected $guarded = ['id'];
	
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function locations()
    {
    	return $this->hasMany(ProviderLocation::class);
    }

    public function contracts()
    {
        return $this->morphMany(contract::class, 'contractable');
    }
}
