<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Userfeedback;
use App\Models\Userfeedbackcomment;
use Illuminate\Http\Request;

class UserFeedBackController extends Controller
{
    public function index(){
        $user_feedback=Userfeedback::get();
       return view('admin.userfeedback.list',compact("user_feedback"));
    }
    public function create(Request $request) {
        if (auth()->check()) {
            $id = auth()->user()->id;
            $user_feedback = Userfeedback::create([
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'user_id' => $id,
            ]);
            return redirect()->back();
        }
        else {
            echo "auth not found";
        }
    }
    public function feedback_show($id){
        $feedback = Userfeedback::find($id);
        $comments = Userfeedbackcomment::where('status',1)->get();
            return view("admin.userfeedback.detail",compact('feedback','comments'));
    }
    public function storeComment(Request $request, $id) {
        $request->validate([
            'comment' => 'required',
        ]);
        $feedback = Userfeedback::find($id);
        $user = auth()->user();
        Userfeedbackcomment::create([
            'userfeedback_id' => $id,
            'user_name' => $user->name,
            'content' => $request->comment,
            'status' =>1,
        ]);
        $comments = Userfeedbackcomment::get();
        return view('admin.userfeedback.detail',compact('feedback','comments'));
    }
}
