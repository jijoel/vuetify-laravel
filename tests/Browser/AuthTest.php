<?php namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/** @group now */
class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_shows_errors_if_failed_to_log_in()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('LOGIN')
                ->waitForText('Password')
                ->type('email', 'foo')
                ->type('password', 'bar')
                ->press('LOGIN');
        });

        $this->markTestIncomplete();
    }
}
