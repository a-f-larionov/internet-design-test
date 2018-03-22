<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Input;

class TreeCommentsController extends Controller
{
    public function index()
    {
        $list = Comment::orderBy('rank')->get();
        return view('tree-comments', [
            'list' => $list,
        ]);
    }

    public function sendComment()
    {
        $text = Input::get('text');
        $parentId = Input::get('parentId');
        $parentLevel = Input::get('parentLevel');
        $parentRank = Input::get('parentRank');

        if (!trim($text)) {
            return 'Введите сообщение';
        }

        $comment = new Comment();
        $comment->text = $text;
        $comment->parent_id = $parentId;
        $comment->level = $parentLevel + 1;
        $comment->created = date("Y-m-d H:i:s");
        $comment->rank = '' . $parentRank;
        $comment->save();

        return "OK";
    }
}