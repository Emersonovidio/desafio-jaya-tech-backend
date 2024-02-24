<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->float('transaction_amount');
            $table->integer('installments')->nullable();
            $table->string('token')->nullable();
            $table->string('payment_method_id')->nullable();
            $table->string('payer_entity_type')->default('individual');
            $table->string('payer_type')->default('customer');
            $table->string('payer_email');
            $table->string('payer_identification_type')->nullable();
            $table->string('payer_identification_number')->nullable();
            $table->string('notification_url')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
