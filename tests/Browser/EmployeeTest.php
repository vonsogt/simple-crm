<?php

namespace Tests\Browser;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class EmployeeTest extends DuskTestCase
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
            $browser->visit('/admin/employee')
                ->assertSee(trans('simplecrm.employee.title'));
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

        $this->browse(function ($browser) use ($user, $company) {

            $faker = Factory::create();
            $first_name =   $faker->firstName();
            $last_name =    $faker->lastName();
            $email =        $faker->unique()->safeEmail();
            $phone =        $faker->phoneNumber();
            $password =     $faker->password();

            $browser->loginAs($user)
                ->visit('/admin/employee')
                ->waitUntil('!$.active')
                ->click('.d-print-none a')
                ->type('first_name', $first_name)
                ->type('last_name', $last_name)
                ->select('company_id', $company->id)
                ->type('email', $email)
                ->type('phone', $phone)
                ->type('password', $password)
                ->type('password_confirmation', $password)
                ->scrollIntoView('.card-footer')
                ->press(trans('simplecrm.save'))
                ->waitUntil('!$.active')
                ->assertSee($first_name . ' ' . $last_name);
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
        ]);

        $this->browse(function ($browser) use ($user, $company, $employee) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/employee')
                ->click('a[title="' . trans('simplecrm.show') . '"]')
                ->assertSee($employee->first_name);
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

        $this->browse(function ($browser) use ($user, $company, $employee) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/employee')
                ->click('a[title="' . trans('simplecrm.edit') . '"]')
                ->type('email', 'employee@example.com')
                ->scrollIntoView('.card-footer')
                ->press(trans('simplecrm.save'))
                ->assertSee('employee@example.com');
        });
    }

    /**
     * Dusk  test delete
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
        ]);

        $this->browse(function ($browser) use ($user, $company, $employee) {
            // Begin test
            $browser->loginAs($user)
                ->visit('/admin/employee')
                ->click('a[title="' . trans('simplecrm.delete') . '"]')
                ->press(trans('simplecrm.delete_confirmation_confirm_button'))
                ->waitFor('.dataTables_empty')
                ->assertDontSee($employee->first_name);
        });
    }

    /**
     * Dusk test import excel
     *
     * @return void
     */
    public function test_import_excel()
    {
        // Create new user
        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);
        // Create new company
        $company = Company::factory()->create([
            'name' =>   'Theodore Murphy'
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/admin/employee')
                ->press(trans('simplecrm.import_excel'))
                ->attach('input[name=excel_import]', storage_path('app/public/employees/excel-import/sample-excel-import.xlsx'))
                ->assertSee('sample-excel-import.xlsx')
                ->press(trans('simplecrm.import'))
                ->assertSee('Sample Test5');
        });
    }
}
