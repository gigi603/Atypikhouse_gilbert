<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testExemple()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://www.atypikhouse-projet.ovh/')
                    ->clickLink('Inscription')
                    ->assertSee('Register')
                    ->value('#name', 'Dupond')
                    ->value('#prenom', 'Paul')
                    //->type('#email', 'test@tst.fr')
                    ->value('#password', '123456789')
                    ->value('#password-confirm', '123456789')
                    ->click('button[type="submit"]')
                    ->assertPathIs('/register');
        });
    }
}
