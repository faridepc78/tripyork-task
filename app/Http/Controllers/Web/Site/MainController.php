<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\LogTypeEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Hotel\HotelRepositoryInterface;
use App\Repositories\Log\LogRepositoryInterface;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected HotelRepositoryInterface $hotelRepository;
    protected LogRepositoryInterface $logRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository,
                                LogRepositoryInterface   $logRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->logRepository = $logRepository;
    }

    public function home()
    {
        return view('site.home.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $items = $this->hotelRepository->search($keyword);

        if ($items) {
            $error_message = null;

            $this->logRepository->create($this->prepareDataForLog($request, $items));
        } else {
            $error_message = 'No results found';
        }

        return view('site.home.index',
            compact('items', 'error_message'));
    }

    protected function prepareDataForLog(Request $request, array $items)
    {
        return [
            'user_ip' => $request->ip(),
            'data' => $items,
            'type' => LogTypeEnum::SEARCH_HOTEL->value
        ];
    }
}
