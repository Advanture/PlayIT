<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'img_uri' => $this->img_url,
            'coins' => $this->coins,
            'type' => $this->type,
            'completed' => $this->when(auth()->user()->tasks->contains(Task::find($this->id)), true, false),
            'token' => $this->when($this->type == 1, auth()->user()->app_token, null),
        ];
    }
}
