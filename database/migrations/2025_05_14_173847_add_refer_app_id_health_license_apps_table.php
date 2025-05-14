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
        Schema::table('health_license_apps', function (Blueprint $table) {
            //
            $table->foreignId('refer_app_id')->nullable()->constrained('health_license_apps')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('health_license_apps', function (Blueprint $table) {
            //
            $table->dropForeign(['refer_app_id']);
            $table->dropColumn('refer_app_id');
        });
    }
};
