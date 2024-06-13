<?php

namespace App\Repositories\Autorisation;

use App\Models\Autorisation\Role;
use App\Models\Autorisation\Action;
use App\Repositories\BaseRepositorie;
use App\Models\Autorisation\Controller;
use App\Models\Autorisation\Permission;
use App\Models\Autorisation\RoleHasPermission;
use Illuminate\Pagination\LengthAwarePaginator;




class GestionAutorisationRepository extends BaseRepositorie {
    protected $model;

    public function __construct(RoleHasPermission $role_has_permission){
        $this->model = $role_has_permission;
    }


    // get actions Roles Controllers
    public function getRolesActions() {
        $roles = Role::all();
        $actions = Action::all();
        $controllers = Controller::all();
        return ['roles' => $roles, 'actions' => $actions, 'controllers' => $controllers];
    }


    // get all Permissions for a role
    public function getRolesPermissions($query)
    {
        return Role::where('name', 'like', "%{$query}%")
            ->orWhereHas('permissions', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%");
            })
            ->paginate(3);
    }
    

    // Find All The Permission For A certain Role Controller 
    public function findWithPermissions($id, $controller){ 
        $SelectedRole = Role::findOrFail($id);
        $SelectedPermissions = $SelectedRole->permissions->groupBy(function ($permission) {
            return explode('-', $permission->name)[1];       
        })->get($controller);
        $SelectedController = $controller;
        return compact('SelectedRole', 'SelectedPermissions', 'SelectedController');
    }

    // Delete All The Permission For A certain Role Controller
    public function delete($id, $controller)
    {
        $role = Role::findOrFail($id);  
        $permissions = $role->permissions->groupBy(function ($permission) {
            return explode('-', $permission->name)[1];       
        })->get($controller);
    
        // Delete the retrieved permissions
        foreach ($permissions as $permission) {
            $permission->delete();
        }
    }
    
    public function createPermissions($role_id, $controller_name, $action_names)
    {
        // Generate permission names
        $permissions = [];
        foreach ($action_names as $action) {
            $permissions[] = "{$action}-{$controller_name}";
        }

        // Initialize an array to store existing permissions Ids if for the selected role
        $existingPermissions = RoleHasPermission::where('role_id', $role_id)
            ->pluck('permission_id')
            ->toArray();

        // create the permissions 
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'web' // Adjust according to your guard setup
            ]);

            // If the permission doesn't exist for the selected role, 
            if (!in_array($permission->id, $existingPermissions)) {
                RoleHasPermission::create([
                    'role_id' => $role_id,
                    'permission_id' => $permission->id
                ]);
            }
        }
    }


    public function updatePermissions($role_id, $old_controller_name, $new_controller_name, $action_names)
    {
        // Construct permission names based on action names and new controller name
        $permissions = [];
        foreach ($action_names as $action) {
            $permissions[] = "{$action}-{$new_controller_name}";
        }

        // Get existing permissions associated with the selected role and old controller name
        $existingPermissions = RoleHasPermission::where('role_id', $role_id)
            ->whereIn('permission_id', function ($query) use ($old_controller_name) {
                $query->select('id')
                    ->from('permissions')
                    ->where('name', 'like', "%-{$old_controller_name}");
            })
            ->pluck('permission_id')
            ->toArray();

        // If the controller name has changed, delete existing permissions associated with the old controller name
        if ($old_controller_name !== $new_controller_name) {
            RoleHasPermission::where('role_id', $role_id)
                ->whereIn('permission_id', $existingPermissions)
                ->delete();
        }

        // Create new permissions
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'web' // Adjust according to your guard setup
            ]);

            RoleHasPermission::firstOrCreate([
                'role_id' => $role_id,
                'permission_id' => $permission->id
            ]);
        }
    }

    
}