<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\UserStatusAndRoles;

class User extends Authenticatable
{
    use Notifiable;

    use UserStatusAndRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function Contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

}
