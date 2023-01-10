<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'content' => $this->append_content,
            'main_photo' => $this->photo,
            'cat_id ' => $this->cat_id ,
            'created_at ' => $this->created_at ,
            'photo_gallery ' => $this->postgallery ,
        ];
    }
}
