<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airport extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'airports';
    protected $guarded = ['id'];

    public function routes()
    {
        return $this->hasMany(Route::class);
    }

}
