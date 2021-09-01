<?php

namespace Tests\Browser\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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

        $this->browse(function ($browser) use ($user) {
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
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin')
                ->click('.dropdown-toggle')
                ->click('.float-right')
                ->assertPathIs('/login');
        });
    }
}
