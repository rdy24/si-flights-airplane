<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'tickets';
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();


        self::creating(function ($model) {
            $date = date('Y');
            $rand = rand(0000, 9999);
            $customer_id = request()->customer_id;

            $kode = '#'. $date . $rand . $customer_id;
            $model->kode_tiket = $kode;
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function airplaneSeat()
    {
        return $this->belongsTo(AirplaneSeat::class);
    }
}
