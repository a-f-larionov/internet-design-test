<?php

namespace App\Http\Controllers;

use App\SomeArrayAccessClass;

/**
 * Класс тестового задания №1 для Internet-Design.ru
 * Class ArrayAccessController
 * @package App\Http\Controllers
 */
class ArrayAccessController extends Controller
{
    public function index()
    {
        /**
         * PHP
         * 1) Возможно ли такое в PHP и как это реализуется, если возможно:
         * $obj = new Building();
         * $obj['name'] = 'Main tower';
         * $obj['flats'] = 100;
         * $obj->save();
         */

        $obj = new SomeArrayAccessClass();

        $obj['name'] = 'Main tower';
        $obj['flats'] = 100;
        $obj->save();

        $all = SomeArrayAccessClass::all();

        return view('array-access', [
            'all' => $all
        ]);
    }
}