<?php namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;
use Hash;


class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_shows_errors_if_we_fail_to_log_in()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('LOGIN')
                ->assertPathIs('/login')
                ->waitForText('Password')
                ->assertDontSee('credentials')
                ->type('email', 'foo@bar')
                ->type('password', 'bar')
                // ->press('LOGIN') // this gets the first login
                ->press('button[type=submit]')
                ->assertPathIs('/login')
                ->assertDontSee('Whoops')
                ->assertInputValue('email','foo@bar')
                ->assertSee('credentials');
        });
    }

    /**
     * @test
     */
    public function it_can_log_in()
    {
        factory(User::class)->create([
            'email' => 'foo@bar.com',
            'password' => Hash::make('foo'),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->waitForText('Password')
                ->type('email', 'foo@bar.com')
                ->type('password', 'foo')
                ->press('button[type=submit]') // LOGIN
                ->assertPathIs('/home');

            $browser->visit('/logout')
                ->assertPathIs('/');
        });
    }

    /**
     * @test
     */
    public function it_can_register_a_new_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('REGISTER')
                ->waitForText('Password')
                ->type('name', 'Foo Bar')
                ->type('email', 'foo@bar.com')
                ->type('password', 'password1234')
                ->type('password_confirmation', 'password1234')
                ->press('button[type=submit]') // REGISTER
                ->assertPathIs('/home');

            $browser->visit('/logout')
                ->assertPathIs('/');
        });
    }

    /**
     * @test
     */
    public function it_can_handle_quotation_marks_when_registering_a_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('REGISTER')
                ->waitForText('Password')
                ->type('name', 'Paul "Foo" O\'Bar')
                ->type('email', 'foo@bar.com')
                ->type('password', 'x')
                ->type('password_confirmation', 'xyz')
                ->press('button[type=submit]') // REGISTER
                ->assertPathIs('/register')
                ->waitForText('The password confirmation')
                ->assertInputValue('name','Paul "Foo" O\'Bar');
        });
    }

}
