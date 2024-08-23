<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'locations';

    protected $fillable = [
        'id_project',
        'start_project',
        'end_project',
    ];
}
