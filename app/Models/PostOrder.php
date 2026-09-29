<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostOrder extends Model
{
    use HasFactory;

    protected $table = 'post_orders';

    protected $fillable = [
        'customer_id',
        'no_blangko',
        'tanggal_pesan',
        'jam_pesan',
        'jumlah_tangki',
        'kubikasi',
        'harga_jual',
        'keterangan',
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'post_id');
    }
}
