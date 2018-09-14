<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    public function person()
    {
        return $this->belongsTo("App\People");
    }
}
