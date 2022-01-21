<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;

class HomeController extends Controller {
    public function index() {
        print_r(PythonModel::runChatbot("Hello World", 10, "False", "None"));
        return view('home');
    }
}
