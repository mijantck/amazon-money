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
        Schema::create('pyment_requsts', function (Blueprint $table) {
            $table->id();
            $table->string("payment_methode_name", 500)->nullable();
            $table->string("user_id", 50)->nullable();
            $table->string("account_id", 50)->nullable();
            $table->bigInteger("amount")->default(0);
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
        Schema::dropIfExists('pyment_requsts');
    }
};
