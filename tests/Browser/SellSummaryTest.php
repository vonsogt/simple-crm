<?php

namespace Tests\Browser;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Sell;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SellSummaryTest extends DuskTestCase
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
            // Login
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press(trans('simplecrm.sign_in'));

            // Begin test
            $browser->visit('/admin/sell-summary')
                ->waitUntil('!$.active')
                ->assertSee(trans('simplecrm.sell_summary.title'));
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
        // Create new company
        $company = Company::factory()->create();
        // Create new employee
        $employee = Employee::factory()->create([
            'company_id' => $company->id,
            'password' =>   bcrypt('password')
        ]);
        // Create new item
        $item = Item::factory()->create();
        // Create new sell
        $sell = Sell::factory()->create();

        $this->browse(function ($browser) use ($user, $item, $sell) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/sell-summary')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.show') . '"]')
                ->click('a[title="' . trans('simplecrm.show') . '"]')
                ->assertSee(number_format($sell->price, 2)) // Price Total
                ->assertSee(number_format($sell->price * $sell->discount / 100, 2)) // Discount Total
                ->assertSee(number_format($sell->price - ($sell->price * $sell->discount / 100), 2)) // Total
                ->assertSee($item->name);
        });
    }
}
