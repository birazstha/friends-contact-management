<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'email'=>$this->email,
            'contact_number'=>$this->contact_number,
            'profile_picture'=>$this->profile_picture,

        ];
    }
}
