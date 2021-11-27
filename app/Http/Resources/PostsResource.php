<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsResource extends ResourceCollection
{
    public $collects = 'App\Http\Resources\PostResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'my-links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public function with($request)
    {
        return [
            'my-meta' => [
                'key' => 'value',
            ],
        ];
    }
}
