<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'chain_id',
            'chain_name',
            'country_code',
            'country_filename',
            'country_name',
            'currency_code',
            'facilities',
            'hotel_address',
            'hotel_filename',
            'hotel_id',
            'hotel_name',
            'hotel_post_code',
            'image_id',
            'images',
            'latitude',
            'longitude',
            'min_rate',
            'place_filename',
            'place_id',
            'place_name',
            'place_type',
            'popularity',
            'property_type',
            'property_type_id',
            'star_rating',
            'state_name',
            'state_place_filename',
            'state_place_id',
            'themes',
            'trademarked'
        ];
}
