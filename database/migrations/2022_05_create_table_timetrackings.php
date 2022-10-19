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
        Schema::create("bm_timetrackings", function (Blueprint $table) {
            $table->id();
            $table->timestamp("started_at")->useCurrent();
            $table->timestamp("ended_at")->nullable();

            $table->unsignedBigInteger("task_id");
            $table->foreign("task_id")->references("id")->on("bm_tasks");

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("bm_timetrackings");
    }
};
