<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bm_customers", function (Blueprint $table) {
            $table->id();
            $table->string("salutation")->nullable();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->string("company_name")->nullable();
            $table->string("tax_number")->nullable();
            $table->string("street")->nullable();
            $table->string("location")->nullable();
            $table->string("country")->nullable();
            $table->string("mobile_number")->nullable();
            $table->string("email")->nullable();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("bm_customers");
    }
};
