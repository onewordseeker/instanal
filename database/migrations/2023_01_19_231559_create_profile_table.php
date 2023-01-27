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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->integer('followers');
            $table->integer('followees');
            $table->string('biography');
            $table->string('is_verified');
            $table->string('profile_pic_url');
            $table->string('followed_by_viewer');
            $table->string('requested_by_viewer');
            $table->string('follows_viewer');
            $table->string('blocked_by_viewer');
            $table->string('is_bussines');
            $table->string('external_url');
            $table->integer('igtv_count');
            $table->integer('post_count');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
};
