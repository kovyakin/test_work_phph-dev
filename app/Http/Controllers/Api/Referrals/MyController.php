<?php

namespace App\Http\Controllers\Api\Referrals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Referrals\GetMasterRequest;
use App\Services\Referral\GetReferrals;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class MyController extends Controller
{

    public function __construct(
        private readonly GetReferrals $getReferrals,
    ) {
    }

    public function __invoke(GetMasterRequest $request): JsonResponse
    {
        try {
            $id = $request->getMasterId();
            $data = $this->getReferrals->handle(id: $id)->resolve();
            return response()->json($data);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }
}
