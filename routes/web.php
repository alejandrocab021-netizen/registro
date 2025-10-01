<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

Volt::route('/detentions/create', 'detentions.create')->name('detentions.create');
Volt::route('/detentions/{nrd}/update', 'detentions.update')->name('detentions.update');
