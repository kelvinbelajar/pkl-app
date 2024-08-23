<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    protected $fillable = [
        'id_project',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'latitude',
        'longitude',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
    

}
