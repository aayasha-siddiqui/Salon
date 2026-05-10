<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('staff_salaries', function (Blueprint $table) {

            $table->date('from_date')->nullable()->after('staff_id');
            $table->date('to_date')->nullable()->after('from_date');

        });
    }

    public function down(): void
    {
        Schema::table('staff_salaries', function (Blueprint $table) {

            $table->dropColumn('from_date');
            $table->dropColumn('to_date');

        });
    }
};