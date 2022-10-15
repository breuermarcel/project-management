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
        Schema::create("bm_tasks", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description")->nullable();
            $table->integer("status")->default(0);
            $table->timestamp("deadline")->nullable();
            $table->double("expenditure")->nullable();

            $table->unsignedBigInteger("project_id");
            $table->foreign("project_id")->references("id")->on("bm_projects");

            $table->unsignedBigInteger("created_user_id");
            $table->foreign("created_user_id")->references("id")->on("users");

            $table->unsignedBigInteger("signed_user_id");
            $table->foreign("signed_user_id")->references("id")->on("users");

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
        Schema::dropIfExists("bm_tasks");
    }
};
