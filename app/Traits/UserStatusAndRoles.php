<?php

namespace App\Traits;

trait UserStatusAndRoles {

	public function active()
    {
        return $this->active;
    }


    public function isAdmin()
    {
    	if ($this->role == 'admin' && $this->active())
    	{
    		return true;
    	}

    	return false;
    }


    public function isProvider()
    {
    	if ($this->role == 'provider' && $this->active())
    	{
    		return true;
    	}

    	return false;
    }


    public function isContractor()
    {
    	if ($this->role == 'contractor' && $this->active())
    	{
    		return true;
    	}

    	return false;
    }

    public function isEmployee()
    {
    	if ($this->role == 'employee' && $this->active())
    	{
    		return true;
    	}

    	return false;
    }
}