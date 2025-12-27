<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
        
    Route::view('database/provinces', 'pages.reference_tables.provinces')
        ->middleware(['auth'])
        ->name('database.provinces');
    Route::view('database/cities', 'pages.database.cities')
        ->middleware(['auth'])
        ->name('database.cities');
    Route::view('database/barangays', 'pages.database.barangays')
        ->middleware(['auth'])
        ->name('database.barangays');
    Route::view('database', 'database')
        ->middleware(['auth'])
        ->name('database');
    Route::view('database/degree_fields', 'pages.database.degree_fields')
        ->middleware(['auth'])
        ->name('database.degree_fields');
    Route::view('database/degree_levels', 'pages.database.degree_levels')
        ->middleware(['auth'])
        ->name('database.degree_levels');
    Route::view('database/degree_programs', 'pages.database.degree_programs')
        ->middleware(['auth'])
        ->name('database.degree_programs');
    Route::view('database/degree_types', 'pages.database.degree_types')
        ->middleware(['auth'])
        ->name('database.degree_types');
    Route::view('database/universities', 'pages.database.universities')
        ->middleware(['auth'])
        ->name('database.universities');

    // Reference exports (CSV / XLSX)
    Route::get('references/export', [\App\Http\Controllers\ReferenceExportController::class, 'export'])
        ->middleware(['auth'])
        ->name('references.export');
});
