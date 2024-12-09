<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationDashboardController;
use App\Http\Controllers\RecapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\WhitelistController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ComitteeMiddleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware("guest")->group(function () {
    Route::get("/login", fn() => Inertia::render("login"))->name("login");
    Route::get("/auth/redirect", [AuthController::class, "redirect"])
        ->name("auth.redirect");
    Route::get("/auth/callback", [AuthController::class, "callback"])
        ->name("auth.callback");
});

Route::prefix("test")->group(function () {
    Route::get("/vote/{organization}", [VoteController::class, "organization"])
        ->name("vote.organization");
    Route::post("/ktm", [VoteController::class, "storeKtm"])
        ->name("ktm.store");
    Route::post("/verification", [VoteController::class, "storeVerification"])
        ->name("verification.store");
});

Route::middleware("auth")->group(function () {
    Route::get("/", [VoteController::class, "index"])->name("index");

    Route::get("/ktm", [VoteController::class, "ktm"])->name("ktm");
    Route::post("/ktm", [VoteController::class, "storeKtm"])
        ->name("ktm.store");

    Route::get("/verification", [VoteController::class, "verification"])
        ->name("verification");
    Route::post("/verification", [VoteController::class, "storeVerification"])
        ->name("verification.store");

    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::prefix("admin")->as("admin.")->middleware(AdminMiddleware::class)->group(function () {
        Route::get("/", [AdminDashboardController::class, "index"])
            ->name("dashboard");

        Route::resource("whitelists", WhitelistController::class);
        Route::post("/whitelists/validate", [WhitelistController::class, "validate"])
            ->name("whitelists.validate");
        Route::post("/whitelists/single", [WhitelistController::class, "storeSingle"])
            ->name("whitelists.store.single");

        Route::resource("users", UserController::class);
        Route::resource("organizations", OrganizationController::class);

        Route::resource("organizations.groups", GroupController::class);
        Route::resource(
            "organizations.groups.candidates",
            CandidateController::class
        );
    });

    Route::prefix("organizations/{organization}")->middleware(ComitteeMiddleware::class)->group(function () {
        Route::get("/", [OrganizationDashboardController::class, "dashboard"])
            ->name("organizations.dashboard");
        Route::post("/open", [OrganizationDashboardController::class, "open"])
            ->name("organizations.open");
        Route::post("/close", [OrganizationDashboardController::class, "close"])
            ->name("organizations.close");
        Route::post("/reset", [OrganizationDashboardController::class, "reset"])
            ->name("organizations.reset");

        Route::prefix("/recap")->group(function () {
            Route::get("/", [RecapController::class, "index"])
                ->name("organizations.recap");
            Route::post("/start", [RecapController::class, "start"])
                ->name("organizations.recap.start");
            Route::get("/ballots", [RecapController::class, "ballots"])
                ->name("organizations.recap.ballots");
            Route::get("/result", [RecapController::class, "result"])
                ->name("organizations.recap.result");
        });
    });

    Route::prefix("/vote/{organization}")->group(function () {
        Route::get("/", [VoteController::class, "organization"])
            ->name("vote.organization");

        Route::get("/result", [VoteController::class, "result"])
            ->name("vote.result");
        Route::post("/result", [VoteController::class, "confirmResult"])
            ->name("vote.result.confirm");

        Route::get("/{group}", [VoteController::class, "group"])
            ->name("vote.group");
        Route::post("/{group}", [VoteController::class, "storeGroup"])
            ->name("vote.group.store");
    });
});
