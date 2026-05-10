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
    Schema::table('students', function (Blueprint $table) {

        $table->decimal('course_fee',10,2)->default(0); // total course fee
        $table->decimal('fees_paid',10,2)->default(0); // kitni fees di
        $table->decimal('fees_pending',10,2)->default(0); // kitni baaki hai

        $table->enum('payment_status',['Pending','Partial','Paid'])->default('Pending');

    });
}
    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('students', function (Blueprint $table) {

        $table->dropColumn(['course_fee','fees_paid','fees_pending','payment_status']);

    });
}
};
