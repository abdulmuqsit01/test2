<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function runCronJob()
    {
        Artisan::call('command:mail-cronjob');

        $output = Artisan::output();

        return response()->json(['output' => $output]);
    }
}
