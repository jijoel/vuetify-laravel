<?php namespace Tests;


class AuthTest extends TestCase
{
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
            ->assertStatus(200)
            ->assertSee('Login');
    }

    /**
     * @test
     */
    public function it_can_show_the_registration_page()
    {
        $this->get('/register')
            ->assertStatus(200)
            ->assertSee('Register');
    }


}
