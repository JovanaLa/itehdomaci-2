<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OcenaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'ocena';
    public function toArray($request)
    {
        return [
            'datum_i_vreme' => $this->resource->datum_i_vreme,
            'korisnik' => $this->resource->korisnik,
            'film' => $this->resource->film,
            'ocena' => $this->resource->ocena,
            'poruka' => $this->resource->poruka,

        ];
    }
}