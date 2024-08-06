<?php

use App\Enums\Status;
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
        Schema::create('gift_card_orders', function (Blueprint $table) {
            $table->id();
            $table->string('trx_hash')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('gift_card_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->decimal('amount', 12, 4);
            $table->boolean('with_receipt');
            $table->boolean('is_physical_card');
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
        Schema::dropIfExists('gift_card_orders');
    }
};
