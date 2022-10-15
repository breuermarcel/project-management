<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bm_files", function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->unsignedBigInteger("project_id");
            $table->foreign("project_id")->references("id")->on("bm_projects");

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("bm_files");
    }
};
