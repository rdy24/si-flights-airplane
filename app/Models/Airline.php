<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airline extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'airlines';
    protected $guarded = ['id'];

    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
}
