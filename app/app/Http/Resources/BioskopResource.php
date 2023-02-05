<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BioskopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'bioskop';
    public function toArray($request)
    {
        return [
            'naziv' => $this->resource->naziv,
            'kontakt' => $this->resource->kontakt,
            'lokacija' => $this->resource->lokacija,
            'email' => $this->resource->email,
        ];
    }
}