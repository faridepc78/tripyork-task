<?php

namespace App\Http\Resources\Api\V1\Site\Log;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LogPaginateResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'status' => 'Success',
            'message' => 'list of logs for search hotel',
            'code' => 200,
            'data' => $this->collection->map(function ($item) {

                return [
                    'id' => $item->id,
                    'user_ip' => $item->user_ip,
                    'data' => $item->data,
                    'type' => $item->type,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s')
                ];
            })
        ];
    }
}
