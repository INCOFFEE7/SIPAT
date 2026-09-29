<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    use HasFactory;

    protected $table = 'execution';

    protected $fillable = [
        'worker_id',
        'no_plat',
        'no_spk',
        'tanggal_antar',
        'jam_antar',
        'created_at',
        'updated_at'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'execution_id');
    }
}
