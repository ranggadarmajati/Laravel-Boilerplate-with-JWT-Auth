<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activations extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'code', 'completed', 'completed_at'];
}
