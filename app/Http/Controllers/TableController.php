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
            return ["NULL"];
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




//upadting/editing data in the table
    public function update()
    {
        $tableName = 'person';
        $columnName = 'name';
        $data = '1';
        $selectColumn = 'id';
        $id = '4';
        $updatequery = DB::insert('UPDATE $tableName SET $columnName = $data WHERE $selectColumn = $id');
        //the query will make an update on the data in the name table,
        //it will chnage the data in that column where the column id has been selected
        //SELECT $tableName COLUMN $columnName AND INSERT $value
    }


 //delete specific data in the table
    public function delete_function()
    {
        $resource = 'link';
        $link = 'google';
        DB::delete('DELETE FROM $query WHERE id  = ?','$id');
        $deletedata = DB:: delete ('DELETE resources WHERE query_id = ?');
        $deletedata = DB:: delete ('DELETE link WHERE name,id = ?');
        //return redirect('')->with('Data has been deleted');
        //redirect to URL
    }





    // store example
    /*public function store()
    {
        $tableName = 'person';
        $columnName = 'name';
        $data = '2';
        $storequery = DB::insert('INSERT INTO $tableName ( $columnName ) VALUES $data');
        //SELECT $tableName COLUMN $columnName AND INSERT $value
    }*/





    public function test() {
        return view('resource-test');
    }
}
