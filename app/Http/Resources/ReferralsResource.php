<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReferralsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'name'=>$this->referredMaster->name,
            'created_at'=>$this->created_at->format('d-m-Y H:i:s'),
            'rewarded'=>$this->status == 'rewarded',
            'amount'=>$this->referredMaster->payments->sum('amount'),
        ];
    }
}
