<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FullName');
            $table->integer('IdentityNo');
            $table->integer('MobilePhone');
            $table->string('Email');
            $table->integer('AccountNumber');
            $table->integer('default');
            $table->integer('InterestRate');
            $table->date('OriginationDate');
            $table->date('DueDate');
            $table->date('HandOverDate');
            $table->integer('HandOverAmount');
            $table->integer('LateFee');
            $table->string('Client');
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
        Schema::dropIfExists('debtors');
    }
}
