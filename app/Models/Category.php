<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'categories';
    protected $attributes = [
        'show_at_nav' => 0,
    ];
    protected $fillable = [
        'language',
        'name',
        'deskripsi',
        'image',
        'blog',
        'file',
        'slug',
        'show_at_nav',
        'status',
        'meta_keyword',
        'meta_description',
    ];

    // Relasi ke model News
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function katalog()
    {
        return $this->hasMany(Katalog::class);
    }

}
