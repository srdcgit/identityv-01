<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamCandidate;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // public function list()
    // {
    //     $pageTitle = 'Quiz';
    //     $quiz = Quiz::all();
    //     return view('admin.quiz.list', compact('pageTitle', 'quiz'));
    // }
    // public function Add()
    // {
    //     $pageTitle = 'Add Quiz';
    //     return view('admin.Quiz.add', compact('pageTitle'));
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'question' => 'required|string',
    //         'option1' => 'required|string',
    //         'option2' => 'required|string',
    //         'option3' => 'required|string',
    //         'option4' => 'required|string',
    //         'correct_answer' => 'required|string',
    //     ]);

    //     $quiz = new Quiz();
    //     $quiz->question = $request->question;
    //     $quiz->option1 = $request->option1;
    //     $quiz->option2 = $request->option2;
    //     $quiz->option3 = $request->option3;
    //     $quiz->option4 = $request->option4;
    //     $quiz->correct_answer = $request->correct_answer;
    //     $quiz->save();

    //     $notify[] = ['success', 'Plan has been created successfully'];
    //     return to_route('admin.quiz.list')->withNotify($notify);
    // }

    // public function edit($id){
    //     $pageTitle = 'Edit';
    //     $quiz = Quiz::findOrFail($id);

    //     return view('admin.Quiz.edit',compact('pageTitle','quiz'));
    // }

    // public function update(Request $request){
    //     $update = Quiz::findOrFail($request->id);
    //     $update->question = $request->question;
    //     $update->option1 = $request->option1;
    //     $update->option2 = $request->option2;
    //     $update->option3 = $request->option3;
    //     $update->option4 = $request->option4;
    //     $update->correct_answer = $request->correct_answer;
    //     $update->save();

    //     $notify[] = ['success', 'Question has been updated successfully'];
    //     return redirect()->route('admin.quiz.list')->withNotify($notify);
    // }

    // public function delete(Request $request){
    //     $quiz = Quiz::findOrFail($request->id);
    //     $quiz->delete();

    //     $notify[] = ['success', 'Question has been deleted successfully'];
    //     return back()->withNotify($notify);
    // }
    public function index()
    {
        // if (Auth::user()->role->name == 'admin') {
        //     return view('admin.quiz-list')->with('quiz_list', Quiz::all());
        // }
        $pageTitle = 'Quiz List';
        return view('presets.themesFive.user.quiz.quiz-list', compact('pageTitle'))->with('quiz_list', Quiz::join('questions', 'quizzes.id', '=', 'questions.quiz_id')->distinct('quizzes.id')
            ->select('quizzes.id as quiz_id', 'quizzes.*')
            ->get());
    }

    public function addQuiz()
    {
        $pageTitle = 'Add Quiz';
        // if (Auth::user()->role->name == 'Admin') {
            return view('admin.quiz.add-quiz' , compact('pageTitle'))->with('quiz_list', Quiz::all());
        // }
        // return view('user.quiz-list')->with('quiz_list', Quiz::join('questions', 'quizzes.id', '=', 'questions.quiz_id')->distinct('quizzes.id')
        //     ->select('quizzes.id as quiz_id', 'quizzes.*')
        //     ->get());

        // return view('admin.quiz.add-quiz');
    }

    public function storeQuiz(Request $request)
    {
        if (Quiz::create([
            'title' => $request->title,
            'quiz_type' => $request->quiz_type,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'duration' => $request->duration,
        ])) {
            return redirect()->back()->with('success', 'Quiz: ' . $request->title . ' added successfully!');
        }
        return redirect()->back()->with('error', 'Quiz: ' . $request->title . ' was not added. Something wrong!');
    }

    public function editQuiz($id)
    {
        $pageTitle = 'Edit Quiz';
        $edit_quiz = Quiz::find($id);
        return view('admin.quiz.edit-quiz', compact('edit_quiz','pageTitle'));
    }

    public function updateQuiz(Request $request)
    {
        $update_quiz = Quiz::find($request->id);

        $update_quiz->title = $request->title;
        $update_quiz->from_time = $request->from_time;
        $update_quiz->to_time = $request->to_time;
        $update_quiz->duration = $request->duration;
        $update_quiz->save();
        return redirect()->back()->with('success', 'Edited Successfully!');
    }

    public function deleteQuiz($id)
    {
        $delete_quiz = Quiz::find($id);
        if ($delete_quiz) {
            // $delete_quiz->delete();

            Question::where('quiz_id', $id)->delete();
            Result::where('quiz_id', $id)->delete();
            ExamCandidate::where('quiz_id', $id)->delete();

            $delete_quiz->delete();
            return redirect()->back()->with('success', 'Deleted Successfully.');
        }
        return redirect()->back()->with('error', 'Something Wents Wrong !');
    }

    public function joinQuiz($id)
    {
        $pageTitle = 'Edit Quiz';
        if (Quiz::where('id', $id)->where('quiz_type', 'live')->first()) {
            if (count(ExamCandidate::where('quiz_id', $id)->where('user_id', '=', Auth::user()->id)->get()) > 0) {

                return redirect()->back()->with('error', 'You already participated this quiz');
            }

            if (time() >= strtotime(Quiz::where('id', $id)->value('to_time'))) {
                return redirect()->back()->with('error', 'Quiz is no longer available');
            }
            if (time() < strtotime(Quiz::where('id', $id)->value('from_time'))) {
                return redirect()->back()->with('error', 'Quiz is not available now. Wait for its availability');
            }

            if (count(Result::where('user_id', Auth::user()->id)->where('quiz_id', $id)->get()) > 0) {
                return redirect()->back()->with('error', 'You already participated in this quiz');
            }
        }

        ExamCandidate::create([
            'user_id' => Auth::user()->id,
            'quiz_id' => $id
        ]);

        return view('presets.themesFive.user.quiz.give-quiz' , compact('pageTitle'))->with('quiz', Quiz::where('id', $id)->first())
            ->with('questions', Question::where('quiz_id', $id)->get())
            ->with('start_time', Carbon::now());
    }

    public function getQuestion(Request $request) {

        $get_question = Question::where('id',$request->id)->first();
        return response()->json($get_question);
    }
}
