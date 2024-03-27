<?php

namespace Modules\Test\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'name' => $this->name,
            'bio' => $this->bio,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,

        ];
    }
}
