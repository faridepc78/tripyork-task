<?php

namespace App\Repositories\Log;

use App\Models\Log;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class LogRepository extends BaseRepository implements LogRepositoryInterface
{
    public Model $model;

    public function __construct(Log $model)
    {
        $this->model = $model;
    }
}
