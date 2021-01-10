<?php

namespace App;
use App\Livre;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function livres(){
        return $this->hasMany(Livre::class);
    }
}
