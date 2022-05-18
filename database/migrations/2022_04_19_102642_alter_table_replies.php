<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            // $table->dropForeign(['user_id', 'post_id', 'comment_id']);

            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // $table->foreignId('comment_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
