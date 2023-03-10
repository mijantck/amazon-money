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
        Schema::table('visit_web_site_links', function (Blueprint $table) {
            //
            $table->string("details", 500)->nullable();
            $table->string("type", 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_web_site_links', function (Blueprint $table) {
            //
            $table->dropColumn("details");
            $table->dropColumn("type");
        });
    }
};
