<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = Favourite::all();

        return view('favourite.index', compact('favourites'));
    }

    public function addToFavourite(Request $request)
    {
        $charger_id = $request->charger_id;
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user->addToFavourites($charger_id)) {
            return response()->json(['message' => 'Зарядная станция добавлена в избранные']);
        }
        else {
            $user->removeFromFavourites($charger_id);
            return response()->json(['message' => "Зарядная станция $charger_id была удалена из избранных"]);
        }
    }
}
