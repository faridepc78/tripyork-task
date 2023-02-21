<?php

namespace App\Repositories\Hotel;

use App\Models\Hotel;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{
    public Model $model;

    public function __construct(Hotel $model)
    {
        $this->model = $model;
    }

    public function search($keyword): Collection|array
    {
        $array_data = [];

        $cities = $this->model::query()
            ->whereNotNull('min_rate')
            ->where('place_name', 'like', '%' . $keyword . '%')
            ->groupBy('place_name')
            ->get();

        foreach ($cities as $city) {

            $cheapest_hotel = $this->model::query()
                ->whereNotNull('min_rate')
                ->where('place_name', '=', $city->place_name)
                ->orderBy('min_rate')
                ->select('hotel_name', 'min_rate')
                ->first();

            $popular_hotel = $this->model::query()
                ->whereNotNull('min_rate')
                ->where('place_name', '=', $city->place_name)
                ->orderBy('popularity', 'desc')
                ->select('hotel_name', 'min_rate')
                ->first();

            $array_data[] = [
                'city' => $city->place_name,
                'city_id' => $city->place_id,
                'cheapest_hotel' => $cheapest_hotel->toArray(),
                'popular_hotel' => $popular_hotel->toArray()
            ];
        }

        return $array_data;
    }
}
