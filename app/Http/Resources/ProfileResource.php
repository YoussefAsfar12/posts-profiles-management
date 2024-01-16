<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        $data= parent::toArray($request);
        // $data['image_url'] = asset('storage/' . $this->image);
        // $data['formatted_created_at'] = $this->created_at->format('Y-m-d H:i:s');
        // $data['formatted_updated_at'] = $this->updated_at->format('Y-m-d H:i:s');
        return $data;
    }
}
