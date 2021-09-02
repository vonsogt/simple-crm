<?php

namespace Tests\Browser;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PreferenceTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test change language.
     *
     * @return void
     */
    public function test_change_language()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            // Login
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press(trans('simplecrm.sign_in'));

            $browser->visit('/admin/preferences')
                ->assertSee(trans('simplecrm.profile'))
                ->select('language', 'id')
                ->press(trans('simplecrm.save_changes'))
                ->assertSee('Umum');
        });
    }

    /**
     * Dusk test change timezone
     *
     * @return void
     */
    public function test_change_timezone()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);
        // Create new item
        $item = Item::factory()->create();

        $this->browse(function ($browser) use ($user, $item) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/preferences')
                ->assertSee(trans('simplecrm.profile'))
                ->select('timezone', 'Asia/Jakarta')
                ->press(trans('simplecrm.save_changes'))
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.show') . '"]')
                ->click('a[title="' . trans('simplecrm.show') . '"]')
                ->assertSee(
                    Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at, 'UTC')
                        ->setTimezone('Asia/Jakarta')
                );
        });
    }
}
