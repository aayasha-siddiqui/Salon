<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('customer_ledgers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        $table->foreignId('bill_id')->nullable()->constrained();
        $table->string('transaction_type'); // 'bill' ya 'payment'
        $table->decimal('amount', 10, 2);
        $table->decimal('previous_balance', 10, 2);
        $table->decimal('new_balance', 10, 2);
        $table->string('payment_method')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_ledgers');
    }
};
