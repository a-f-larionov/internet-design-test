<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

class LargeFileController extends Controller
{

    public function index()
    {
        /*
         * 6) Файл /tmp/large_file.txt содержит около 5 000 000 строк, в каждой строке - не более 7 символов.
         * Нижеприведенный код использует более 40 Мб оперативной памяти для чтения, обработки и вывода данных из файла в буфер.
         * Измените функцию readMyFile таким образом, чтобы потребление памяти сократилось в 2 и более раз (можно использовать версию PHP 5.5 и выше):
         */

        echo "<pre>";

        $memoryUsage = 0;
        foreach ($this->readMyFile($memoryUsage) as $line) {
            // STDOUT оставим SAPI CLI, а рамках тестового задания будем использовать url
            echo $line;
        }

        echo "Memory usage is: $memoryUsage\n";
    }

    private function readMyFile(&$memoryUsage)
    {
        $begin = memory_get_usage();

        $filePath = $this->getLargeFilePath();
        $result = [];

        $handle = fopen($filePath, 'r');
        $x = 0;

        while (!feof($handle)) {
            yield  "Line " . $x++ . ': ' . fgets($handle);
        }

        $end = memory_get_usage();
        $memoryUsage = $end - $begin;

        return $result;
    }


    private function getLargeFilePath()
    {
        return storage_path('app/public/large_file.txt');
    }


    public function generateFile()
    {
        set_time_limit(120);
        $filePath = $this->getLargeFilePath();

        $file = fopen($filePath, 'w+');

        $count = Input::get('count', 10);

        for ($i = 0; $i < $count; $i++) {

            $string = $this->getRandomString(rand(1, 7));
            fwrite($file, $string . "\r\n");
        }
    }

    private function getRandomString($len = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $len; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
}