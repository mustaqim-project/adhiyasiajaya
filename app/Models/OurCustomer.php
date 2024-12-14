<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCustomer extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (optional, jika nama tabel tidak mengikuti konvensi)
    protected $table = 'our_customer';

    // Tentukan kolom yang bisa diisi secara massal (optional)
    protected $fillable = ['name', 'image', 'url'];

    // Jika ingin menggunakan timestamps
    public $timestamps = false; // Setel ini jika tabel Anda tidak memiliki kolom `created_at` dan `updated_at`
}
