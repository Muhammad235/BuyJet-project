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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id');
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('message');
            $table->string('attachment')->nullable();
            // $table->enum('priority', [Status::LOW, Status::MEDIUM, Status::HIGH])->default(Status::MEDIUM);
            $table->enum('status', [Status::OPEN, Status::CLOSED])->default(Status::OPEN);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
