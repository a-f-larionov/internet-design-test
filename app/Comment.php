<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public $timestamps = false;

    /**
     * Код не доработан, т.к. речь идет о структуре бд
     * @param array $options
     * @return string
     */
    public function save(array $options = [])
    {
        parent::save($options);

        //  обновить rank
        $query = "UPDATE comments SET rank = ? WHERE id = ?";

        DB::update($query, [$this->rank ? $this->rank . '.' . $this->id : $this->id, $this->id]);

        return $query;
    }
}