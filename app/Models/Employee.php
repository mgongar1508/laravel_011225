<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $fillable = ['username', 'email', 'activo', 'departament_id'];
    //relaciones
    public function departament():BelongsTo{
        return $this->belongsTo(Departament::class);
    }
    public function roles():BelongsToMany{
        return $this->belongsToMany(Role::class);
    }
}
