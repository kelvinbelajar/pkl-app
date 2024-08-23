<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW view_publication AS
            SELECT
                publications.id,
                projects.project_name,
                projects.picture,
                projects.description,
                locations.latitude,
                locations.longitude,
                
                dates.start_project,
                dates.end_project,
                budgets.total_budget,
                projects.project_status

            FROM publications
            INNER JOIN projects ON publications.id_project = projects.id 
            INNER JOIN locations ON publications.id_location = locations.id 
            INNER JOIN dates ON publications.id_date = dates.id 
            INNER JOIN budgets ON publications.id_budget = budgets.id 
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP VIEW view_publication
        ");
    }
};
