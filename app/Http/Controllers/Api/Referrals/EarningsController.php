<?php

namespace App\Http\Controllers\Api\Referrals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Referrals\GetMasterRequest;
use App\Services\Referral\GetEarnings;
use Illuminate\Support\Facades\Log;

class EarningsController extends Controller
{

    public function __construct(
        private readonly GetEarnings $getEarnings
    )
    {
    }

    public function __invoke(GetMasterRequest $request)
    {
        try{
            $id = $request->getMasterId();
            $data =  $this->getEarnings->handle(id: $id);
            return response()->json($data);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return response()->json(['success' => false, 'message' => $exception->getMessage()]);
        }


    }
}
