<?php

declare(strict_types=1);

namespace App\Services\Referral;

use App\Http\Resources\ReferralsResource;
use App\Models\Master;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetReferralsService implements GetReferrals
{


    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function handle(int $id): ResourceCollection
    {
        $master = Master::query()->findOrFail($id);

        return ReferralsResource::collection($master->referrals);
    }
}