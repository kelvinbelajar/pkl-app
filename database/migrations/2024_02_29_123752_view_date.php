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
        CREATE VIEW view_date AS
            SELECT
                dates.id,
                projects.project_name,
                dates.start_project,
                dates.end_project

            FROM dates
            INNER JOIN projects ON dates.id_project = projects.id 
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP VIEW view_date
        ");
    }
};
