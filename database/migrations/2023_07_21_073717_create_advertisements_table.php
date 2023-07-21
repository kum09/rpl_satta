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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('advertisement_title')->nullable();
            $table->string('advertisement_desc')->nullable();
            $table->Integer('advertisement_status')->nullable()->comment('0 = Inactive, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
