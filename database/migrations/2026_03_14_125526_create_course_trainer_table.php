// database/migrations/xxxx_xx_xx_create_course_trainer_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('course_trainer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('trainer_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Unique combination to prevent duplicates
            $table->unique(['course_id', 'trainer_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_trainer');
    }
}; 