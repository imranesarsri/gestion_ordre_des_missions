<?php

namespace Tests\Feature\Autorisation;

use App\Models\User;
use App\Models\Autorisation\Action;
use App\Models\Autorisation\Controller;
use App\Repositories\Autorisation\GestionActionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Support\Facades\Lang;
use App\Exceptions\Autorisation\ActionException;
use Exception;


class ActionTest extends TestCase
{
    use DatabaseTransactions;

    protected $actionRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actionRepository = new GestionActionsRepository(new Action);
        $this->user = User::factory()->create();
    }

    public function testPaginateActions()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $actions = $this->actionRepository->create($actionData);
        $actions = $this->actionRepository->paginate();
        $this->assertNotNull($actions);
    }

    public function testCreateAction()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $action = $this->actionRepository->create($actionData);
        $this->assertEquals($actionData['nom'], $action->nom);
    }

    public function testCreateAction_ActionExists()
    {
      $this->actingAs($this->user);
      $controllerData = Controller::factory()->create();
      Action::factory()->create([
          'nom' => 'test',
          'controller_id' => $controllerData->id
      ]);
      $actionData = [
          'nom' => 'test',
          'controller_id' => $controllerData->id
      ];
    
      try {
        $action = $this->actionRepository->create($actionData);
        $this->fail('Expected ActionException was not thrown');
    } catch (ActionException $e) {
        $this->assertEquals(__('Autorisation/action/message.createActionException'), $e->getMessage());
    } catch (\Exception $e) {
        $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
    }
  
    }
    
    

    public function testUpdateAction()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $actions = $this->actionRepository->create($actionData);
        $actionData = [
            'nom' => 'test',
        ];
        $this->actionRepository->update($actions->id, $actionData);
        $this->assertDatabaseHas('actions', $actionData);
    }

    public function testDeleteAction()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $actions = $this->actionRepository->create($actionData);
        $this->actionRepository->destroy($actions->id);
        $this->assertDatabaseMissing('actions', ['id' => $actions->id]);
    }

    public function testActionSearch()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $actions = $this->actionRepository->create($actionData);
        $searchValue = 'test';
        $searchResults = $this->actionRepository->searchData($searchValue, $controllerData->id);
        $this->assertTrue($searchResults->contains('nom', $searchValue));
    }

    public function test_filter_action()
    {
        $this->actingAs($this->user);
        $controllerData = Controller::factory()->create();
        $actionData = [
            'nom' => 'test',
            'controller_id' => $controllerData->id
        ];
        $actions = $this->actionRepository->create($actionData);
        $filterResults = $this->actionRepository->filter();
        $this->assertNotNull($filterResults);
    }
}

