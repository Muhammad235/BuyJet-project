<?php

use App\Enums\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gift_card_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trx_hash')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('gift_card_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->double('amount');
            $table->boolean('with_receipt');
            $table->string('is_physical_card')->unique();
            $table->enum('status', [Status::PENDIDNG, Status::SUCCESS, Status::FAILED])->default(Status::PENDIDNG);
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_card_transactions');
    }
};
