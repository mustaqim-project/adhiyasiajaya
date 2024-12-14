<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLandingPage extends Model
{
    use HasFactory;

    protected $table = 'setting_landing_page';

    protected $fillable = [
        'image_slide1',
        'link_slide1',
        'desc_slide1',
        'image_slide2',
        'link_slide2',
        'desc_slide2',
        'image_about',
        'bg_contact',
        'image_header_about',
        'image_header_product',
        'image_header_contact',
    ];
}
