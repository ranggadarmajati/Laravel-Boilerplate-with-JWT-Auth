<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUsers extends Model
{
	protected $primaryKey =  ['user_id', 'role_id'];
    protected $fillable = ['role_id', 'user_id' ];
    protected $table = 'role_users';
    public $incrementing = false;
    public function Roles()
    {
        return $this->hasOne('App\Models\Roles', 'id', 'role_id');
    }
}
