<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('vendors', function (Blueprint $table) {
        $table->softDeletes(); // ini akan menambahkan kolom deleted_at
    });
}

public function down(): void
{
    Schema::table('vendors', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

};
