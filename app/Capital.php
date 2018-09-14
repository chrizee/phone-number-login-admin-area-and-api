<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float amount
 */
class Capital extends Model
{
    public function person()
    {
        return $this->belongsTo("App\People");
    }
}