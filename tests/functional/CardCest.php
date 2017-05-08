<?php

use App\Card;
use App\User;

class CardCest
{
    protected $user;

    public function _before(FunctionalTester $I)
    {
        $this->user = factory(User::class)->create();
        $I->amLoggedAs($this->user);
    }

    // tests
    public function lockCard(FunctionalTester $I)
    {
        $I->wantTo('Lock one of my cards');

        factory(Card::class)->create([
            'id' => 'test_card',
            'status' => Card::STATUS_ENABLED,
            'user_id' => $this->user->id
        ]);

        $I->amOnRoute('cards.index');
        $I->see('test_card');
        $I->see('Abilitata');
        $I->click('button.lock');

        $I->seeCurrentRouteIs('cards.index');
        $I->see('test_card');
        $I->see('Disabilitata');
        $I->seeRecord(Card::class, ['id' => 'test_card', 'status' => Card::STATUS_DISABLED]);
    }

    public function unlockCard(FunctionalTester $I)
    {
        $I->wantTo('Unlock one of my cards');

        factory(Card::class)->create([
            'id' => 'test_card',
            'status' => Card::STATUS_DISABLED,
            'user_id' => $this->user->id
        ]);

        $I->amOnRoute('cards.index');
        $I->see('test_card');
        $I->see('Disabilitata');
        $I->click('button.unlock');

        $I->seeCurrentRouteIs('cards.index');
        $I->see('test_card');
        $I->see('Abilitata');
        $I->seeRecord(Card::class, ['id' => 'test_card', 'status' => Card::STATUS_ENABLED]);
    }
}