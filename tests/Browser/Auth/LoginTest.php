<?php

namespace Tests\Browser\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * test_registered_user_can_login
     *
     * @return void
     */
    public function test_registered_user_can_login()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            // Begin test
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press(trans('simplecrm.sign_in'))
                ->assertPathIs('/admin');
        });
    }

    /**
     * test_logged_user_can_logout
     *
     * @return void
     */
    public function test_logged_user_can_logout()
    {
        // Create new user
        $user = User::factory()->create([
            'name' => 'Example User',
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin')
                ->press('Example User')
                ->press(trans('simplecrm.sign_out'))
                ->assertPathIs('/login');
        });
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@name' => 'input[name="name"]',
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
            '@password_confirmation' => 'input[name="password_confirmation"]',
        ];
    }
}
