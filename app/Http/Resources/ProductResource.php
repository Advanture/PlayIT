<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'name' => $this->when(auth()->user()->rank->id < $this->rank->id,"???", $this->name),
            'in_stock' => $this->in_stock,
            'img_url' => $this->when(auth()->user()->rank->id < $this->rank->id,"???", $this->img_url),
            'required_rank' => $this->when(auth()->user()->rank->id < $this->rank->id, ['rank' => $this->rank->id, 'name' => $this->rank->name,'xp' => $this->rank->required_coins], 0),
        ];
    }
}
