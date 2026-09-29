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
        Schema::create('post_orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->nullable()->index('customer_id');
            $table->string('no_blangko')->nullable();
            $table->date('tanggal_pesan')->nullable();
            $table->time('jam_pesan')->nullable();
            $table->integer('jumlah_tangki')->nullable();
            $table->integer('kubikasi')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('post_orders');
    }
};
