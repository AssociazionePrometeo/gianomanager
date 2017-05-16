<?php

namespace Admin;

use App\Card;
use App\User;
use \FunctionalTester;

class CardCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedAsAdmin();
    }

    // tests
    public function createNewCard(FunctionalTester $I)
    {
        $I->wantTo('Create a new card and associate to an user');

        $user = factory(User::class)->create();

        $I->amOnRoute('admin.cards.create');
        $I->fillField('id', 'card-code-123');
        $I->selectOption('user_id', $user->id);
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.cards.index');
        $I->see('card-code-123');
        $I->seeRecord(Card::class, ['id' => 'card-code-123', 'user_id' => $user->id]);
    }

    public function editCard(FunctionalTester $I)
    {
        $I->wantTo('Assign a card to a different user');

        $card = factory(Card::class)->create();
        $user = factory(User::class)->create();

        $I->amOnRoute('admin.cards.edit', $card->id);
        $I->selectOption('user_id', $user->id);
        $I->click('#save');

        $I->seeCurrentRouteIs('admin.cards.index');
        $I->seeRecord(Card::class, ['id' => $card->id, 'user_id' => $user->id]);
        $I->dontSeeRecord(Card::class, ['id' => $card->id, 'user_id' => $card->user->id]);
    }

    public function deleteCard(FunctionalTester $I)
    {
        $I->wantTo('Delete a card');

        $card = factory(Card::class)->create();

        $I->amOnRoute('admin.cards.edit', $card->id);
        $I->click('#delete');

        $I->seeCurrentRouteIs('admin.cards.index');
        $I->dontSeeRecord(Card::class, ['id' => $card->id]);
    }
}
