<?php namespace Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;


class AuthTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_can_show_the_welcome_page()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee(config('app.name'))
            ->assertSee('login')
            ->assertSee('register');
    }

    /**
     * @test
     */
    public function it_can_show_the_login_page()
    {
        $this->get('/login')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_returns_errors_on_invalid_login_attempt()
    {
        $test = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $test->assertRedirect('/')
            ->assertSessionHasErrors('email')
            ->assertSessionHasErrors('password');
    }

    /**
     * @test
     */
    public function it_returns_errors_on_incorrect_credentials()
    {
        $test = $this->post('/login', [
            'email' => 'a',
            'password' => 'b',
        ]);

        $test->assertRedirect('/')
            ->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function it_redirects_to_home_on_valid_login()
    {
        factory(User::class)->create([
            'email' => 'foo@bar.com',
            'password' => \Hash::make('foo'),
        ]);

        $test = $this->post('/login', [
            'email' => 'foo@bar.com',
            'password' => 'foo',
        ]);

        $test->assertRedirect('/home');
    }

    /**
     * @test
     */
    public function it_can_show_the_registration_page()
    {
        $this->get('/register')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_show_the_password_email_page()
    {
        $this->get('/password/reset')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_show_the_password_reset_page()
    {
        $this->get('/password/reset/xxx')
            ->assertStatus(200);
    }

}
