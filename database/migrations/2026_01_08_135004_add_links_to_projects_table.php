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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('type_id')->after('id')->default(1)->constrained();
            $table->text('overview')->after('title');
            $table->string('repo_link')->after('overview');
            $table->string('view_link')->after('repo_link');
            $table->dropColumn('image');
            $table->string('image')->after('view_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn(['type_id', 'overview', 'repo_link', 'view_link', 'image']);
            $table->string('image');
        });
    }
};
