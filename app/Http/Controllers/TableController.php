<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function retrieve_same($in){
        $samequery = DB::select('SELECT DISTINCT path_name FROM resources r JOIN queries q ON r.query_id=q.id WHERE q.name = ?', [$in]);
    }

    public function store($query, $link){
        $storequery = DB::table('query')
            ->insert([
                'name' => $query
            ]);
        $getquery = DB::table('query')
            //->select('id')
            //->where('name', $query)
            ->last();
        $storelink = DB::table('resources')
            ->insert([
                'query_id' => $getquery,
                'path_name' => $link
            ]);
    }
}