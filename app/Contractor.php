<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    public function user()
    {
    	return $this->hasMany(User::class);
    }

    public function contracts()
    {
        return $this->morphMany(contract::class, 'contractable');
    }
}
