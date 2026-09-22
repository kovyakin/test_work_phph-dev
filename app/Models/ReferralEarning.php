<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ReferralEarning extends Model
{
    use HasFactory;

    protected $table='referral_earnings';
    public const STATUS_PENDING = 'pending';
    public const STATUS_PAID = 'paid';

    /**
     * @var string[]
     */
    protected $fillable = [
        'referrer_master_id',
        'referred_master_id',
        'referral_id',
        'payment_id',
        'payment_amount',
        'amount',
        'percent',
        'status',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'payment_amount' => 'integer',
        'amount' => 'integer',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrerMaster(): BelongsTo
    {
        return $this->belongsTo(Master::class, 'referrer_master_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referredMaster(): BelongsTo
    {
        return $this->belongsTo(Master::class, 'referred_master_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referral(): BelongsTo
    {
        return $this->belongsTo(Referral::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
