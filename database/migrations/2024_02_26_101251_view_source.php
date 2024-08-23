<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_source AS
            SELECT
                sources.id,
                projects.project_name as pn,
                sources.source_name,
                sources.source_manager,
                sources.source_email

            FROM sources
            INNER JOIN projects ON sources.id_project = projects.id 
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP VIEW view_source
        ");
    }
};
