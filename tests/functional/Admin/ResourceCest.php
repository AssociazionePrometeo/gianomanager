<?php

namespace Admin;

use App\Card;
use App\User;
use App\Resource;
use \FunctionalTester;

class ResourceCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedAsAdmin();
    }

    // tests
    public function createNewResource(FunctionalTester $I)
    {
        $I->wantTo('Create a new resource');

        $I->amOnRoute('admin.resources.create');
        $I->fillField('name', 'New resource');
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.resources.index');
        $I->see('New resource');
        $I->seeRecord(Resource::class, ['name' => 'New resource']);
    }

    public function editResource(FunctionalTester $I)
    {
        $I->wantTo('Edit the name of a resource');

        $resource = factory(Resource::class)->create();

        $I->amOnRoute('admin.resources.edit', $resource->id);
        $I->fillField('name', 'My new name');
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.resources.index');
        $I->seeRecord(Resource::class, ['name' => 'My new name']);
    }

    public function deleteResource(FunctionalTester $I)
    {
        $I->wantTo('Delete a resource');

        $resource = factory(Resource::class)->create();

        $I->amOnRoute('admin.resources.edit', $resource->id);
        $I->click('#delete');

        $I->seeCurrentRouteIs('admin.resources.index');
        $I->dontSeeRecord(Resource::class, ['id' => $resource->id]);
    }
}
