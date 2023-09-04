<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

        /**
         * Plan x Profile
         */
        Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
        Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');

        /**
         * Permission x Profile
         */
        Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
        Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');

        /**
         * Routes Permissions
         */
        Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);

        /**
         * Routes Profiles
         */
        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

        /**
         * Routes Details Plans
         */
        Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
        Route::delete('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'show'])->name('details.plan.show');
        Route::put('plans/{url}/details/{idPlan}', [DetailPlanController::class, 'update'])->name('details.plan.update');
        Route::get('plans/{url}/details/{idPlan}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
        Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

        /**
         * Routes Plans
         */
        Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
        Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
        Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
        Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');

        Route::get('admin', [PlanController::class, 'index'])->name('admin.index');
    });

Route::get('/', [SiteController::class, 'index'])->name('site.home');

Auth::routes();
