<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name')->nullable();
            $table->string('doc_id')->nullable();
            $table->string('pat_name')->nullable();
            $table->string('pat_id')->nullable();
            $table->string('medication')->nullable();
            $table->string('pres_id')->nullable();
            $table->string('department')->nullable();
            $table->string('tasks')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('salary')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
