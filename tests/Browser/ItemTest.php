<?php

namespace Tests\Browser;

use App\Models\Item;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class ItemTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Dusk test index
     *
     * @return void
     */
    public function test_index()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function ($browser) use ($user) {
            // Login once
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press(trans('simplecrm.sign_in'));

            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->assertSee(trans('simplecrm.item.title'));
        });
    }

    /**
     * Dusk test create
     *
     * @return void
     */
    public function test_create()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function ($browser) use ($user) {

            $faker = Factory::create();
            $name =     $faker->name();
            $price =    $faker->numberBetween(2000, 100000);

            $browser->loginAs($user)
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->click('.d-print-none a')
                ->type('name', $name)
                ->type('price', $price)
                ->scrollIntoView('.card-footer')
                ->press(trans('simplecrm.save'))
                ->waitUntil('!$.active')
                ->assertSee($name);
        });
    }

    /**
     * Dusk test show
     *
     * @return void
     */
    public function test_show()
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
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.show') . '"]')
                ->click('a[title="' . trans('simplecrm.show') . '"]')
                ->assertSee($item->name);
        });
    }

    /**
     * Dusk test edit
     *
     * @return void
     */
    public function test_edit()
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
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.edit') . '"]')
                ->click('a[title="' . trans('simplecrm.edit') . '"]')
                ->type('name', 'Edited')
                ->press(trans('simplecrm.save'))
                ->waitUntil('!$.active')
                ->assertSee('Edited');
        });
    }

    /**
     * Dusk test delete
     *
     * @return void
     */
    public function test_delete()
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
                ->visit('/admin/item')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.delete') . '"]')
                ->click('a[title="' . trans('simplecrm.delete') . '"]')
                ->press(trans('simplecrm.delete_confirmation_confirm_button'))
                ->waitUntil('!$.active')
                ->waitFor('.dataTables_empty')
                ->assertDontSee($item->name);
        });
    }
}
