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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'first_phonetic_name' => $this->first_phonetic_name,
            'last_phonetic_name' => $this->last_phonetic_name,
            // 'use_login' => isset($this->user),
            // 'used_login' => isset($this->user),
            'company_name' => isset($this->user) ? $this->user->name : null,
            // 'email' => isset($this->user) ? $this->user->email : null,
        ];
    }
}