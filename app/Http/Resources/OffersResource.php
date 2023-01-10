<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OffersResource extends JsonResource
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
            'title' => $this->append_title,
            'slogan' => $this->append_slogan,
            'content' => $this->append_content,
            'main_photo' => $this->photo,
            'qrcode' => $this->qrcode,
            'created_at ' => $this->created_at ,
        ];
    }
}
