<?php

namespace App\Http\Controllers;

use App\Models\Queries;
use App\Models\Resources;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TableController extends Controller
{

    /**
     * Function to save the user query and the relevant resources into the database
     * The function checks if the sessions for the classifiedMsg and resource are set
     * If a positive feedback is given, the function checks the queries to find if the current query is already
     * stored. If not stores it in the database.
     * Checks if the provided resources are stored in the database and if not they are added.
     * @param Request $request
     */
    public function saveLink(Request $request){

        # FLAG TO CHECK FOR POSITIVE OR NEGATIVE FEEDBACK
        $feedback = $request->get('feedback');

        # FLAG FOR THE USER QUERY
        $classifiedMessage = '';

        # CHECK IF THE USER QUERY IS DEFINED
        if ($request->session()->get('classifiedMsg')){
            $classifiedMessage = $request->session()->get('classifiedMsg');
        }

       # CHECK IF LIST OF RESOURCES IS DEFINED
        if ($request->session()->get('resource')){
            $resources = $request->session()->get('resource');
        }

        # CHECK IF THE USER WILL LEAVE A POSITIVE FEEDBACK FOR THE RESOURCES
        $feedback = 'positive';

        if($feedback === 'positive'){

            # CHECK IF THE USER IS ALREADY STORED IN THE DATABASE
            if (!Queries::where('name', $classifiedMessage)->first()){
                Queries::create(['name' => $classifiedMessage]);
            }

            # FETCH THE ID OF THE USER QUERY
            $queryId = Queries::where('name', $classifiedMessage)->first();

            foreach($resources as $resource){

                $newLink = array(
                    'query_id' => $queryId->id,
                    'path_name' => $resource
                );
                if (!Resources::where('path_name' , $resource)->first()){
                    Resources::create($newLink);
                }else{
                    # Updating the existing resources does not make any sense..... !
                    Resources::where('path_name', $resource)->update(['path_name' => $resource]);
                }
            }
        }
    }

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
