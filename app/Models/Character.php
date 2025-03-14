<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'level',
      'player_name',
      'species',
      'alignment',
      'details',
      'password',
    ];

    protected $hidden = [
      'password',
    ];
}
