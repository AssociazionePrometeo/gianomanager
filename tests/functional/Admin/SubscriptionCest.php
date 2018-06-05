<?php

namespace Admin;

use App\Card;
use App\User;
use App\Subscription;
use \FunctionalTester;
use Carbon\Carbon as DateTime;

class SubscriptionCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedAsAdmin();
    }

    // tests
    public function createNewSubscription(FunctionalTester $I)
    {
        $I->wantTo('Create a new subscription');

        $I->amOnRoute('admin.subscriptions.create');
        $I->fillField('name', 'New subscription');
        $I->fillField('end_date', new DateTime('tomorrow 8pm'));
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.subscriptions.index');
        $I->see('New subscription');
        $I->seeRecord(Subscription::class, ['name' => 'New subscription']);
    }

    public function editSubscription(FunctionalTester $I)
    {
        $I->wantTo('Edit the name of a subscription');

        $subscription = factory(Subscription::class)->create();

        $I->amOnRoute('admin.subscriptions.edit', $subscription->id);
        $I->fillField('name', 'Updated subscription');
        $I->fillField('end_date', new DateTime('tomorrow 8am'));
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.subscriptions.index');
        $I->seeRecord(Subscription::class, ['name' => 'Updated subscription']);
    }

    public function deleteSubscription(FunctionalTester $I)
    {
        $I->wantTo('Delete a subscription');

        $subscription = factory(Subscription::class)->create();

        $I->amOnRoute('admin.subscriptions.edit', $subscription->id);
        $I->click('#delete');

        $I->seeCurrentRouteIs('admin.subscriptions.index');
        $I->dontSeeRecord(Subscription::class, ['id' => $subscription->id]);
    }
}
