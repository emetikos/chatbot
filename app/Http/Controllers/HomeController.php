<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index() {
//        Session::flush();
        return view('presentation-view');
    }

    public function query(Request $request) {

        // Spyros classify() doesn't accept 'can you help me with'
        $message = '';
        if($request->input('query')) $message = $request->input('query');
        $readySubmit = False;
        if(Session::has('readySubmit')) $readySubmit = Session::get('readySubmit');
        $topicFound = False;
        if(Session::has('topicFound')) $topicFound = Session::get('topicFound');
        $fileSubmit = False;
        if(Session::has('fileSubmit')) $fileSubmit = Session::get('fileSubmit');
        $classifiedMsg = '';
        if(Session::has('classifiedMsg')) $classifiedMsg = Session::get('classifiedMsg');

        $response = PythonModel::runChatbot(array(
            'message'=>$message,
            'readySubmit'=>$readySubmit,
            'topicFound'=>$topicFound,
            'fileSubmit'=>$fileSubmit,
            'classifiedMsg'=>$classifiedMsg,
        ));
        $arr = json_decode(json_encode($response), TRUE);

        Session::put('readySubmit', $arr['readySubmit']);
        Session::put('topicFound', $arr['topicFound']);
        Session::put('fileSubmit', $arr['fileSubmit']);
        Session::put('classifiedMsg', $arr['classifiedMsg']);

        return back()->with('success', $arr['response']);

    }
}


