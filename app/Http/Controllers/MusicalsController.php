<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MusicalsController
{
    public function index(): View
    {
        $musicals = DB::table('musicals')->get();

        return view('musicals', ['musicals' => $musicals]);
    }
}
