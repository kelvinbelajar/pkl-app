<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'id_project',
        'source_name',
        'source_manager',
        'source_email',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
