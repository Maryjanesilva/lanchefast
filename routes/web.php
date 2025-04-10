<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function(){
    Route::get('/',\App\Livewire\Clientes\Index::class)->name('clientes.index');
    Route::get('/create',\App\Livewire\Clientes\Create::class)->name('clientes.create');
    Route::get('/{cliente}',\App\Livewire\Clientes\Show::class)->name('clientes.show');
    Route::get('/{cliente}/edit',\App\Livewire\Clientes\Edit::class)->name('clientes.edit');
    

});
