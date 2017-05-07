<?php

namespace Admin;

use App\User;
use \FunctionalTester;

class UserCest
{
    public function _before(FunctionalTester $I)
    {
        $user = factory(User::class)->create();

        $I->amLoggedAs($user);
    }

    // tests
    public function createNewUser(FunctionalTester $I)
    {
        $I->wantTo('Create a new user');

        $I->amOnRoute('admin.users.create');
        $I->fillField('name', 'Test user');
        $I->fillField('email', 'test@example.com');
        $I->fillField('phone_number', '0001112223');
        $I->fillField('expires_at', '2117-04-30');
        $I->fillField('password', 'mynewpassword');
        $I->selectOption('roles[]', ['admin', 'default']);
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.users.index');
        $I->see('test@example.com');
        $I->seeRecord(User::class, ['email' => 'test@example.com']);
        $user = $I->grabRecord(User::class, ['email' => 'test@example.com']);

        $I->assertContains('admin', $user->roles->pluck('id'));
        $I->assertContains('default', $user->roles->pluck('id'));
    }

    public function editUser(FunctionalTester $I)
    {
        $I->wantTo('Edit an user profile');

        $user = factory(User::class)->create(['email' => 'test@example.com']);
        $user->roles()->sync(['admin', 'default']);

        $I->amOnRoute('admin.users.edit', $user->id);
        $I->fillField('email', 'newemail@example.com');
        $I->selectOption('roles[]', 'admin');
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.users.index');
        $I->seeRecord('users', ['email' => 'newemail@example.com']);
        $I->dontSeeRecord('users', ['email' => 'test@example.com']);

        $user = $I->grabRecord(User::class);

        $I->assertContains('admin', $user->roles->pluck('id'));
        $I->assertNotContains('default', $user->roles->pluck('id'));
    }

    public function deleteUser(FunctionalTester $I)
    {
        $I->wantTo('Delete an user');

        $user = factory(User::class)->create(['email' => 'test@example.com']);
        $I->seeRecord('users', ['email' => 'test@example.com']);

        $I->amOnRoute('admin.users.edit', $user->id);
        $I->click('#delete');
        $I->seeCurrentRouteIs('admin.users.index');

        $I->dontSeeRecord('users', ['email' => 'test@example.com']);
    }
}
