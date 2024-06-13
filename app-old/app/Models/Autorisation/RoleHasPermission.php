<?php

namespace App\Models\Autorisation;



use App\Models\Autorisation\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class RoleHasPermission extends Model
{
    public $timestamps = false;
    protected $table = 'role_has_permissions';
    protected $primaryKey = ['permission_id', 'role_id'];
    public $incrementing = false;
    protected $fillable = [
        'permission_id', 
        'role_id'
    ];


    public function roleRelation() // Simplified naming convention
{
    return $this->belongsTo(Role::class, 'role_id');
}

public function permissionRelations() // Simplified naming convention
{
    return $this->belongsTo(Permission::class, 'permission_id');
}

}

