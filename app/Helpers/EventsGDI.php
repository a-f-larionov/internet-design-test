<?php

namespace App\Helpers;

use App\Events;

/**
 * ВНИМАНИЕ:
 * данные код носит эксперименталный характер и цель разового тестирования,
 * не претендует на роль готового решения!
 * так что написан на коленке но быстро :)
 * Class EventsGDI
 * @package App\Helpers
 */
class EventsGDI
{
    public static function getCoords($events, $thisWeekIds)
    {
        $out = [];

        $min = Events::getMinDateTime();
        $max = Events::getMaxDateTime();
        $ratio = ($max - $min) / 1024;

        $offsetX = 200;;
        $i = 0;
        foreach ($events as $event) {
            $row = [];

            $row['x'] = $offsetX + floor((strtotime($event->begin_date) - $min) / $ratio);
            $row['width'] = floor((strtotime($event->end_date) - strtotime($event->begin_date)) / $ratio);
            $row['height'] = 8;
            $row['top'] = $i++ * 10;
            $row['color'] = 'gray';
            $row['border'] = 'none';
            $row['opacity'] = '';
            if (in_array($event->id, $thisWeekIds)) {
                $row['color'] = 'lightgreen';
            }

            $out[$event->id] = $row;
        }


        $weekStart = Events::getWeekStart();
        $weekEnd = Events::getWeekEnd();

        $row = [];
        $row['x'] = $offsetX + floor(($weekStart - $min) / $ratio);
        $row['width'] = floor(($weekEnd - $weekStart) / $ratio);
        $row['height'] = $i * 10;
        $row['top'] = 0;
        $row['color'] = 'cyan';
        $row['border'] = '1px solid green';
        $row['opacity'] = '0.2;';


        $out[] = $row;

        return $out;
    }

}