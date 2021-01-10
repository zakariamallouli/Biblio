<?php

namespace App;
use App\Livre;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    public function livre()
    {
        return $this->belongsTo(Livre::class, 'idlivre');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
