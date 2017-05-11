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
            'active' => true,
            'user_id' => $this->user->id
        ]);

        $I->amOnRoute('cards.index');
        $I->see('test_card');
        $I->see(__('models.card_enabled'));
        $I->click('button.lock');

        $I->seeCurrentRouteIs('cards.index');
        $I->see('test_card');
        $I->see(__('models.card_disabled'));
        $I->seeRecord(Card::class, ['id' => 'test_card', 'active' => false]);
    }

    public function unlockCard(FunctionalTester $I)
    {
        $I->wantTo('Unlock one of my cards');

        factory(Card::class)->create([
            'id' => 'test_card',
            'active' => false,
            'user_id' => $this->user->id
        ]);

        $I->amOnRoute('cards.index');
        $I->see('test_card');
        $I->see(__('models.card_disabled'));
        $I->click('button.unlock');

        $I->seeCurrentRouteIs('cards.index');
        $I->see('test_card');
        $I->see(__('models.card_enabled'));
        $I->seeRecord(Card::class, ['id' => 'test_card', 'active' => true]);
    }
}
