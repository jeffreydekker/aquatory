<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registratie extends Model
{
    use HasFactory;

    public $table = 'registraties';

    protected $fillable = [
        "user_id",
        "geslachtsnaam",
        "soortnaam",
        "vangplaats",
        "AS",
        "KV",
        "notitie",
        "ondersoort",
        "aantal",
        "mv",
        "groep",
        "jongen"
    ];

    public function gebruiker() {
        return $this->belongsTo(User::class, "user_id");
    }
}
