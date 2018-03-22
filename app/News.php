<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    public $timestamps = false;

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function announces()
    {
        return $this->hasMany('App\Announce');
    }

    /**
     * @return mixed
     */
    public function getMainItem()
    {
        return $this->announces->filter(function ($item) {
            return $item->is_new;
        })->last();
    }
}
