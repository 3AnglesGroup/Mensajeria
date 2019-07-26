<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

        public function Productos()
        {
            return $this->hasMany(Producto::class);
        }
}
