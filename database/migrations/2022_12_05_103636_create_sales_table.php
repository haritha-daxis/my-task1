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


        Schema::create('sales', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->integer('sales_id')->unsigned();
            $table->string('invoice_number');
            $table->string('sales_item');
            $table->integer('sales_qty');
            // $table->foreign('state_id')
            // ->references('id')->on('states')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
            ->references('id')->on('customer');
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
        Schema::dropIfExists('sales');
    }
};
