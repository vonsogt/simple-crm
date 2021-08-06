<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmployeeTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit(route('admin.employee.index', app()->getLocale()))
                ->assertRouteIs('admin.employee.index');
        });
    }
}
