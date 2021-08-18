<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CompanyImport implements ToModel, WithStartRow
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

        return new Company([
            'name' =>           $row[1],
            'email' =>          $row[2],
            'logo' =>           'sample-logo.png', // Image null
            'website_link' =>   $row[4],
        ]);
    }
}
