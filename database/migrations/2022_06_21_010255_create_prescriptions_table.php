<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('medication')->nullable();
            $table->string('amount')->nullable();
            $table->string('refills')->nullable();
            $table->string('appoint_id')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('paid')->nullable()->default('no');

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
        Schema::dropIfExists('prescriptions');
    }
}
