<?php

namespace Tests\Feature\Autorisation;

use Tests\TestCase;
use App\Models\Autorisation\Role;
use App\Models\Autorisation\Action;
use App\Models\Autorisation\Controller;
use Spatie\Permission\Models\Permission;
use App\Models\Autorisation\Autorisation;
use App\Models\Autorisation\RoleHasPermission;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Autorisation\GestionAutorisationRepository;



class GestionAutorisationTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use DatabaseTransactions;

    protected $autorisationRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->autorisationRepository = new GestionAutorisationRepository(new RoleHasPermission);
    }


public function test_create_autorisation(){

    
    $Role = Role::factory()->create();
    $Permission = Permission::create(["name" => "create-taskController", "guard_name" => "web"]);
    dd($Permission);




    $data = [
        'role_id' => $Role->id,
        'permission_id' => $Permission->id,
    ];

    // Call the create method of the repository
    $autorisation = $this->autorisationRepository->create($data);

    // Assert that the created autorisation is an instance of Autorisation
    $this->assertInstanceOf(RoleHasPermission::class, $autorisation);
}

}