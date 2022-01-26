<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;

class HomeController extends Controller {
    public function index() {dd(PythonModel::runTest(true, false, null, ["a", 1, "b"=>[4, 5, 6]]));
    
    echo("<br><br>");
    
    print_r(PythonModel::runChatbot("Hello World", 10, "False", "None"));
    
    return view('home');
    }
}
