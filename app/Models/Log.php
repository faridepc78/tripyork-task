<?php

namespace App\Models;

use App\Enums\LogTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'user_ip',
            'data',
            'type'
        ];

    protected $casts =
        [
            'type' => LogTypeEnum::class,
            'data' => 'array'
        ];
}
