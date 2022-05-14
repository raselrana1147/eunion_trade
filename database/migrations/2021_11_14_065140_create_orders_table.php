<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id')->nullable();
           $table->unsignedBigInteger('payment_id')->nullable();
           $table->unsignedBigInteger('coupon_id')->nullable();
           $table->integer('quantity');
           $table->float('amount', 8, 2);
           $table->float('tax', 4, 2);
           $table->float('sub_total', 8, 2);
           $table->float('shipping_charge', 8, 2);
           $table->float('grand_total',11,2);
           $table->float('total_item_total',11,2);
           $table->string('order_number');
           $table->string('transaction_number')->nullable();
           $table->string('latitude')->nullable();
           $table->string('longitude')->nullable();
           $table->mediumText('order_note')->nullable();
           $table->tinyInteger('cash_on_delivery')->nullable();
           $table->enum('status', ['pending', 'processing','confirmed','delivered','declined'])->default('pending');
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
           $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
