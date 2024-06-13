<?php

namespace App\Http\Controllers\Autorisation;

use App\Exceptions\Autorisation\RoleException;
use App\Exports\Autorisation\RolesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Autorisation\RoleRequest;
use App\Imports\Autorisation\RolesImport;
use App\Repositories\Autorisation\RoleRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RolesController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    
    // Index
    public function index(Request $request){
        $roles = $this->roleRepository->paginate();
        if($request->ajax()){
            $searchRole = $request->get('searchRole');
            $searchRole = str_replace(" ", "%", $searchRole);
            $roles = $this->roleRepository->searchData($searchRole);
            return view('Autorisation.roles.index', compact('roles'))->render();
        }
        return view('Autorisation.roles.index', compact('roles'));
    }

    // create
    public function create(){
        return view('Autorisation.roles.create');
    }

    // store
    public function store(RoleRequest $request){
        try {
            $data = $request->all();
            $this->roleRepository->create($data);
            return to_route('roles.index')->with('success', __('Autorisation/roles/message.AjouterRole'));
        } catch (RoleException $e) {
            return back()->withInput()->withErrors(['role_exists' => __('Autorisation/roles/message.createRoleException')]); 
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['unexpected_error' => __('Autorisation/roles/message.unexpectedError')]);
        }
    }
    
    // Edit
    public function edit($id){
        $role = $this->roleRepository->find($id);
        return view('Autorisation.roles.edit', compact('role'));
    }

    // Update
    public function update(RoleRequest $request,$task_id){
        try {
            $data = $request->validated();
            $this->roleRepository->update($task_id,$data);
            return to_route('roles.index')->with('success',__('Autorisation/roles/message.ModiferRole'));
        } catch (RoleException $e) {
            return back()->withInput()->withErrors(['role_exists' => __('Autorisation/roles/message.createRoleException')]); 
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['unexpected_error' => __('Autorisation/roles/message.unexpectedError')]);
        }
    }

    // Delete
    public function destroy($id)
    {
        $result = $this->roleRepository->destroy($id);
        if ($result) {
            return to_route('roles.index')->with('success', __('Autorisation/roles/message.suprimeRole'));
        } else {
            return to_route('roles.index')->with('error', __('Autorisation/roles/message.echecSuprimeRole'));
        }
    }
    
    // Export
    public function export()
    {
        return Excel::download(new RolesExport, 'Roles.xlsx');
    }

    // Import
    public function import(Request $request)
    {
       
        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new RolesImport, $path);
        }
        
        return redirect()->back();
    }
}
