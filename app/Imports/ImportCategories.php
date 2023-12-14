<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategories implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name' => $row['0'],
            'image' => $row['1'],
        ]);
    }
}
