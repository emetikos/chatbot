<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function retrieve_same(){
        $in = '1';
        $samequery = DB::select('SELECT path_name FROM resources r JOIN queries q ON r.query_id=q.id WHERE q.name = ?', [$in]);
        dd($samequery);
    }

    public function store(){
        $query = '1';
        $link = 'asdf';
        $storequery = DB::insert('INSERT INTO queries (name) VALUES (?)', [$query]);
        $storequery = DB::insert('INSERT INTO resources (query_id, path_name) VALUES ((SELECT MAX(id) FROM queries), ?)', [$link]);
    }
}