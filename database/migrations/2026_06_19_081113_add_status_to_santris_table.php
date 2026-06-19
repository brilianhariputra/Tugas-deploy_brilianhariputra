<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('santris', function (Blueprint \) {
            if (!Schema::hasColumn('santris', 'status')) {
                \->string('status')->default('Hadir');
            }
        });
    }

    public function down(): void
    {
        Schema::table('santris', function (Blueprint \) {
            \->dropColumn('status');
        });
    }
};
