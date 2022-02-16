<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function retrieve_same($in){
        try {
            $samequery = DB::select('SELECT path_name FROM resources r JOIN queries q ON r.query_id=q.id WHERE q.name = ?', [$in]);
            return $samequery;
        }
        catch (Exception $e) {
            return "NULL";
        }
    }

    public function store($query, $link){
        try {
            $check = DB::select('SELECT path_name FROM resources r JOIN queries q ON r.query_id=q.id WHERE q.name = ?', [$query]);
            return;
        }
        catch (Exception $e) {
            $storequery = DB::insert('INSERT INTO queries (name) VALUES (?)', [$query]);
            $storequery = DB::insert('INSERT INTO resources (query_id, path_name) VALUES ((SELECT MAX(id) FROM queries), ?)', [$link]);
        }
    }

    public function test() {
        return view('resource-test');
    }
}