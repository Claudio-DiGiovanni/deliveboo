<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'success' => true,
            'results' => $users,
        ]);

    }
    public function show(Dish $dish)
    {
        $dish = Dish::where('id', $dish->id);
        return response()->json([
            'success' => true,
            'dish' => $dish,
        ]);
    }
    public function getDishesByUser($userId)
    {
        $dishes = Dish::where('user_id', $userId)->get();

        return response()->json($dishes);
    }

}
