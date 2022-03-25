<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index() {
//        Session::flush();

        return view('iframe');
    }

    public function home() {
        return view('home');
    }

    /**
     * @throws RequestException
     */
    public function api(Request $request) {
        $message = '';
        if(Session::has('userInput')) $message = Session::get('userInput');
        if($request->input('query')) $message = $request->input('query');
        $readySubmit = 'False';
        if(Session::has('readySubmit')) $readySubmit = Session::get('readySubmit');
        $topicFound = 'False';
        if(Session::has('topicFound')) $topicFound = Session::get('topicFound');
        $fileSubmit = 'False';
        if(Session::has('fileSubmit')) $fileSubmit = Session::get('fileSubmit');
        $file = 'None';
        if(Session::has('file')) $file = Session::get('file');
        $classifiedMsg = '';

        if(Session::has('classifiedMsg')) $classifiedMsg = Session::get('classifiedMsg');



        $topicSelected = 'False';
        $topicFinal = '';
        if(Session::has('topicFinal')) $topicFinal = Session::get('topicFinal');
        if($request->input('topic')) {
            $topicFinal = $request->input('topic');
            Session::put('topicSelected','True');
        }
        if(Session::has('topicSelected')) $topicSelected = Session::get('topicSelected');

        $arr = Http::get('https://chatbot-educ-api.herokuapp.com/',[
                'message'=>$message,
                'readySubmit'=>$readySubmit,
                'topicFound'=>$topicFound,
                'fileSubmit'=>$fileSubmit,
                'file'=>$file,
                'classifiedMsg'=>$classifiedMsg,
                'topicSelected'=>$topicSelected,
                'topicFinal'=>$topicFinal,
            ])->throw()->json();
        Session::put('userInput', $arr['message']);
        Session::put('readySubmit', $arr['readySubmit']);
        Session::put('topicFound', $arr['topicFound']);
        Session::put('fileSubmit', $arr['fileSubmit']);
        Session::put('classifiedMsg', $arr['classifiedMsg']);
        Session::put('topicSelected', $arr['topicSelected']);
        Session::put('topicFinal', $arr['topicFinal']);
        Session::put('file', $arr['fileUploaded']);

        return response($arr, 200);
    }

    public function analyse(Request $request) {
        $file = $_POST["pdf"] ?? null;

        if ($file === null) {
            return false;
        }

        Session::put("file", $file);
        Session::put("fileSubmit", "True");
        Session::put("readySubmit", "False");

        try {
            return self::api($request);
        }
        catch (Exception $e) {
            return false;
        }
    }

    /**
     * Method to flash the session
     * @redirect to main page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function flashSession(){
        Session::flush();
        return redirect()->route('home');
    }

}


