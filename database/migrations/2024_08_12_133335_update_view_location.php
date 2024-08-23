<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateViewLocation extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the existing view if it exists
        DB::statement("DROP VIEW IF EXISTS view_location");

        // Create the new view with the updated definition
        DB::statement("
            CREATE VIEW view_location AS
                SELECT
                    locations.id,
                    projects.project_name,
                    t_provinsi.nama AS provinsi_name,
                    t_kota.nama AS kota_name,
                    t_kecamatan.nama AS kecamatan_name,
                    t_kelurahan.nama AS kelurahan_name,
                    locations.latitude,
                    locations.longitude,
                    locations.created_at

                FROM locations
                INNER JOIN projects ON locations.id_project = projects.id 
                INNER JOIN t_provinsi ON locations.provinsi_id = t_provinsi.id COLLATE utf8mb4_unicode_ci
                INNER JOIN t_kota ON locations.kota_id = t_kota.id COLLATE utf8mb4_unicode_ci
                INNER JOIN t_kecamatan ON locations.kecamatan_id = t_kecamatan.id COLLATE utf8mb4_unicode_ci
                INNER JOIN t_kelurahan ON locations.kelurahan_id = t_kelurahan.id COLLATE utf8mb4_unicode_ci
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the view in the down method if needed
        DB::statement("DROP VIEW IF EXISTS view_location");
    }
}

