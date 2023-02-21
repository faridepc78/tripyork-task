<?php

namespace App\Http\Controllers\Api\V1\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Site\Log\LogPaginateResource;
use App\Imports\HotelsImport;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Log\LogRepositoryInterface;
use App\Traits\ApiResponser;
use Maatwebsite\Excel\Facades\Excel;

class ApiController extends Controller
{
    use ApiResponser;

    protected HotelRepositoryInterface $hotelRepository;
    protected LogRepositoryInterface $logRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository,
                                LogRepositoryInterface   $logRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->logRepository = $logRepository;
    }

    public function import_hotel_data()
    {
        if (!$this->hotelRepository->getCount()) {
            Excel::import(new HotelsImport, 'data/au_hotels.xlsx');

            return $this->success_response(null,
                'information has been successfully registered');
        } else {
            return $this->error_response(400,
                'the information was previously recorded');
        }
    }

    public function get_search_logs()
    {
        $logs = $this->logRepository->paginate(20);

        return new LogPaginateResource($logs);
    }
}
