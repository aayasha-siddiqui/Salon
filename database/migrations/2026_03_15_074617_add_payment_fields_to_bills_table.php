<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {

         
            $table->decimal('paid_amount',10,2)->default(0)->after('total_amount');
            $table->decimal('remaining_amount',10,2)->default(0)->after('paid_amount');

            $table->text('notes')->nullable()->after('payment_status');

            $table->unsignedBigInteger('created_by')->nullable()->after('notes');

        });
    }

    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {

            $table->dropColumn([
              
                'paid_amount',
                'remaining_amount',
                'notes',
                'created_by'
            ]);

        });
    }
};