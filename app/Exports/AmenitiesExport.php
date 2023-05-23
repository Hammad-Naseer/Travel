<?php

namespace App\Exports;

use App\Models\Amenity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class AmenitiesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Amenity::getAlllAmenities());
        //return Amenity::all();
    }
    public function headings():array{
        return ['Id','Amenities Title','Url_Title','created_at','updated_at'];
    }
}
