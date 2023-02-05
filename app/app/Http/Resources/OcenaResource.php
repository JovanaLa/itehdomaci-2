<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\FilmResource;
use App\Http\Resources\BioskopResource;
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
            'korisnik' => new UserResource($this->resource->userkey),
            'film' => new FilmResource($this->resource->filmkey),
            'bioskop' => new BioskopResource($this->resource->bioskopkey),
            'ocena' => $this->resource->ocena,
            'poruka' => $this->resource->poruka,

        ];
    }
}