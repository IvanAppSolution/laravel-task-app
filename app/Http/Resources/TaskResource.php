<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
       return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'update_at' => $this->update_at
        ];
    }
}
