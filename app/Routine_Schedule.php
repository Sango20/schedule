<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class routine_schedule extends Model
{
    protected $fillable = ["start_time", "time", "contents"];
}
