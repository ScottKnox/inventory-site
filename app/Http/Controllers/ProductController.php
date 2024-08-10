<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Request $request) {
        $name = $request->input('name');
        $description = $request->input('description');
        $count = $request->input('count');
        $price = $request->input('price');

        DB::table('products')->insert([
            'name' => $name,
            'description' => $description,
            'count' => $count,
            'price' => $price
        ]);

        return redirect('/');
    }

    public function update(Request $request, string $id) {
        $name = $request->input('name');
        $description = $request->input('description');
        $count = $request->input('count');
        $price = $request->input('price');

        $affected = DB::table('products')
        ->where('id', $id)
        ->update(['name' => $name, 'description' => $description, 'count' => $count, 'price' => $price]);

        return redirect('/');
    }


    public function delete(string $id) {
        $deleted = DB::table('products')->where('id', '=', $id)->delete();

        return redirect('/');
    }
}
