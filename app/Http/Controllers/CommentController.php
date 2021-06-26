<?php

namespace App\Http\Controllers;
use App\Models\Gallerie;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request){


        info($request);

        $user = Auth('api')->user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->gallerie_id = $request->input('gallerie_id');
        $comment->text = $request->input('text');

        $comment->save();

        return $comment;


    }


    public function index($id){

        return Comment::with('user')->where('gallerie_id',$id)->get();
    }


    public function destroy($id){

        info ($id);
        return Comment::find($id)->delete();

    }
}
