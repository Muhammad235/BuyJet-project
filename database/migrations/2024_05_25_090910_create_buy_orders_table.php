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
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->id();
            $table->string('trx_hash');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cryptocurrency_id')->constrained();
            $table->string('asset_network');
            $table->double('amount');
            $table->string('payment_receipt')->nullable();
            $table->string('wallet_address');
            $table->string('note')->nullable();
            $table->enum('payment_status', [Status::PENDIDNG, Status::RECEIVED, Status::COMPLETED])->default(Status::PENDIDNG);
            $table->enum('status', [Status::PENDIDNG, Status::COMPLETED])->default(Status::PENDIDNG);
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_orders');
    }
};
