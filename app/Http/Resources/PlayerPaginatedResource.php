<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerPaginatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'current_page'   => $this->currentPage(),
            'data'           => PlayerResource::collection($this->resource->items()),
            'first_page_url' => $this->url(1),
            'from'           => $this->firstItem(),
            'last_page'      => $this->lastPage(),
            'last_page_url'  => $this->url($this->lastPage()),
            'links'          => $this->linkCollection()->toArray(),
            'next_page_url'  => $this->nextPageUrl(),
            'path'           => $this->path(),
            'per_page'       => $this->perPage(),
            'prev_page_url'  => $this->previousPageUrl(),
            'to'             => $this->lastItem(),
            'total'          => $this->total(),
        ];
    }
}
