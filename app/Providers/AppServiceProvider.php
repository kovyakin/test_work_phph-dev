<?php

namespace App\Providers;

use App\Models\Payment;
use App\Observers\PaymentObserver;
use App\Services\Referral\GetEarnings;
use App\Services\Referral\GetEarningsService;
use App\Services\Referral\GetReferrals;
use App\Services\Referral\GetReferralsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(GetReferrals::class, GetReferralsService::class);
        $this->app->bind(GetEarnings::class, GetEarningsService::class);
    }

    public function boot(): void
    {
        Payment::observe(PaymentObserver::class);
    }
}
