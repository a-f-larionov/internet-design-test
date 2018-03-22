<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{

    public function index()
    {
        $list = [
            ['url' => '/array-access/', 'title' => 'Задание №1 - ArrayAccess',],
            ['url' => '/date-format-validation/', 'title' => 'Задание №2 - Date format validation',],
            ['url' => '/specialists/', 'title' => 'Задание №3 - Candidate to Employee',],
            ['url' => '/news/show/1521504000', 'title' => 'Задание №4 - News list',],
            ['url' => '/large-file/', 'title' => 'Задание №6 - Large file',],
            ['url' => '/tree-comments/', 'title' => 'Задание №7 - Tree comments',],
        ];

        return view('list', [
            'list' => $list,
        ]);
    }
}