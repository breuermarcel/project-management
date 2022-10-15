<?php

use Breuermarcel\ProjectManagement\Http\Controllers\CustomerController;
use Breuermarcel\ProjectManagement\Http\Controllers\DashboardController;
use Breuermarcel\ProjectManagement\Http\Controllers\ProjectController;
use Breuermarcel\ProjectManagement\Http\Controllers\TaskController;

Route::get("search", [SearchController::class, "index"])->name("search");

Route::get("/", [DashboardController::class, "index"])->name("dashboard");

Route::prefix("profile")->group(function () {

});

Route::prefix("customers")->group(function () {
    Route::get("/", [CustomerController::class, "index"])->name("customers.index");
    Route::get("/create", [CustomerController::class, "create"])->name("customers.create");
    Route::post("/store", [CustomerController::class, "store"])->name("customers.store");
    Route::get("/{customer}/edit", [CustomerController::class, "edit"])->name("customers.edit");
    Route::patch("/{customer}/update", [CustomerController::class, "update"])->name("customers.update");
    Route::delete("/{customer}/destroy", [CustomerController::class, "destroy"])->name("customers.destroy");
});

Route::prefix("projects")->group(function () {
    Route::get("/", [ProjectController::class, "index"])->name("projects.index");
    Route::get("/create", [ProjectController::class, "create"])->name("projects.create");
    Route::post("/store", [ProjectController::class, "store"])->name("projects.store");
    Route::get("/{project}", [ProjectController::class, "show"])->name("projects.show");
    Route::get("/{project}/edit", [ProjectController::class, "edit"])->name("projects.edit");
    Route::patch("/{project}/update", [ProjectController::class, "update"])->name("projects.update");
    Route::delete("/{project}/destroy", [ProjectController::class, "destroy"])->name("projects.destroy");

    Route::prefix("{project}/tasks")->group(function () {
        Route::get("/create", [TaskController::class, "create"])->name("tasks.create");
        Route::post("/store", [TaskController::class, "store"])->name("tasks.store");
    });



    Route::prefix("{project}/offers")->group(function () {

    });

    Route::prefix("{project}/invoices")->group(function () {

    });
});
