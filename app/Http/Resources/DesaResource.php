<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'district_code' => $this->district_code,
            'name' => $this->name,
            'districtName' => $this->district_name,
            'cityName' => $this->city_name,
            'provinceName' => $this->province_name,
        ];
    }
}
