<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use App\User;
use App\Wd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WdController extends Controller
{

    public function wd()
    {
        $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            });

        $revenue = $transactions->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        $customer = User::count();

        $wd = Wd::where('users_id', Auth::user()->id);

        return view('pages.dashboard-wd',[
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $revenue,
            'customer' => $customer,
            'wd' => $wd,

        ]);
    }

    public function store(WdRequest $request)
    {
        $data = $request->all();
        Wd::create($data);

        return redirect()->route('dashboard-wd');

    }

}
