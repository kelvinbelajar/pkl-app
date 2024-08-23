<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates';

    protected $fillable = [
        'id_project',
        'start_project',
        'end_project',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
