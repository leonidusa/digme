<?php

use Illuminate\Database\Seeder;
use App\Company;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::all()->each(function ($company) {
            $employees = [];
            for ($i=0; $i < rand(1, 5); $i++) {
                $employees[] = factory(App\Employee::class)->make();
            }
            $company->employees()->saveMany($employees);
        });
    }
}
