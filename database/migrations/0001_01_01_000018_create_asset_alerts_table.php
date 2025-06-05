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
        Schema::create('asset_alerts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('asset_id')->constrained('assets');
            $table->string('message');
            $table->timestamp('alert_at');
            $table->integer('recurrence_interval_days')->nullable();
            $table->integer('alert_all_users')->default(1);
        });

        Schema::create('asset_alert_dismissals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('asset_alert_id')->constrained('asset_alerts');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_alerts');
        Schema::dropIfExists('asset_alert_dismissals');
    }
};
