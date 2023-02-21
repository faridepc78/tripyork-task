<?php

namespace App\Imports;

use App\Models\Hotel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HotelsImport implements ToModel, WithStartRow, SkipsEmptyRows
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row): Hotel
    {
        return new Hotel([
            'chain_id' => $row[2],
            'chain_name' => $row[3],
            'country_code' => $row[4],
            'country_filename' => $row[5],
            'country_name' => $row[6],
            'currency_code' => $row[7],
            'facilities' => $row[8],
            'hotel_address' => $row[9],
            'hotel_filename' => $row[10],
            'hotel_id' => $row[11],
            'hotel_name' => $row[12],
            'hotel_post_code' => $row[13],
            'image_id' => $row[14],
            'images' => $row[15],
            'latitude' => $row[16],
            'longitude' => $row[17],
            'min_rate' => $row[18],
            'place_filename' => $row[19],
            'place_id' => $row[20],
            'place_name' => $row[21],
            'place_type' => $row[22],
            'popularity' => $row[23],
            'property_type' => $row[24],
            'property_type_id' => $row[25],
            'star_rating' => $row[26],
            'state_name' => $row[27],
            'state_place_filename' => $row[28],
            'state_place_id' => $row[29],
            'themes' => $row[30],
            'trademarked' => $row[31]
        ]);
    }
}
