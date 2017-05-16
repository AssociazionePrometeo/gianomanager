<?php

namespace Admin;

use App\Card;
use App\User;
use App\Resource;
use App\Reservation;
use FunctionalTester;
use Carbon\Carbon as DateTime;

class ReservationCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedAsAdmin();
    }

    // tests
    public function createNewReservation(FunctionalTester $I)
    {
        $I->wantTo('Create a new reservation');

        $user = factory(User::class)->create();
        $resource = factory(Resource::class)->create();

        $I->amOnRoute('admin.reservations.create');
        $I->selectOption('user_id', $user->id);
        $I->selectOption('resource_id', $resource->id);
        $I->fillField('starts_at', new DateTime('tomorrow 2pm'));
        $I->fillField('ends_at', new DateTime('tomorrow 4pm'));
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.reservations.index');
        $I->seeRecord(Reservation::class, [
            'user_id' => $user->id,
            'resource_id' => $resource->id,
            'starts_at' => new DateTime('tomorrow 2pm'),
        ]);
    }

    public function editReservation(FunctionalTester $I)
    {
        $I->wantTo('Edit the starting time of a reservation');

        $reservation = factory(Reservation::class)->create();

        $I->amOnRoute('admin.reservations.edit', $reservation->id);
        $I->fillField('starts_at', new DateTime('tomorrow 8am'));
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.reservations.index');
        $I->seeRecord(Reservation::class, [
            'user_id' => $reservation->user->id,
            'resource_id' => $reservation->resource->id,
            'starts_at' => new DateTime('tomorrow 8am'),
        ]);
    }

    public function deleteReservation(FunctionalTester $I)
    {
        $I->wantTo('Delete a reservation');

        $reservation = factory(Reservation::class)->create();

        $I->amOnRoute('admin.reservations.edit', $reservation->id);
        $I->click('#delete');

        $I->seeCurrentRouteIs('admin.reservations.index');
        $I->dontSeeRecord(Reservation::class, ['id' => $reservation->id]);
    }
}
