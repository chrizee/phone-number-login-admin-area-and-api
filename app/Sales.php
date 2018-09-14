<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public function person()
    {
        return $this->belongsTo("App\People");
    }
}
