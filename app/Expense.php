<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function person()
    {
        return $this->belongsTo("App\People");
    }
}
