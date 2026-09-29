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
        Schema::table('post_orders', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'post_orders_ibfk_1')->references(['id'])->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_orders', function (Blueprint $table) {
            $table->dropForeign('post_orders_ibfk_1');
        });
    }
};
