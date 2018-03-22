<?php

namespace App\Http\Controllers;

use App\Events;
use App\Helpers\EventsGDI;

/**
 * ВНИМАНИЕ:
 * данные код носит эксперименталный характер и цель разового тестирования,
 * не претендует на роль готового решения!
 * так что написан на коленке но быстро :)
 * Class EventsController
 * @package App\Http\Controllers
 */
class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();

        $thisWeekIds = Events::getThisWeekIds();

        $coords = EventsGDI::getCoords($events, $thisWeekIds);

        return view('events', [
            'events' => $events,
            'thisWeekIds' => $thisWeekIds,
            'coords' => $coords,
        ]);
    }
}