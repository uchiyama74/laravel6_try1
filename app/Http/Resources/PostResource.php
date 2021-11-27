<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id2' => $this->when($this->id > 10, $this->id),
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at->format('Y年m月d日'),
            'updated_at' => $this->updated_at->format('Y年m月d日'),
            'deleted_at' => $this->deleted_at ? $this->deleted_at->format('Y年m月d日') : null
        ];
    }
}
