<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompanyTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_index()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/company')
                ->scrollTo('.text-capitalize')
                ->assertSee(trans('simplecrm.company.title'));
        });
    }
}
