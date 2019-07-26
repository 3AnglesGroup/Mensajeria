<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
