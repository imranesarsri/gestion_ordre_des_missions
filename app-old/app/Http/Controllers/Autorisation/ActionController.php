<?php

namespace App\Http\Controllers\Autorisation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Autorisation\GestionActionsRepository; // Add this line to import the GestionActionsRepository class
use App\Http\Requests\Autorisation\ActionRequest;
use App\Repositories\Autorisation\GestionControllersRepository;
use Illuminate\Support\Facades\Artisan;
use App\Exceptions\Autorisation\ActionException; // Add this line to import the ActionException class

class ActionController extends Controller
{

    protected $actionRepository;
    

    protected $controllerRepository;

    public function __construct(GestionActionsRepository $actionRepository, GestionControllersRepository $controllerRepository)
    {
        $this->actionRepository = $actionRepository;
        $this->controllerRepository = $controllerRepository;
    }

    public function index(Request $request)
    {
        $controllers = $this->actionRepository->filter();
        $actions = $this->actionRepository->paginate();
        if ($request->ajax()) {
            $searchAction = $request->get('searchAction');
            $searchAction = str_replace(" ", "%", $searchAction);
            $actions = $this->actionRepository->search($searchAction);
            return view('Autorisation.action.index', compact('actions', 'controllers'))->render();
        }
        return view('Autorisation.action.index', compact('actions', 'controllers'));
    }

    public function show(Request $request, $id)
    {
        $controller = $this->controllerRepository->find($id);
        $controllers = $this->actionRepository->filter();
        $actions = $controller->actions()->paginate();
        if ($request->ajax()) {
            $searchAction = $request->get('searchAction');
            $searchAction = str_replace(" ", "%", $searchAction);
            $actions = $this->actionRepository->searchData($searchAction, $id);
            return view('Autorisation.action.index', compact('actions', 'controllers', 'controller'))->render();
        }
        return view('Autorisation.action.index', compact('actions', 'controllers', 'controller'));
    }



    public function create()
    {
        $controllers = $this->actionRepository->filter();
        return view('Autorisation.action.create', compact('controllers'));
    }

    public function store(actionRequest $request)
    {
        try {
            $data = $request->all();
            $this->actionRepository->create($data);
            // dd($actions);
            return back()->with('success', __('Autorisation/Action/message.ActionAdded'));
        } catch (ActionException $e) {
            return back()->with('error',  __('Autorisation/Action/message.createActionException'));
        }
        catch (\Exception $e) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $action = $this->actionRepository->find($id);
        $controllers = $this->actionRepository->filter();
        return view('Autorisation.action.edit', compact('action', 'controllers'));
    }

    public function update(Request $request, $action_id)
    {
        try {
            $data = $request->all();
            $action = $this->actionRepository->update($action_id, $data);
            return back()->with('success', __('Autorisation/Action/message.ActionUpdated'));
        } catch (ActionException $e) {
            return back()->withInput()->withErrors(['Action_exists' => __('Autorisation/Action/message.updateActionException')]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['unexpected_error' => __('Autorisation/Action/message.unexpected_error')]);
        }
    }


    public function destroy($action_id)
    {
        $result = $this->actionRepository->destroy($action_id);
        if ($result) {
            return back()->with('success', 'L action a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de l action. Veuillez réessayer.');
        }
    }
    public function SyncControllersActions()
    {
        Artisan::call('sync:ControllersActions');
        return redirect()->back()->with('success', 'Controllers and actions synced successfully.');
    }
}
