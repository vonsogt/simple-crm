<?php

namespace Tests\Browser;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Sell;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class SellTest extends DuskTestCase
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
            $browser->visit('/admin/sell')
                ->waitUntil('!$.active')
                ->assertSee(trans('simplecrm.sell.title'));
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
        // Create new company
        $company = Company::factory()->create();
        // Create new employee
        $employee = Employee::factory()->create([
            'company_id' => $company->id,
            'password' =>   bcrypt('password')
        ]);
        // Create new item
        $item = Item::factory()->create();

        $this->browse(function ($browser) use ($user, $company, $employee, $item) {
            $browser->loginAs($user)
                ->visit('/admin/sell')
                ->waitUntil('!$.active')
                ->click('.d-print-none a')
                ->type('created_date', Carbon::now()->format('Y-m-d H:i'))
                ->select('item_id', $item->id)
                ->type('price', rand(1000, 5000))
                ->type('discount', rand(10, 50))
                ->select('employee_id', $employee->id)
                ->scrollIntoView('.card-footer')
                ->press(trans('simplecrm.save'))
                ->waitUntil('!$.active')
                ->assertSee($item->name);
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
                ->visit('/admin/sell')
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

        $this->browse(function ($browser) use ($user, $item) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/sell')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.edit') . '"]')
                ->click('a[title="' . trans('simplecrm.edit') . '"]')
                ->type('price', '18081999')
                ->press(trans('simplecrm.save'))
                ->waitUntil('!$.active')
                ->assertSee(number_format('18081999', 2));
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
        $sell = Sell::factory()->create([
            'price' =>  18081999,
        ]);

        $this->browse(function ($browser) use ($user, $item, $sell) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/sell')
                ->waitUntil('!$.active')
                ->waitFor('a[title="' . trans('simplecrm.delete') . '"]')
                ->click('a[title="' . trans('simplecrm.delete') . '"]')
                ->press(trans('simplecrm.delete_confirmation_confirm_button'))
                ->waitUntil('!$.active')
                ->waitFor('.dataTables_empty')
                ->assertDontSee(number_format($sell->price, 2));
        });
    }
}
