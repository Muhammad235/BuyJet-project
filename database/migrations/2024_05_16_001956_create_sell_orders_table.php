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
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->id();
            $table->string('trx_hash')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cryptocurrency_id')->constrained();
            $table->string('asset_network');
            $table->decimal('amount', 12, 4);
            $table->string('payment_receipt')->nullable();;
            $table->string('note')->nullable();
            $table->enum('status', [Status::PENDIDNG, Status::SUCCESS, Status::PROCESSING, Status::FAILED])->default(Status::PENDIDNG);
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_orders');
    }
};
