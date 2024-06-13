<?php

namespace App\Models\Autorisation;

use App\Models\Autorisation\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'guard_name'];
}
