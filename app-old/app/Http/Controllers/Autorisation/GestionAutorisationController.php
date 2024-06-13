<?php

namespace App\Http\Controllers\Autorisation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Autorisation\GestionAutorisationRepository;

class GestionAutorisationController extends Controller
{

    private $autorisationRepository;

    //

    public function __construct(GestionAutorisationRepository $autorisationRepository)
    {
        $this->autorisationRepository = $autorisationRepository;
    }



    public function index(Request $request)
    {
        $query = $request->input('query');
        $autorisations = $this->autorisationRepository->getRolesPermissions($query);
        $rolesAndActions = $this->autorisationRepository->getRolesActions();
        $roles = $rolesAndActions['roles'];
        $controllers = $rolesAndActions['controllers'];

        if ($request->ajax()) {

            return view('Autorisation.Autorisations.AutorisationsTablePartial')->with('autorisations', $autorisations);
        }

        return view('Autorisation.Autorisations.index', [
            'autorisations' => $autorisations,
            'controllers' => $controllers,
            'roles' => $roles
        ]);
    }


    public function create()
    {
        $rolesAndActions = $this->autorisationRepository->getRolesActions();
        $roles = $rolesAndActions['roles'];
        $actions = $rolesAndActions['actions'];
        $controllers = $rolesAndActions['controllers'];
        return view('Autorisation.Autorisations.create', compact('controllers', 'actions', 'roles'));
    }

    public function store(Request $request)
    {
        // Parse submitted form data
        $role_id = $request->input('role_id');
        $controller_name = $request->input('controller_name');
        $action_names = $request->input('action_names');

        // Call the repository method to create permissions
        $this->autorisationRepository->createPermissions($role_id, $controller_name, $action_names);

        return redirect()->route('autorisations.index')->with('success', 'permission mis à jour avec succès');
    }


    public function show($id, $controller)
    {
        $data = $this->autorisationRepository->findWithPermissions($id, $controller);
        return view('Autorisation.autorisations.view', $data);
    }


    public function edit($id, $controller)
    {
        try {
            if ($id && $controller) {
       // Get all the roles, actions, and controllers
       $rolesAndActions = $this->autorisationRepository->getRolesActions();
       $all_the_roles = $rolesAndActions['roles'];
       $all_the_actions = $rolesAndActions['actions'];
       $all_the_controllers = $rolesAndActions['controllers'];

       // Get the role with controller name that is going to be updated
       $SelectedData = $this->autorisationRepository->findWithPermissions($id, $controller);

       // Extract actions from SelectedPermissions that have SelectedController as the end of it
       $selectedActions = [];
       $selectedController = $SelectedData['SelectedController'];
       foreach ($SelectedData['SelectedPermissions'] as $permission) {
           $permissionNameParts = explode('-', $permission->name);
           if (end($permissionNameParts) === $selectedController) {
               $selectedActions[] = reset($permissionNameParts);
           }
       }
       $SelectedData['SelectedActions'] = $selectedActions;

       return view('Autorisation.Autorisations.update', compact('all_the_roles', 'all_the_actions', 'all_the_controllers', 'SelectedData'));
            } else {
                throw new ModelNotFoundException(); // Throw a not found exception
            }
        } catch (ModelNotFoundException $e) {
            abort(404); // Return a 404 response
        }

 
    }


    public function destroy($id, $controller)
    {
        $this->autorisationRepository->delete($id, $controller);
        return redirect()->back()->with('success', 'Permissions for controller ' . $controller . ' deleted successfully.');
    }


    public function update($id, $controller, Request $request)
    {
        $role_id = $request->input('role_id');
        $new_controller_name = $request->input('controller_name');
        $action_names = $request->input('action_names');

        // Call the repository method to update permissions
        $this->autorisationRepository->updatePermissions($role_id, $controller, $new_controller_name, $action_names);

        return redirect()->route('autorisations.index')->with('success', 'permission mis à jour avec succès');
    }
    
}
