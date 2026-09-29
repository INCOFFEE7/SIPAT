<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'post_id',
        'execution_id',
        'tanggal_selesai',
        'jam_selesai',
        'created_at',
        'updated_at'
    ];

    public function postOrder()
    {
        return $this->belongsTo(PostOrder::class, 'post_id');
    }

    public function execution()
    {
        return $this->belongsTo(Execution::class, 'execution_id');
    }
}
