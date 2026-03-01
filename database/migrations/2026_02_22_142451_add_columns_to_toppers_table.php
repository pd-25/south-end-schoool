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
        Schema::table('toppers', function (Blueprint $table) {
            if (!Schema::hasColumn('toppers', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('toppers', 'image')) {
                $table->string('image')->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('toppers', function (Blueprint $table) {
            $table->dropColumn(['name', 'image']);
        });
    }
};
