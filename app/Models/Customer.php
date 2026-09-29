<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'jenis_pelanggan',
        'no_sambungan',
        'nama',
        'no_hp',
        'created_at',
        'updated_at'
    ];

    public function postOrders()
    {
        return $this->hasMany(PostOrder::class, 'customer_id');
    }
}
