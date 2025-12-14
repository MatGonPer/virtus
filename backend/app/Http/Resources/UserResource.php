<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    public function toArray(Request $request): array {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "joined_at" => $this->created_at?->timezone("America/Sao_Paulo")->format("Y-m-d H:i:s"),
        ];
    }
}
