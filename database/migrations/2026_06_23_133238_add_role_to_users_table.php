<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // role: 'user' | 'admin'
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
            $table->string('avatar')->nullable()->after('role');
            $table->string('level')->default('A1')->after('avatar');  // A1-C2
            $table->integer('xp')->default(0)->after('level');
            $table->integer('streak')->default(0)->after('xp');
            $table->date('last_active')->nullable()->after('streak');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'avatar', 'level', 'xp', 'streak', 'last_active']);
        });
    }
};
