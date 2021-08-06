<?php

namespace Tests\Browser\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testRegisteredUserCanSignInAndSignOut()
    {
        $this->browse(function (Browser $browser) {
            // Create new user
            $user = User::factory()->create([
                'email' => 'admin@admin.com'
            ]);

            // Begin test
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press(trans('simplecrm.sign_in'))
                ->click('a[href="' . route('logout', app()->getLocale()) . '"]')
                ->visit('/admin')
                ->assertPathIs('/login');
        });
    }
}
