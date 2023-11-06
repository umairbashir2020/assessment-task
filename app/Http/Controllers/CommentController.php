<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Userfeedbackcomment;

class CommentController extends Controller
{
    public function index(){
        $comments = Userfeedbackcomment::with('feedback')->get();
        return view('admin.comment.index',compact('comments'));
    }
    public function update($id){
       $user = Userfeedbackcomment::find($id);
       $user->status = ($user->status == 0) ? 1 : 0;
       $user->save();
       return back();
    }
}
