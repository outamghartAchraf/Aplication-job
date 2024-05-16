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
        Schema::create('listeng_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listeng_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('shortlisted')->default(false);
            $table->timestamps();


            $table->foreign('listeng_id')->references('id')->on('listengs')
            ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('listengs')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listeng_user');
    }
};
