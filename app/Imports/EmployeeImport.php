<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmployeeImport implements ToModel, WithStartRow
{
    /**
     * startRow
     *
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Check if row is null
        if (!isset($row[0])) {
            return null;
        }

        // Separate full name to first_name & last_name
        $full_name_arr = explode(' ', $row[1]);
        $first_name = $full_name_arr[0];
        $last_name = $full_name_arr[1];

        // Return null if company doesn't exists
        $company = Company::where('name', $row[2]);
        if (!$company->exists()) {
            return null;
        }

        return new Employee([
            'first_name' =>     $first_name,
            'last_name' =>      $last_name,
            'company_id' =>     $company->first()->id,
            'email' =>          $row[3],
            'phone' =>          $row[4],
        ]);
    }
}
