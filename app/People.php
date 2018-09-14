<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function capital()
    {
        return $this->hasMany("App\Capital");
    }

    public function expense()
    {
        return $this->hasMany("App\Expense");
    }

    public function sales()
    {
        return $this->hasMany("App\Sales");
    }

    public function notes()
    {
        return $this->hasMany("App\Notes");
    }
}
