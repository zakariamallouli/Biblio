<?php

namespace App;
use App\Auteur;
use App\Genre;
use App\Emprunt;
use App\Tage;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public function auteur()
    {
        return $this->belongsTo(Auteur::class, 'idauteur');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idgenre');
    }

    public function tags()
    {
        return $this->hasMany(Tage::class, 'idtag');
    }

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
