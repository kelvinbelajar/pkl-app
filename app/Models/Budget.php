<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $table = 'budgets';

    protected $fillable = [
        'id_project',
        'total_budget',
        'id_source',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'id_source');
    }
}
