<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('live_infos', function (Blueprint $table) {
        $table->id();
        $table->string('title');         // ライブタイトル
        $table->string('location');      // 開催場所
        $table->date('date');            // 日付
        $table->time('start_time');      // 開演時間
        $table->text('description')->nullable(); // 説明（任意）
        $table->timestamps();            // created_at / updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_infos');
    }
};
