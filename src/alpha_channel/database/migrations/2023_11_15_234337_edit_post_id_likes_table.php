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
        Schema::table('likes', function (Blueprint $table) {
            $table->renameColumn('comment_id', 'post_id');
            $table->string('ip_address_x_forwarded')->comment('IPアドレス')->after('ip_address')->nullable();
            $table->unsignedTinyInteger('status')->comment('2(like) or 1(unlike)')->after('ip_address_x_forwarded');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->renameColumn('post_id', 'comment_id');
            $table->dropColumn('ip_address_x_forwarded');
            $table->dropColumn('status');
        });
    }
};
