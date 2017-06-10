<?php namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class WelcomeTest extends DuskTestCase
{
    /**
     * @test
     */
    public function it_can_show_the_welcome_screen()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel')
                    // If the javascript fails, the carousel
                    // data will not be displayed...
                    ->assertVisible('.carousel .carousel__item');
        });
    }
}
