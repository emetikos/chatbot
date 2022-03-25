<?php

namespace App\Http\Controllers;

use App\Models\PythonModel;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function index() {
        return view('iframe');
    }

    public function home() {
        return view('home');
    }

    /**
     * Main function for a request from a user.
     * Sends and receive data to and from the chatbot
     * Accepts the user input values and store required flags in a session to support communication
     *
     * @throws RequestException
     */
    public function api(Request $request) {
        // creates empty initial user input
        $message = '';
        // checks if the user input already has been saved in the session and retrieve it
        if(Session::has('userInput')) $message = Session::get('userInput');
        // listening for a user input from the input request , if exists replacing the message with this input
        if($request->input('query')) $message = $request->input('query');

        // initial flag in the case when a user agreed with a topic name to search and ready to submit a file
        $readySubmit = 'False';
        //  checks the session for the flag 'readySubmit' and append a value to it if it's exists
        if(Session::has('readySubmit')) $readySubmit = Session::get('readySubmit');

        // initial flag to process further to a file analysis after the text classification by a chatbot
        $topicFound = 'False';
        //  checks the session for the flag 'topicFound' and append a value to it if it's exists
        if(Session::has('topicFound')) $topicFound = Session::get('topicFound');

        // initial flag in the case when a user agreed with a topic name to search and ready to submit a file
        $fileSubmit = 'False';
        //  checks the session for the flag 'fileSubmit' and append a value to it if it's exists
        if(Session::has('fileSubmit')) $fileSubmit = Session::get('fileSubmit');

        // path for the file on the server, that has been uploaded by the user for searching
        $file = 'None';
        // retrieve the path for the file from a session if that exists
        if(Session::has('file')) $file = Session::get('file');

        // classified message from a chatbot after the text classification step and before file analyse
        $classifiedMsg = '';
        //  checks the session for the classified message and append a value to it if it's exists
        if(Session::has('classifiedMsg')) $classifiedMsg = Session::get('classifiedMsg');

        // initial flag in the case when a user selected a topic name after the file analysis and before web search
        $topicSelected = 'False';
        //  checks the session for the flag 'topicSelected' and append a value to it if it's exists
        if(Session::has('topicSelected')) $topicSelected = Session::get('topicSelected');

        // stores the value for selected topic from a user to search the web
        $topicFinal = '';
        // check the session value for selected topic and append a value to it if it's exists
        if(Session::has('topicFinal')) $topicFinal = Session::get('topicFinal');

        // listening for a user input with a name 'topic' from the input request , if exists replacing the 'topicFinal' with this input  value
        if($request->input('topic')) {
            $topicFinal = $request->input('topic');
            Session::put('topicSelected','True');
        }

//        http://127.0.0.1:5000/
//        https://chatbot-educ-api.herokuapp.com/

        /*
         Sends the get request to the flask api where the chatbot exists.
         Sends the response from a chatbot back to the user
         Stores data from the response in the session
        */
        $arr = Http::get('http://127.0.0.1:5000/',[
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

    /**
     * Methof for the file analysis
    */
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


