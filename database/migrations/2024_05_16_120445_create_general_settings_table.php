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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->decimal('buy_rate', 8, 4)->default(0);
            $table->decimal('sell_rate', 8, 4)->default(0);
            $table->decimal('with_receipt_charge', 8, 2)->default(0);
            $table->decimal('with_no_receipt_charge', 8, 2)->default(0);
            $table->decimal('physical_card_charge', 8, 2)->default(0);
            $table->decimal('e_code_card_charge', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
