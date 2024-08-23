<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    
    protected $table = 'publications';

    protected $fillable = [
        'id_project',
        'id_location',
        'id_date',
        'id_budget'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'id_date');
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'id_budget');
    }
}
