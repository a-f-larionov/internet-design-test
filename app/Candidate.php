<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    protected $table = 'specialists';

    public $timestamps = false;

    protected $fillable = ['id', 'name', 'resume_url', 'resume_received_at',];

    protected $visible = ['id', 'name', 'resume_url', 'resume_received_at',];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->resume_received_at = date("Y-m-d H:i:s");
    }

    /**
     * @param $position
     * @return mixed
     * @throws \Exception
     */
    public function recruit($position)
    {
        if ($this->position) {
            throw new \Exception('Нельзя нанять сотрудника дважды.');
        }

        $this->position = $position;
        $this->recruit_at = date('Y-m-d H:i:s');
        $this->save();

        $employee = Employee::find($this->id);

        return $employee;
    }
}