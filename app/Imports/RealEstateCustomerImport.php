<?php

namespace App\Imports;

use App\Models\RealEstateCustomer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RealEstateCustomerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new RealEstateCustomer([
            'fullname' => $row['fullname'],
            'mobilenumber' => $row['mobilenumber'],
            'landlinenumber' => $row['landlinenumber'],
            'email' => $row['email'],
            'address' => $row['address'],
            'profession' => $row['profession'],
            'organization' => $row['organization'],
            'nationality' => $row['nationality'],
            'country' => $row['country'],
            'userid' => auth()->user()->id,
            'callstatus' => '0'
        ]);
    }
}