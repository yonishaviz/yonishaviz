<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderrs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->unsigned()->nullabe();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('billing_email')->nullabe();
            $table->string('billing_name')->nullabe();
            $table->integer('billing_discount')->default(0);
            $table->integer('billing_discount_conde')->nullabe();
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->integer('billing_total');
            $table->boolean('shipped')->default(false);
            $table->string('erorr')->nullabe();
            
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
        Schema::dropIfExists('orderrs');
    }
}
