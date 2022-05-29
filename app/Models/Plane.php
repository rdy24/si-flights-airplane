<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plane extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'planes';
    protected $guarded = ['id'];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function airplaneSeats()
    {
        return $this->hasMany(AirplaneSeat::class);
    }
}
