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
        Schema::table('bills', function (Blueprint $table) {

            $table->decimal('subtotal',10,2)->default(0)->after('bill_date');

            $table->decimal('discount',10,2)->default(0)->after('subtotal');

            $table->string('payment_method')->nullable()->after('discount');

        });
    }

    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {

            $table->dropColumn([
                'subtotal',
                'discount',
                'payment_method'
            ]);

        });
    }
};
