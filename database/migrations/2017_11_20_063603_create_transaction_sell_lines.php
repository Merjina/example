<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_sell_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->integer('variation_id')->unsigned();
            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
            $table->decimal('quantity', 22, 4)->default(0);
            $table->decimal('purch_price', 22, 4)->default(0);
            $table->decimal('unit_price', 22, 4)->comment('Sell price excluding tax')->nullable();
            $table->decimal('unit_price_inc_tax', 22, 4)->comment('Sell price including tax')->nullable();
            $table->decimal('item_tax', 22, 4)->comment('Tax for one quantity');
            $table->integer('r_d_sph')->unsigned()->nullable();
            $table->integer('r_d_cyl')->nullable();
            $table->integer('r_d_axi')->nullable();
            $table->integer('r_re_cyl')->nullable();
            $table->integer('r_re_axi')->nullable();
            $table->integer('l_d_sph')->nullable();
            $table->integer('l_d_cyl')->nullable();
            $table->integer('l_d_axi')->nullable();
            $table->integer('l_re_cyl')->nullable();
            $table->integer('l_re_axi')->nullable();
            $table->integer('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('tax_rates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_sell_lines');
    }
};