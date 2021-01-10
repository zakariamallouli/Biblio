<?php

namespace App;
use App\Livre;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    public function livres(){
        return $this->hasMany(Livre::class);
    }
}
