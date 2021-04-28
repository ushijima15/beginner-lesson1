<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerForShow extends JsonResource
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
            // 'code' => $this->code,
            'code' => $this ->code,
            'name' => $this ->name,
            'postal_code'=> $this ->postal_code,
            'address'=> $this ->address,
            'tel' => $this ->tel,
            'fax' => $this->fax,
            'closing_day'=> $this ->closing_day,
            // 'use_login' => isset($this->user),
            // 'used_login' => isset($this->user),
            //'company_name' => isset($this->user) ? $this->user->name : null,
            // 'email' => isset($this->user) ? $this->user->email : null,
        ];
    }
}