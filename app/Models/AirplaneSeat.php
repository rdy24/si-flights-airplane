<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirplaneSeat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'airplane_seats';
    protected $guarded = ['id'];

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
