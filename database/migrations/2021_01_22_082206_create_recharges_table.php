<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators')->onUpdate('cascade')->onDelete('cascade');

            $table->string('mobile');

            $table->decimal('amount', 8, 2)->default(0);

            $table->timestamp('recharged_at');

            $table->enum('status', ['pending', 'success', 'failed'])->default('pending')->nullable();

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
        Schema::dropIfExists('recharges');
    }
}
