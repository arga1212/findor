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
        Schema::table('vendors', function (Blueprint $table) {
        if (!Schema::hasColumn('vendors', 'price_range')) {
            $table->string('price_range')->nullable()->after('thumbnail');
        }
        if (!Schema::hasColumn('vendors', 'instagram')) {
            $table->string('instagram')->nullable()->after('thumbnail');
        }
        if (!Schema::hasColumn('vendors', 'tiktok')) {
            $table->string('tiktok')->nullable();
        }
        if (!Schema::hasColumn('vendors', 'facebook')) {
            $table->string('facebook')->nullable();
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            //
        });
    }
};
