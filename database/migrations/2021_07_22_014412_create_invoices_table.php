<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->text('invoice');
            $table->unsignedBigInteger('costumer_id');
            $table->string('courier')->nullable();
            $table->string('service')->nullable();
            $table->bigInteger('cost_courier')->nullable();
            $table->integer('weight')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->text('address')->nullable();
            $table->enum('status', array('pending', 'success', 'failed', 'expired'));
            $table->string('snap_token')->nullable();
            $table->bigInteger('grand_total');
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
        Schema::dropIfExists('invoices');
    }
}
