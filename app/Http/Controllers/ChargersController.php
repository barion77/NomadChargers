<?php

namespace App\Http\Controllers;

use App\Models\Charger;
use Illuminate\Http\Request;

class ChargersController extends Controller
{
    public function index()
    {
        $chargers = Charger::all();

        return view('charger.index', compact('chargers'));
    }
}
