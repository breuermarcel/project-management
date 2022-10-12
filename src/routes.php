<?php

use Breuermarcel\ProjectManagement\Http\Controllers\DashboardController;

Route::get("search", [SearchController::class, "index"])->name("search");

Route::get("/", [DashboardController::class, "index"])->name("dashboard");

Route::prefix("customers")->group(function () {

});

Route::prefix("projects")->group(function () {
    Route::prefix("tasks")->group(function () {

    });

    Route::prefix("offers")->group(function () {

    });

    Route::prefix("invoices")->group(function () {

    });
});
