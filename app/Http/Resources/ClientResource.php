<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

    public function toArray($request){
        return [
            'id' => $this->id,
            'avatar' => $this->avatar ? Voyager::image($this->avatar) : '',
            'username' => $this->username,
            'phone' => $this->phone ?? '' ,
        ];
    }

}
