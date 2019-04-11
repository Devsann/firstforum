<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'title' => $this->title,
          'queSlug' => $this->queSlug,
          'replies' => ReplyResource::collection($this->replies),
          'replies_count' => $this->replies->count(),
          'path' => $this->path,
          'catName' => $this->category->catName,
          'body' => $this->body,
          'created_at' => $this->created_at->diffForHumans(),
          'user' => $this->user->name,
          'user_id' => $this->user_id,
        ];
    }
}
