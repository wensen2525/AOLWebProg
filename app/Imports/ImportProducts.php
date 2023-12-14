<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row['0'],
            'category_id' => $row['1'],
            'description' => $row['2'],
            'ingredients' => $row['3'],
            'howtouse' => $row['4'],
            'dose' => $row['5'],
            'sideeffects' => $row['6'],
            'price' => $row['7'],
            'image' => $row['8'],
            'stock' => $row['9'],
            'stock_sold' => $row['10'],
            'is_open' => $row['11'],
        ]);
    }
}
