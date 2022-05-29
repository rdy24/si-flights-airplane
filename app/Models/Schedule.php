<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'schedules';
    protected $guarded =  ['id'];

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
