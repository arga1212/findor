<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'name')) {
                $table->dropColumn('name');
            }

            $table->foreignId('user_id')->after('vendor_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('name');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
