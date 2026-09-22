<?php

declare(strict_types=1);

namespace App\Services\Referral;

use Illuminate\Http\Resources\Json\ResourceCollection;

interface GetReferrals
{
    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function handle(int $id): ResourceCollection;
}