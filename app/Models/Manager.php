<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'managers';

    protected $fillable = [
        'id_project',
        'manager_name',
        'manager_contact',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
