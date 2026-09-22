<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('referral_earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Master::class, 'referrer_master_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Master::class, 'referred_master_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Referral::class)
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Payment::class)
                ->constrained()
                ->onDelete('cascade');
            $table->integer('payment_amount')->nullable()->default(0);
            $table->integer('amount')->nullable()->default(0);
            $table->integer('percent')->nullable()->default(0);
            $table->string('status')->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_earnings');
    }
};
