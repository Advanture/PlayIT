<?php

namespace App\Http\Resources;

use App\Models\Achievement;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitProfileResource extends JsonResource
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
            'id' => $this->id,
            'vk_id' => $this->vk_id,
            'avatar_url' => $this->avatar_url,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'is_banned' => $this->is_banned,
            'rank_id' => $this->rank_id,
            'last_fortune' => $this->last_fortune,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'character' => $this->body.$this->glasses.$this->top.$this->bottom.".png",
            'corona' => $this->corona,
            'balance' => $this->balance,
            'rank' => $this->rank,
            'achievements' => VisitAchievementResource::collection($this->achievements),
        ];
    }
}
