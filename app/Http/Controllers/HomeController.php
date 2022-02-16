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
        return view('home');
    }

    public function query(Request $request): \Illuminate\Http\RedirectResponse {

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
    public function ajaxQuery(Request $request): \Illuminate\Http\JsonResponse {

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

        return response()->json($arr, 200);

    }
    /**
     * @throws RequestException
     */
    public function api(Request $request) {
        $message = '';
        if($request->input('query')) $message = $request->input('query');
        $readySubmit = 'False';
        if(Session::has('readySubmit')) $readySubmit = Session::get('readySubmit');
        $topicFound = 'False';
        if(Session::has('topicFound')) $topicFound = Session::get('topicFound');
        $fileSubmit = 'True';
        if(Session::has('fileSubmit')) $fileSubmit = Session::get('fileSubmit');
        $classifiedMsg = '';
        if(Session::has('classifiedMsg')) $classifiedMsg = Session::get('classifiedMsg');
        $topicSelected = 'False';
        if(Session::has('topicSelected')) $topicSelected = Session::get('topicSelected');
        $topicFinal = 'Example topic';
        if(Session::has('topicFinal')) $topicFinal = Session::get('topicFinal');

        $arr = Http::get('https://chatbot-educ-api.herokuapp.com/',[
                'message'=>$message,
                'readySubmit'=>$readySubmit,
                'topicFound'=>$topicFound,
                'fileSubmit'=>$fileSubmit,
                'classifiedMsg'=>$classifiedMsg,
                'topicSelected'=>$topicSelected,
                'topicFinal'=>$topicFinal,
            ])->throw()->json();
        Session::put('readySubmit', $arr['readySubmit']);
        Session::put('topicFound', $arr['topicFound']);
        Session::put('fileSubmit', $arr['fileSubmit']);
        Session::put('classifiedMsg', $arr['classifiedMsg']);
        Session::put('classifiedMsg', $arr['classifiedMsg']);
        Session::put('topicSelected', $arr['topicSelected']);
        Session::put('topicFinal', $arr['topicFinal']);

        return response($arr, 200);
        }

}


