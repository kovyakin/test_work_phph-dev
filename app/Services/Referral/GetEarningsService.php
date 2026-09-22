<?php

declare(strict_types=1);

namespace App\Services\Referral;

use App\Models\Master;
use App\Models\ReferralEarning;
class GetEarningsService implements GetEarnings
{


    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function handle(int $id): array
    {
        $master = Master::query()->findOrFail($id);

        $referralEarnings = $master->referralEarnings;


        $data['total'] = $referralEarnings->sum('amount');
        $data['count_referrals'] = count($referralEarnings);
        $data['pending'] = $referralEarnings->where('status', ReferralEarning::STATUS_PENDING)->sum('amount');
        $data['paid'] = $referralEarnings->where('status', ReferralEarning::STATUS_PAID)->sum('amount');

        return $data;
    }
}