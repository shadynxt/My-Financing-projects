<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('delete:twoDaySoon', function () {
    $this->comment(DeleteProject::quote());
})->describe('delete project when expired');


Artisan::command('project:oneDaySoon', function () {
    $this->comment(OneDaySoon::quote());
})->describe('delete project when expired');


Artisan::command('project:delete', function () {
    $this->comment(DeleteIfExpired::quote());
})->describe('delete project when expired');
