<?php

namespace App\Repositories\Hotel;

use App\Repositories\Contracts\BaseRepositoryInterface;

interface HotelRepositoryInterface extends BaseRepositoryInterface
{
    public function search($keyword);
}
