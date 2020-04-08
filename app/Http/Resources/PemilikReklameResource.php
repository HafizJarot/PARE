<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemilikReklameResource extends JsonResource
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
          'id'  => $this->id,
            'no_izin'  => $this->no_izin,
            'nama_perusahaan'  => $this->nama_perusahaan,
            'no_telp'  => $this->no_telp,
            'alamat'  => $this->alamat,
            'email'  => $this->email,
            'password'  => $this->password,





        ];
    }
}
