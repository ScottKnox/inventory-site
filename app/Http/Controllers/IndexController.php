<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(): View {
        DB::insert('insert into products (id, name, description, count, price) values (?, ?, ?, ?, ?)', [3, 'Tonka Truck', 'description', 1, 10000.00]);
        $products = DB::select('select * from products where id = ?', [1]);

        return view('welcome', [
            'product' => $products[0]
        ]);
    }
}
