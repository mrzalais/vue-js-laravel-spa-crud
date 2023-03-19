<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var $this Post */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category->name,
            'content' => substr($this->content, 0, 50) . '...',
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
