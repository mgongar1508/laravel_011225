<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departament extends Model
{
    protected $fillable = ['nombre', 'color'];

    public function employees(): HasMany{ //cuidado, employees es plurar porque es una relacion 1:N
        return $this->hasMany(Employee::class);
    }
}
