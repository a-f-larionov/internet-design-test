<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * ВНИМАНИЕ:
 * данные код носит эксперименталный характер и цель разового тестирования,
 * не претендует на роль готового решения!
 * так что написан на коленке но быстро :)
 * Class Events
 * @package App
 */
class Events extends Model
{

    private static $minTimestamp = null;
    private static $maxTimestamp = null;

    public static function getThisWeekIds()
    {

        DB::select("SET @week_start = SUBDATE(CURDATE(), WEEKDAY(CURDATE()))");
        DB::select("SET @week_end = ADDDATE(@week_start, 7);");

        $thisWeek = DB::select("
            SELECT id
              FROM events
              WHERE 
              end_date >= @week_start
              AND
              begin_date < @week_end
              ;");


        $ids = [];
        foreach ($thisWeek as $row) {
            $ids[] = $row->id;
        }
        return $ids;
    }

    public static function getMinDateTime()
    {
        if (!self::$minTimestamp) {
            $row = DB::select("SELECT MIN(begin_date) as date FROM events")[0];
            $date = $row->date;
            self::$minTimestamp = strtotime($date);
        }

        return self::$minTimestamp;
    }

    public static function getMaxDateTime()
    {
        if (!self::$maxTimestamp) {
            $row = DB::select("SELECT MAX(end_date) as date FROM events")[0];
            $date = $row->date;
            self::$maxTimestamp = strtotime($date);
        }

        return self::$maxTimestamp;
    }

    public static function getWeekStart()
    {
        $row = DB::select("SELECT SUBDATE(CURDATE(), WEEKDAY(CURDATE())) as date");
        return strtotime($row[0]->date);
    }

    public static function getWeekEnd()
    {
        $row = DB::select("SELECT ADDDATE(SUBDATE(CURDATE(), WEEKDAY(CURDATE())),7) as date");
        return strtotime($row[0]->date);
    }


    public function getGraph()
    {
        return [
            'x' => 5,
            'y' => 5,
            'width' => 10,
            'height' => 10,
        ];
    }

}