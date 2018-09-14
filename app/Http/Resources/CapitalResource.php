<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CapitalResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'created_at' => $this->created_at
        ];
    }
}
