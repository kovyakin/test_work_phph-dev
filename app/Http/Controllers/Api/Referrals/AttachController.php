<?php

namespace App\Http\Controllers\Api\Referrals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Referrals\ReferralAttachRequest;
use App\Services\Referral\ReferralService;
use Faker\Extension\ExtensionNotFound;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AttachController extends Controller
{
    /**
     * @param  \App\Services\Referral\ReferralService  $referralService
     * AttachController constructor
     */
    public function __construct(
        private readonly ReferralService $referralService,
    ) {
    }

    /**
     *
     * @param  \App\Http\Requests\Api\Referrals\ReferralAttachRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ReferralAttachRequest $request): JsonResponse
    {
        try {
            $dto = $request->getDTO();

            $referral = $this->referralService->registerReferral(
                referred: $dto->master,
                code: $dto->code,
            );

            if (!$referral) {
                throw new ExtensionNotFound('Referral not found or you con not add refer own');
            }

            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['success' => false, 'message' => $exception->getMessage(),500]);
        }
    }
}
