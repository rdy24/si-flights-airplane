<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'routes';
    protected $guarded = ['id'];

    public function airportOrigin()
    {
        return $this->belongsTo(Airport::class, 'airport_origin_id', 'id');
    }

    public function airportDestination()
    {
        return $this->belongsTo(Airport::class, 'airport_destination_id', 'id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }
}
