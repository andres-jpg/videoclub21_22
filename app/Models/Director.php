<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'directores';
    protected $fillable = ['nombre', 'apellidos'];

    public static function existDirector($nombre, $apellidos) {

        return self::where([
                    ['nombre', $nombre],
                    ['apellidos', $apellidos]
        ])->first();
    }

    public function movies() {
        return $this->hasMany(Movies::class, 'director');
    }
}
