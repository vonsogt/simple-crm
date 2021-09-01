<?php

namespace Tests\Browser;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyTest extends DuskTestCase
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
                ->visit('/admin/company')
                ->assertSee(trans('simplecrm.company.title'));
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

        $this->browse(function ($browser) use ($user, $company) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/company')
                ->click('a[title="' . trans('simplecrm.show') . '"]')
                ->assertSee($company->name);
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

        $this->browse(function ($browser) use ($user, $company) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/company')
                ->click('a[title="' . trans('simplecrm.edit') . '"]')
                ->type('name', 'Edited')
                ->press(trans('simplecrm.save'))
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

        // Create new company
        $company = Company::factory()->create();

        $this->browse(function ($browser) use ($user, $company) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/company')
                ->click('a[title="' . trans('simplecrm.delete') . '"]')
                ->press(trans('simplecrm.delete_confirmation_confirm_button'))
                ->waitFor('.dataTables_empty')
                ->assertDontSee($company->name);
        });
    }
}
