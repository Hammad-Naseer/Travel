<?php

namespace App\Imports;

use App\Models\Amenity;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AmenitiesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Amenity([
            'title'=>$row['title'],
            'url_title'=>$row['url_title'],
            'created_at'=>$row['created_at'],
            'updated_at'=>$row['updated_at']
        ]);
    }
}
