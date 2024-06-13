<?php

namespace Tests\Feature\Autorisation;

use App\Exceptions\Autorisation\RoleException;
use App\Exceptions\RoleExceptions;
use App\Models\Autorisation\Role;
use App\Models\User;
use App\Repositories\Autorisation\RoleRepository;
use Exception;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseTransactions;
    protected $roleRepository;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->roleRepository = new RoleRepository(new Role);
        $this->user = User::factory()->create();
    }

    public function test_paginate_roles()
    {
        Role::factory(4)->create();
        $roles = $this->roleRepository->paginate();
        $this->assertCount(4, $roles);
    }

    public function test_create_role()
    {
        $roleData = [
            'name' => 'test',
            'guard_name' => 'web',
        ];
        $role = $this->roleRepository->create($roleData);
        $this->assertEquals($roleData['name'], $role->name);
    }

    public function test_prevent_create_role_alraedy_exists()
    {
        $existingRole = Role::factory()->create(); // Create a role
        $roleData = [
            'name' => $existingRole->name, // Use the name of the existing role
            'guard_name' => 'web',
        ];

        try {
            $this->roleRepository->create($roleData); // Attempt to create a role with a duplicated name
            $this->fail('Expected Exceptions was not thrown');
        } catch (RoleException $e) {
            $this->assertEquals(__('Autorisation/roles/message.createRoleException'), $e->getMessage());
            // $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        } catch (Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    public function test_update_role()
    {
        $role = Role::factory()->create();
        $roleData = [
            'name' => 'admins',
            'guard_name' => 'web',
        ];
        $this->roleRepository->update($role->id, $roleData);
        $this->assertDatabaseHas('roles', $roleData);
    }


    public function test_delete_role()
    {
        $role = Role::factory()->create();
        $this->roleRepository->destroy($role->id);
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_searchData_role()
    {
        $roleData = [
            'name' => 'test',
            'guard_name' => 'web',
        ];
        $data = $this->roleRepository->create($roleData);
        $searchValue = 'test';
        $searchResults = $this->roleRepository->searchData($searchValue);
        $this->assertTrue($searchResults->contains('name', $searchValue));
    }
}
