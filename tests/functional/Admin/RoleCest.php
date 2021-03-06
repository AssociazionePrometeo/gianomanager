<?php

namespace Admin;

use App\Role;
use App\User;
use \FunctionalTester;

class RoleCest
{
    public function _before(FunctionalTester $I)
    {
        $user = factory(User::class)->create();
        $user->roles()->sync(['admin']);

        $I->amLoggedAs($user);
    }

    // tests
    public function createNewRole(FunctionalTester $I)
    {
        $I->wantTo('Create a new role');

        $I->amOnRoute('admin.roles.create');
        $I->fillField('id', 'new_test_role');
        $I->fillField('name', 'New test role');
        $I->checkOption('permissions[user-view]');
        $I->checkOption('permissions[user-create]');
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.roles.index');
        $I->see('New test role');
        $role = $I->grabRecord(Role::class, ['id' => 'new_test_role']);
        $I->assertTrue($role->permissions['user-view']);
        $I->assertTrue($role->permissions['user-create']);
        $I->assertCount(2, $role->permissions);
    }

    public function editRole(FunctionalTester $I)
    {
        $I->wantTo('Edit a role name');

        $role = factory(Role::class)->create(['id' => 'test_role', 'name' => 'Old name']);
        $I->amOnRoute('admin.roles.edit', $role->id);
        $I->fillField('name', 'New name');
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.roles.index');
        $I->seeRecord('roles', ['name' => 'New name']);
        $I->dontSeeRecord('roles', ['name' => 'Old name']);
    }

    public function deleteRole(FunctionalTester $I)
    {
        $I->wantTo('Delete a role');

        $role = factory(Role::class)->create(['id' => 'test_role', 'name' => 'Test']);
        $I->seeRecord('roles', ['id' => 'test_role']);

        $I->amOnRoute('admin.roles.edit', $role->id);
        $I->click('#delete');
        $I->seeCurrentRouteIs('admin.roles.index');

        $I->dontSeeRecord('roles', ['id' => 'test_role']);
    }
}
