<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = ['user_id', 'last_name', 'patronymic', 'about_me',
        'birthday', 'phone', 'place_residence', 'photo_technic', 'site'];

}
