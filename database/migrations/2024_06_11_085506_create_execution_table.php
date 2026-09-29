<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('execution', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('worker_id')->nullable()->index('worker_id');
            $table->integer('no_plat')->nullable();
            $table->integer('no_spk')->nullable();
            $table->date('tanggal_antar')->nullable();
            $table->time('jam_antar')->nullable();
            $table->integer('body_meter')->nullable();
            $table->integer('stand_awal')->nullable();
            $table->integer('stand_akhir')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('execution');
    }
};
