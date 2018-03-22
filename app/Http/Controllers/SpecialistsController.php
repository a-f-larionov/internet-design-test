<?php

namespace App\Http\Controllers;


use App\Candidate;
use App\Employee;
use Illuminate\Support\Debug\Dumper;

class SpecialistsController extends Controller
{

    public function index()
    {
        /**
         * 3) Есть две сущности: сотрудник компании, соискатель. Обе сущности хранятся в одной таблице «специалисты» с полями: имя, резюме, должность, дата отправки резюме, дата приема на работу, должность.
         * Соискатель до момента приема на работу имеет: имя, резюме, дату отправки резюме. После приема на работу у него появляются: должность, дата приема на работу.
         *
         * Используя ООП, написать реализацию этих двух сущностей. В классе «Соискатель» должна быть возможность принять сотрудника на работу.
         */

        /**
         * @type Candidate
         */
        $candidate = new Candidate([
            'name' => 'Имя 1',
            'resume_url' => 'https://hh.ru/resume/7f70bbfbff01c0d5d10039ed1f397354505779',
        ]);
        $candidate->save();

        echo "<b>candidate created:</b>";

        (new Dumper)->dump($candidate->toArray());


        $employee = $candidate->recruit(Employee::POSITION_DEVELOPER);

        echo "<b>candidate recruited:</b>";

        (new Dumper)->dump($employee->toArray());
    }
}