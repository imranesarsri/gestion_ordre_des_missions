<?php

namespace App\Http\Controllers\Autorisation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AppBaseController;
use App\Exceptions\Autorisation\ControllerNotExistException;
use App\Exceptions\Autorisation\ControllerAlreadyExistException;
use App\Repositories\Autorisation\GestionControllersRepository;
use App\Models\Autorisation\Controller as AutorisationController;

class GestionControllersController extends AppBaseController
{
    protected $controllersRepository;

    public function __construct(GestionControllersRepository $controllersRepository)
    {
        $this->controllersRepository = $controllersRepository;
    }


    public function index()
    {
        $controllers = $this->controllersRepository->paginate();
        return view('Autorisation.controllers.index', compact('controllers'));
    }

    public function create()
    {
        return view('Autorisation.controllers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255'
        ], );

        try {
            $this->controllersRepository->create($validatedData);
            return redirect()->route('controllers.index')->with('success', __('Autorisation/controllers/message.CreatedController'));
        } catch (ControllerNotExistException $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (ControllerAlreadyExistException $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            \Log::error('Error create controller: ' . $e->getMessage());
            return redirect(500);
            // return redirect()->route('error-page')->with('error', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
    }

    public function edit(AutorisationController $controller)
    {
        return view('Autorisation.controllers.edit', compact('controller'));
    }

    public function update(Request $request, AutorisationController $controller)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);

        try {
            $this->controllersRepository->update($controller->id, $validatedData);
            return redirect()->route('controllers.index')->with('success', __('Autorisation/controllers/message.UpdatedController'));
        } catch (ControllerNotExistException $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (ControllerAlreadyExistException $e) {
            return redirect()->back()->withErrors(['nom' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            \Log::error('Error update controller: ' . $e->getMessage());
            return redirect(500);
        }

    }

    public function destroy(AutorisationController $controller)
    {
        try {
            $this->controllersRepository->destroy($controller->id);
            return redirect()->route('controllers.index')->with('success', __('Autorisation/controllers/message.DeletedController'));
        } catch (\Exception $e) {
            \Log::error('Error delete controller: ' . $e->getMessage());
            return redirect(500);
        }
    }

    public function downloadSeeder(Request $request)
    {
        try {
            Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\Autorisation\\ControllerSeeder']);
            return redirect()->route('controllers.index')->with('success', __('Autorisation/controllers/message.DownloadSeeder'));
        } catch (\Exception $e) {
            \Log::error('Error running seeder: ' . $e->getMessage());
            return redirect()->back()->with('error', __('Autorisation/controllers/message.errorDownloadSeeder'));
        }
    }
}
