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
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();
            $table->integer('comment_id')->comment('コメントID');
            $table->string('ip_address')->comment('IPアドレス');
            $table->string('ip_address_x_forwarded')->comment('IPアドレス')->nullable();
            $table->unsignedTinyInteger('status')->comment('2(like) or 1(unlike)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
