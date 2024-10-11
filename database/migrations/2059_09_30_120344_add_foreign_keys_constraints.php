<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jiris', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jiris', function (Blueprint $table) {
            $table->dropForeign('user_id')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('user_id')->onDelete('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('user_id')->onDelete('cascade');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropforeign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->dropforeign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->dropforeign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->dropforeign('jiri_id')->references('id')->on('jiris')->onDelete('cascade');
        });

    }
};
