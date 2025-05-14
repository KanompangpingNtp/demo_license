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
        Schema::table('food_storage_informations', function (Blueprint $table) {
            $table->foreignId('refer_information_id')->nullable()->constrained('food_storage_informations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_storage_informations', function (Blueprint $table) {
            $table->dropForeign(['refer_information_id']);
            $table->dropColumn('refer_information_id');
        });
    }
};
