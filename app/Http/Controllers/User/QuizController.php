<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{


    public function index_quiztype()
    {
        $pageTitle = 'Quiz_type';
        $quizs = Quiz::all();
        return view('presets.themesFive.user.Quiz.quiztype', compact('pageTitle', 'quizs'));
    }
    public function index()
    {
        $pageTitle = 'Quiz';
        $quizs = Quiz::all();
        return view('presets.themesFive.user.quiz.quiz', compact('pageTitle', 'quizs'));
    }

    // public function joinQuiz($id)
    // {
    //     if (Quiz::where('id', $id)->where('quiz_type', 'live')->first()) {
    //         if (count(ExamCandidate::where('quiz_id', $id)->where('user_id', '=', Auth::user()->id)->get()) > 0) {

    //             return redirect()->back()->with('error', 'You already participated this quiz');
    //         }

    //         if (time() >= strtotime(Quiz::where('id', $id)->value('to_time'))) {
    //             return redirect()->back()->with('error', 'Quiz is no longer available');
    //         }
    //         if (time() < strtotime(Quiz::where('id', $id)->value('from_time'))) {
    //             return redirect()->back()->with('error', 'Quiz is not available now. Wait for its availability');
    //         }

    //         if (Auth::user()->role->name == 'Prospect' && count(Result::where('user_id', Auth::user()->id)->where('quiz_id', $id)->get()) > 0) {
    //             return redirect()->back()->with('error', 'You already participated this quiz');
    //         }
    //     }

    //     ExamCandidate::create([
    //         'user_id' => Auth::user()->id,
    //         'quiz_id' => $id
    //     ]);

    //     return view('prospect.quiz.give-quiz')->with('quiz', Quiz::where('id', $id)->first())
    //         ->with('questions', Quiz::where('quiz_id', $id)->get())
    //         ->with('start_time', Carbon::now());
    // }

    // public function getQuestion(Request $request) {

    //     $get_question = Quiz::where('id',$request->id)->first();
    //     return response()->json($get_question);
    // }

    public function store(Request $request)
    {
        // Retrieve the current authenticated user
        $user = Auth::user();

        // Retrieve the quiz based on the request (you can pass quiz_id in a hidden input)
        $quiz_id = $request->input('quiz_id');
        $quiz = Quiz::find($quiz_id);

        // Initialize scores
        $total_questions = count($quiz->questions);  // Assuming the quiz has related questions
        $correct_answers = 0;

        // Loop through each submitted answer and compare with correct ones
        foreach ($quiz->questions as $index => $question) {
            $submitted_answer = $request->input('answer.' . ($index + 1));
            $correct_answer = $question->correct_option;  // Assuming each question has a correct_option field

            // Increment correct answers if the submitted answer is correct
            if ($submitted_answer == $correct_answer) {
                $correct_answers++;
            }
        }

        // Calculate achieved score (e.g., percentage)
        $achieved_score = ($correct_answers / $total_questions) * 100;

        // Save the result to the database (using a UserQuiz table for example)
        $userQuiz = new Result();
        $userQuiz->user_id = $user->id;
        $userQuiz->quiz_id = $quiz->id;
        $userQuiz->quiz_score = $total_questions;
        $userQuiz->achieved_score = $achieved_score;
        $userQuiz->save();

        // Optionally, redirect or return response
        return redirect()->route('mock-results', ['quiz_id' => $quiz->id])->with('success', 'Quiz submitted successfully!');
    }
}

