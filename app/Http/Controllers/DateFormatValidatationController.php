<?php

namespace App\Http\Controllers;

/**
 * Класс тестового задания №2 для Internet-Design.ru
 * Class DateFormatValidatationController
 * @package App\Http\Controllers
 */
class DateFormatValidatationController extends Controller
{

    public function index()
    {
        /**
         * 2) Реализовать метод, который будет проверять, соответствует ли дата, хранимая в переменной $str, определенному формату $format ? Используем описание формата такое же, как в стандартных функциях php(date, …). Пример описания формата:
         * $format = 'd.m.Y';
         * $format = 'H.i';
         * $format = 'd/m/Y H:i';
         * $format = 'H:i Y-m-d';
         *
         */

        $formats = [
            ["d.m.Y", "1.2.2018"],
            ["d.m.Y", "1.2.201"],
            ["H.i", "5.10"],
            ["H.i", "5.410"],
            ["d/m/Y H:i", "5/7/2016 05:05"],
            ["d/m/Y H:i", "5-7-2016 05:05"],
            ["H:i Y-m-d", "12:45 2019-5-5"],
            ["H:i Y-m-d", "12:45 2019 5 5"],
        ];

        foreach ($formats as $row) {

            echo "format: `" . $row[0] . '` date: ' . $row[1];

            if (\DateTime::createFromFormat($row[0], $row[1])) {
                echo " - OK";
            } else {
                echo " - Failed";
            }

            echo "<br>";
        }

    }

}