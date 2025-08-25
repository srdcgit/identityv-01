<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion($id){
        $pageTitle = 'Add Question';
        return view('admin.quiz.add-questions' , compact('pageTitle'))->with('quiz_list',Quiz::where('id',$id)->first())
            ->with('questions',Question::where('quiz_id',$id)->get())
            ->with('quiz_id',$id);
    }

    public function storeQuestion(Request $request){
        if (Question::create([
            'quiz_id'=>$request->quiz_id,
            'Question'=>$request->question,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'correct_option'=>$request->correct_option,
        ])){
            return redirect()->back()->with('success','Question added successfully!');
        }
        return redirect()->back()->with('error','Something wrong!');
    }

    public function editQuestion($id){
        $pageTitle = 'Edit Question';
        $edit_question = Question::find($id);
        return view('admin.quiz.edit-questions',compact('edit_question', 'pageTitle'));
    }
    public function updateQuestion(Request $request){
        $update_question = Question::find($request->id);
        // $update_question->quiz_id =$request->quiz_id;
        $update_question->question =$request->question;
        $update_question->option_a =$request->option_a;
        $update_question->option_b =$request->option_b;
        $update_question->option_c =$request->option_c;
        $update_question->option_d =$request->option_d;
        $update_question->correct_option =$request->correct_option;

        $update_question->save();
        return redirect()->route('admin.add.question', ['id' => $update_question->quiz_id])->with('success','Question Edited Successfully.');
    }
    public function deleteQuestion($id){
        $delete_question = Question::find($id);
        if($delete_question){
            $delete_question->delete();
            return redirect()->back()->with('success','Deleted Successfully');
        }
        return redirect()->back()->with('error','Something Wents Wrong !');
    }
}
