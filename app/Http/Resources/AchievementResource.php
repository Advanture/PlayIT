<?php

namespace App\Http\Resources;

use App\Models\Achievement;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
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
            'label' => $this->label,
            'description' => $this->description,
            'icon_url' => $this->icon_url,
            'completed' => $this->when(auth()->user()->achievements->contains(Achievement::find($this->id)), true, false),
        ];
    }
}
