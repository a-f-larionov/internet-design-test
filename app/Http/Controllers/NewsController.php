<?php

namespace App\Http\Controllers;

use App\News;

/**
 * Класс тестового задания №3 для Internet-Design.ru
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends \App\Http\Controllers\Controller
{
    /**
     * @param $created
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($created)
    {
        $news = News::with('announces')
            ->where('created', '=', $created)
            ->get();

        return view('news', [
            'news' => $news,
            'created' => $created
        ]);
    }

}