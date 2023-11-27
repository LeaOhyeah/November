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
        Schema::table('staff_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });

        Schema::table('project_images', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::table('comment_images', function (Blueprint $table) {
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });

        Schema::table('project_details', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        Schema::table('project_detail_images', function (Blueprint $table) {
            $table->foreign('project_detail_id')->references('id')->on('project_details')->onDelete('cascade');
        });

        Schema::table('comment_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_detail_id')->references('id')->on('project_details')->onDelete('cascade');
        });

        Schema::table('comment_detail_images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('comment_detail_id')->references('id')->on('comment_details')->onDelete('cascade');
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
