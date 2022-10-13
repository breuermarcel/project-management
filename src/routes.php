<?php

use Breuermarcel\ProjectManagement\Http\Controllers\CustomerController;
use Breuermarcel\ProjectManagement\Http\Controllers\DashboardController;

Route::get("search", [SearchController::class, "index"])->name("search");

Route::get("/", [DashboardController::class, "index"])->name("dashboard");

Route::prefix("profile")->group(function () {

});

Route::prefix("customers")->group(function () {
    Route::get("/", [CustomerController::class, "index"])->name("customers.index");
    Route::get("/create", [CustomerController::class, "create"])->name("customers.create");
    Route::post("/store", [CustomerController::class, "store"])->name("customers.store");
});

Route::prefix("projects")->group(function () {
    Route::prefix("tasks")->group(function () {

    });

    Route::prefix("offers")->group(function () {

    });

    Route::prefix("invoices")->group(function () {

    });
});
