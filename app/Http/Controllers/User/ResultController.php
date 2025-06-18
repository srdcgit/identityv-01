<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MockResult;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index(){
        if (Auth::user()->role->name == 'Admin'){
            return view('admin.quiz.result-page')->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
                ->join('users','results.user_id','=','users.id')
                ->get());
        }else{
        return view('presets.themesFive.user.quiz.result-page')
                        ->with('results',Result::join('quizzes','results.quiz_id','quizzes.id')
                        ->where('user_id',Auth::user()->id)
                        ->get());
        }
    }
    public function mockResults(){
        $pageTitle = 'Mock Results';
        $mockResults = MockResult::join('quizzes', 'mock_results.quiz_id', '=', 'quizzes.id')
                        ->where('user_id', Auth::user()->id)
                        ->orderBy('mock_results.id', 'desc')
                        ->select('mock_results.*', 'quizzes.title')  // Specify the fields you want from each table
                        ->get();

        return view('presets.themesFive.user.quiz.mock-results', compact('pageTitle'))
               ->with('mock_results', $mockResults);
    }
}
