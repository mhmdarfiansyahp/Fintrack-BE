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
        Schema::create('invesments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['stock', 'mutual fund', 'bond']);
            $table->string('name', 100);
            $table->decimal('amount_invested', 12, 2);
            $table->decimal('current_value', 12, 2);
            $table->decimal('units', 12, 4);
            $table->date('purchase_date');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invesments');
    }
};
