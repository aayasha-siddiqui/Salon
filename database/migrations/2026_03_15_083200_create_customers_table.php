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
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('phone')->unique();
        $table->string('email')->nullable();
        $table->text('address')->nullable();
        $table->decimal('total_outstanding', 10, 2)->default(0); // Total baki amount
        $table->decimal('total_paid', 10, 2)->default(0); // Total kitna diya
        $table->decimal('total_billed', 10, 2)->default(0); // Total bill amount
        $table->integer('total_visits')->default(0); // Kitni baar aaya
        $table->date('last_visit')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
