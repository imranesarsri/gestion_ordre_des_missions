<?php

namespace Tests\Feature\Autorisation;


use App\Exceptions\Autorisation\ControllerNotExistException;
use App\Exceptions\Autorisation\ControllerAlreadyExistException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionControllersRepository;
use App\Models\Autorisation\Controller as AutorisationController;
use Tests\TestCase;
use App\Models\User;

class GestionControllersTest extends TestCase
{
    use DatabaseTransactions;
    protected $ControllersRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ControllersRepository = new GestionControllersRepository(new AutorisationController());
        $this->user = User::factory()->create();
    }


    public function test_paginate_controllers()
    {
        $this->actingAs($this->user);
        AutorisationController::factory()->create();
        $controllers = $this->ControllersRepository->paginate();
        $this->assertNotNull($controllers);
        $this->assertNotEmpty($controllers);
    }

    // public function test_create_controller(){
    //     $this->actingAs($this->user);

    //     $data = [
    //         'nom' => 'TaskController',
    //     ];

    //     $this->ControllersRepository->create($data);

    //     $this->assertDatabaseHas('controllers', [
    //         'nom' => 'TaskController',
    //     ]);
    // }


    public function test_create_controller()
    {
        $this->actingAs($this->user);
        $controllerNames = $this->ControllersRepository->extractControllerNames();
        $existingControllers = $this->ControllersRepository->getModel()::whereIn('nom', $controllerNames)->pluck('nom')->toArray();
        if (count($existingControllers) == count($controllerNames)) {
            $controllerToRemove = array_pop($existingControllers); // Remove one controller name
            $this->ControllersRepository->getModel()::where('nom', $controllerToRemove)->delete(); // Remove it from the database
            // Create the removed controller
            $data = ['nom' => $controllerToRemove];
            $this->ControllersRepository->create($data);
            $this->assertTrue(true);
            $this->assertDatabaseHas('controllers', ['nom' => $controllerToRemove]);
        } else {
            // At least one controller name is not in the database, so create it
            $nonExistingController = array_diff($controllerNames, $existingControllers);
            $firstNonExistingController = null;
            foreach ($nonExistingController as $controller) {
                $firstNonExistingController = $controller;
                break; // Exit the loop after finding the first non-existing controller
            }
            if ($firstNonExistingController !== null) {
                // Create the controller that is not in the database
                $data = ['nom' => $firstNonExistingController];
                $this->ControllersRepository->create($data);
                $this->assertTrue(true);
                $this->assertDatabaseHas('controllers', ['nom' => $nonExistingController]);
            }
        }
    }





    public function test_create_controller_not_exist()
    {
        $this->actingAs($this->user);
        $data = [
            'nom' => 'TestController',
        ];
        // TaskController
        try {
            $this->ControllersRepository->create($data);
            $this->fail('Exception attendue non levée.');
        } catch (ControllerNotExistException $e) {
            $this->assertInstanceOf(ControllerNotExistException::class, $e);
        } catch (ControllerAlreadyExistException $e) {
            $this->assertInstanceOf(ControllerAlreadyExistException::class, $e);
        }
    }

    public function test_update_controller()
    {
        $this->actingAs($this->user);

        $controllerNames = $this->ControllersRepository->extractControllerNames();
        $existingControllers = $this->ControllersRepository->getModel()::whereIn('nom', $controllerNames)->pluck('nom')->toArray();

        if (!empty($existingControllers)) {
            // Randomly select a controller to update
            $controllerToUpdate = $existingControllers[array_rand($existingControllers)];
            $controllerId = $this->ControllersRepository->getModel()->where('nom', $controllerToUpdate)->value('id');            // Update the selected controller
            $updatedData = ['nom' => $controllerToUpdate];

            $this->ControllersRepository->update($controllerId, $updatedData);

            $this->assertDatabaseHas('controllers', ['nom' => $updatedData['nom']]);
        } else {
            // No existing controllers found to update, so create a new one and then update it
            $newControllerName = $controllerNames[array_rand($controllerNames)];
            $controllerId = $this->ControllersRepository->getModel()->where('nom', $newControllerName)->value('id');            // Update the selected controller
            $data = ['nom' => $newControllerName];
            $this->ControllersRepository->create($data);

            $updatedData = ['nom' => $newControllerName];
            $this->ControllersRepository->update($controllerId, $updatedData);

            $this->assertDatabaseHas('controllers', ['nom' => $updatedData['nom']]);
        }
    }

    public function test_update_controller_not_exist()
    {
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $Data = [
            'nom' => 'UpdatedController',
        ];
        try {
            $this->ControllersRepository->update($controller->id, $Data);
            $this->fail('Exception attendue non levée.');
        } catch (ControllerNotExistException $e) {
            $this->assertInstanceOf(ControllerNotExistException::class, $e);
        } catch (ControllerAlreadyExistException $e) {
            $this->assertInstanceOf(ControllerAlreadyExistException::class, $e);
        }
    }

    public function test_delete_controller()
    {
        $this->actingAs($this->user);
        $controller = AutorisationController::factory()->create();
        $this->ControllersRepository->destroy($controller->id);
        $this->assertDatabaseMissing('controllers', ['id' => $controller->id]);
    }
}
