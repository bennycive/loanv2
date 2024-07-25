<?php


use Illuminate\Support\Facades\Route;
use Laramin\Utility\Controller\UtilityController;
use Laramin\Utility\VugiChugi;

// Route group for UtilityController routes
Route::middleware(VugiChugi::gtc())->controller(UtilityController::class)->group(function(){
    // The following routes are related to activation, remove them
    // Route::get(VugiChugi::acRouter(),'laraminStart')->name(VugiChugi::acRouter());
    // Route::post(VugiChugi::acRouterSbm(),'laraminSubmit')->name(VugiChugi::acRouterSbm());
});
