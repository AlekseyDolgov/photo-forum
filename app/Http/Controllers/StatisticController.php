<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index($user_id)
    {
        $statistics = DB::table('statistics')
            ->where('profile_id', $user_id)
            ->first();
        return view('statistics.statistics', compact('statistics'));
    }
}
