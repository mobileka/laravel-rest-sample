<?php

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('apartments', 'Apartments\Controllers\ApartmentController', ['except' => ['create', 'edit']]);
    Route::resource('apartments.prices', 'Apartments\Controllers\PriceController', ['except' => ['create', 'edit']]);
});
