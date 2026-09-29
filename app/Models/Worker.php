<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';

    protected $fillable = [
        'petugas1',
        'petugas2',
        'created_at',
        'updated_at'
    ];

    public function executions()
    {
        return $this->hasMany(Execution::class, 'worker_id');
    }
}
