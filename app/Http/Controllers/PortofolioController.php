<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class PortofolioController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return view('pages.talent', [
            'users' => $users
        ]);
    }

    public function detail(Request $request, $store)
    {
        $users = User::where('store_name', $store)->firstOrFail();
        $products = Product::where('users_id', $users->id)->paginate($request->input('limit', 12));
        return view('pages.detail-talent', [
            'users' => $users,
            'products' => $products

        ]);
    }

}
