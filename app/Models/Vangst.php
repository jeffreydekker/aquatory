<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vangst extends Model
{
    use HasFactory;
    public $table = 'visregistratie';

    protected $fillable = [
        "user_id",
        "geslachtsnaam",
        "soortnaam",
        "vangplaats",
        "AS",
        "KV"
    ];
}