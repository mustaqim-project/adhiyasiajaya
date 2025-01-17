<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'brand';

    protected $fillable = [
        'language',
        'name',
        'deskripsi',
        'image',
        'link',
        'file',
        'slug',
        'status',
        'meta_keyword',
        'meta_description',
    ];


    public function news()
    {
        return $this->hasMany(News::class);
    }
}
