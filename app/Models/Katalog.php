<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'katalog';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = ['category_id', 'image'];

    /**
     * Relasi dengan model Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
